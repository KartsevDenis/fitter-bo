<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use File;
use Image;

use App\Models\User;
use App\Models\Position;
use App\Models\Direction;
use App\Models\Department;
use App\Models\Region;
use App\Models\City;
use App\Models\Workstation;

class UserController extends ContainerController
{

    public function index() {

        //4731185613388641 CA

        $data = [];

        $data['users'] = '';

        $data['user'] = '';

        return view('admin.users', $data);

    }

    public function users() {

        $this->data['content_information'] = [
            'page_title' => 'Список сотрудников',
            'breadcrumb' => [
                ['url' => route('users'), 'status' => 'active', 'name' => 'Список сотрудников']
            ],
            'buttons' => [
                ['class' => 'btn-default', 'url' => url()->previous(), 'name' => 'Назад'],
                ['class' => 'btn-success', 'url' => route('add_user'), 'name' => 'Добавить'],
            ]
        ];

        $this->data['positions'] = Position::getAllPositions();

        $this->data['users_list'] = User::getAllUsers();

        $this->data['users_list'] = $this->user_constructor($this->data['users_list']);

        $this->data['users_list'] = collect($this->data['users_list'])->sortBy('name')->toArray();

        return view('admin.users', $this->data);

    }

    public function add_user() {

        $this->data['content_information'] = [
            'page_title' => 'Добавить нового сотрудника',
            'breadcrumb' => [
                ['url' => route('users'), 'status' => 'not-active', 'name' => 'Список сотрудников'],
                ['url' => route('add_user'), 'status' => 'active', 'name' => 'Добавить']
            ],
            'buttons' => [
                ['class' => 'btn-default', 'url' => route('users'), 'name' => 'Отмена'],
                ['class' => 'btn-success', 'js' => '$("form.form-horizontal").submit();', 'name' => 'Сохранить'],
            ]
        ];

        $this->data['positions'] = Position::getAllPositions();

        $direction_or_department = Direction::getAllDirections()->sortBy('name')->toArray();

        foreach ($direction_or_department as $key => $direction) {

            $departments = Department::getDepartmentByDirection($direction['id'])->sortBy('name')->toArray();

            if ( !empty($departments) ) {

                $direction_or_department[$key]['departments'] = $departments;

            }

        }

        $this->data['direction_or_department'] = $direction_or_department;

        return view('admin.user', $this->data);

    }

    public function save_user(Request $request) {

        $data = $request->input();

        $data['file'] = $request->file('avatar');

        if ( $data['file'] ) {

            $avatar = md5($request->input('id') . date('Hms')) . '.' . $data['file']->getClientOriginalExtension();

            $path = public_path('/avatars/');

            $data['file']->move($path, $avatar);

            $img = Image::make($path . $avatar)->fit(500);

            $img->save($path . $avatar, 90);

            File::delete( public_path($this->data['currentUserData']['avatar']) );

            $data['avatar'] = $avatar;

        } else {

            if ( !empty($data['id']) ) {

                $edited_user = User::getUser($data['id']);

                $data['avatar'] = $edited_user['avatar'];

            } else {

                $data['avatar'] = 'default.jpg';

            }

        }

        $result = User::addUser($data);

        if ($result) {

            return redirect()->route('users', ['user_created' => $result]);

        } else {

            return redirect()->route('users', ['errors' => 'Не удалось создать!']);

        }

    }

    public function edit_user($id) {

        $this->data['content_information'] = [
            'page_title' => 'Редактировать сотрудника',
            'breadcrumb' => [
                ['url' => route('users'), 'status' => 'not-active', 'name' => 'Список сотрудников'],
                ['url' => route('edit_user', $id), 'status' => 'active', 'name' => 'Редактировать сотрудника']
            ],
            'buttons' => [
                ['class' => 'btn-default', 'url' => route('users'), 'name' => 'Отмена'],
                ['class' => 'btn-success', 'js' => '$("form.form-horizontal").submit();', 'name' => 'Сохранить'],
            ]
        ];

        $user = $this->data['user'] = User::getUser($id);

        $direction_or_department_arr = explode('_', $user['direction_or_department']);

        if ( count($direction_or_department_arr) > 1 && !empty($direction_or_department_arr[0]) ) {

            $user['direction'] = 'Направление';

        }

        $this->data['positions'] = Position::getAllPositions();

        $direction_or_department = Direction::getAllDirections()->sortBy('name')->toArray();

        foreach ($direction_or_department as $key => $direction) {

            $departments = Department::getDepartmentByDirection($direction['id'])->sortBy('name')->toArray();

            if ( !empty($departments) ) {

                $direction_or_department[$key]['departments'] = $departments;

            }

        }

        $this->data['direction_or_department'] = $direction_or_department;

        $this->data['regions'] = Region::getAllRegions();

        $user['avatar'] = $this->user_avatar($user['avatar']);

        $this->data['user'] = $user;

        return view('admin.user', $this->data);

    }

    public function delete_user(Request $request) {

        User::deleteUser($request->id);

    }

    public function new_users() {

        $this->data['content_information'] = [
            'page_title' => 'Список новых сотрудников',
            'breadcrumb' => [
                ['url' => route('birthdays'), 'status' => 'active', 'name' => 'Список новых сотрудников']
            ],
            'buttons' => [
                ['class' => 'btn-default', 'url' => url()->previous(), 'name' => 'Назад'],
            ]
        ];

        $this->data['users_list'] = User::getNew();

        $this->data['users_list'] = $this->user_constructor($this->data['users_list']);

        $this->data['users_list'] = collect($this->data['users_list'])->sortBy('birthday')->toArray();

        return view('admin.new_users', $this->data);

    }

    public function birthdays() {

        $this->data['content_information'] = [
            'page_title' => 'Список именинников за текущий месяц',
            'breadcrumb' => [
                ['url' => route('birthdays'), 'status' => 'active', 'name' => 'Список именинников']
            ],
            'buttons' => [
                ['class' => 'btn-default', 'url' => url()->previous(), 'name' => 'Назад'],
            ]
        ];

        $this->data['users_list'] = User::getBirthdays();

        $this->data['users_list'] = $this->user_constructor($this->data['users_list']);

        $this->data['users_list'] = collect($this->data['users_list'])->sortBy('birthday')->toArray();

        return view('admin.birthdays', $this->data);

    }

    public function birthdays_today() {

        $this->data['content_information'] = [
            'page_title' => 'Список именинников за текущий месяц',
            'breadcrumb' => [
                ['url' => route('birthdays'), 'status' => 'active', 'name' => 'Список именинников']
            ],
            'buttons' => [
                ['class' => 'btn-default', 'url' => url()->previous(), 'name' => 'Назад'],
            ]
        ];

        $this->data['users_list'] = User::getBirthdays();

        $this->data['users_list'] = $this->user_constructor($this->data['users_list']);

        $this->data['users_list'] = collect($this->data['users_list'])->sortBy('birthday')->toArray();

        return view('admin.birthdays', $this->data);

    }

}
