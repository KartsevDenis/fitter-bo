<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use File;
use App\Models\User;
use App\Models\Position;
use App\Models\Direction;
use App\Models\Department;
use App\Models\Region;
use App\Models\City;
use App\Models\Workstation;


class ContainerController extends Controller
{

    public $container = [];

    public function __construct()
    {

        $this->middleware(function ($request, $next) {

            $currentUserData = User::getUserData(auth()->user()->id);

            $currentUserData->avatar = self::user_avatar($currentUserData->avatar);

            $this->data['currentUserData'] = $currentUserData;

            $sidebar_items = [];

            if (auth()->check() && auth()->user()->super_admin) {

                $sidebar_items[] = array(
                    'type' => 'parent',
                    'title' => 'Структура',
                    'icon' => 'fa fa-plus-square-o',
                    'children' => [
                        ['title' => 'Регионы', 'url' => '/admin/regions',],
                        ['title' => 'Города', 'url' => '/admin/cities',],
                        ['title' => 'Рабочие точки', 'url' => '/admin/workstations',],
                        ['title' => 'Направления', 'url' => '/admin/directions',],
                        ['title' => 'Подразделения', 'url' => '/admin/departments',],
                        ['title' => 'Сотрудники', 'url' => '/admin/users',],
                        ['title' => 'Список должностей', 'url' => '/admin/positions',],
                    ]
                );

            }

            if (auth()->check() && auth()->user()->job_editor) {

                $sidebar_items[] = array(
                    'type' => 'parent',
                    'title' => 'Вакансии',
                    'icon' => 'fa fa-plus-square-o',
                    'children' => [
                        ['title' => 'Список городов', 'url' => '/admin/vacancies',],
                        ['title' => 'Все вакансии', 'url' => '/admin/vacancies',],
                        ['title' => 'Добавить вакансию', 'url' => '/admin/add-vacancy',],
                    ]
                );

            }

            if (auth()->check() && auth()->user()->blog_editor) {

                $sidebar_items[] = array(
                    'type' => 'parent',
                    'title' => 'Блог',
                    'icon' => 'fa fa-plus-square-o',
                    'children' => [
                        ['title' => 'Категории блога', 'url' => '/admin/vacancies',],
                        ['title' => 'Все публикации', 'url' => '/admin/vacancies',],
                        ['title' => 'Добавить публикацию', 'url' => '/admin/add-vacancy',],
                    ]
                );

            }

            if (auth()->check() && auth()->user()->writer) {

                $sidebar_items[] = array(
                    'type' => 'parent',
                    'title' => 'Лента',
                    'icon' => 'fa fa-plus-square-o',
                    'children' => [
                        ['title' => 'Все посты', 'url' => '/admin/vacancies',],
                        ['title' => 'Добавить пост', 'url' => '/admin/vacancies',],
                        ['title' => 'Статистика', 'url' => '/admin/add-vacancy',],
                    ]
                );

            }

            if (auth()->check()) {

                $sidebar_items[] = array(
                    'type' => 'parent',
                    'title' => 'Справочники',
                    'icon' => 'fa fa-plus-square-o',
                    'children' => [
                        ['title' => 'Рабочие телефоны', 'url' => route('phones'),],
                        ['title' => 'Почтовые адреса', 'url' => route('emails'),],
                        ['title' => 'Дни рождения', 'url' => route('birthdays'),],
                        ['title' => 'Новые сотрудники', 'url' => route('new_users'),],
                    ]
                );

            }

            /* --- --- */

            $birthday_today_users = User::getBirthdayToday();

            foreach ($birthday_today_users as $user) {



            }

            /* --- --- */

            $this->data['sidebar_items'] = $sidebar_items;

            return $next($request);

        });

    }

    public static function user_avatar($avatar_name) {

        $default = '/avatars/default.jpg';

        $avatar_local_path = '/avatars/' . $avatar_name;

        $avatar_full_path = public_path($avatar_local_path);

        $avatar_web_path = asset( $avatar_local_path );

        if (File::exists($avatar_full_path)) {

            return $avatar_web_path;

        } else {

            return asset( $default );

        }

    }

    public static function user_constructor($users_list) {

        foreach ( $users_list as $key => $user ) {

            $position = Position::getPosition($user['position']);

            $direction_id = '';

            $department_id = '';

            $direction_or_department_arr = explode('_', $user['direction_or_department']);

            $position_string = "<span class='position-name'>" . $position['name'] . "</span>";

            if ( count($direction_or_department_arr) > 0 && !empty($direction_or_department_arr[0]) ) {

                if ( !empty($direction_or_department_arr[1]) ) {

                    $department_id = $direction_or_department_arr[1];

                    $d = Department::getDepartment($department_id);

                    $position_string .= ' подразделения ' . "<span class='department-name'>" . $d['name'] . "</span>";

                }

                if ( !empty($direction_or_department_arr[0]) ) {

                    $direction_id = $direction_or_department_arr[0];

                    $d = Direction::getDirection($direction_id);

                    $position_string .= ' направления ' . "<span class='direction-name'>" . $d['name'] . "</span>";

                }

            }

            if ( !empty($user['region_id']) ) {

                $region = Region::getRegion($user['region_id']);

                $users_list[$key]['region_name'] = $region['name'];

                $position_string .= ' регионального представительства ' . "<span class='region-name'>«" . $region['name'] . "»</span>" ;

            } else {

                if ( !empty($direction_id) ) {

                    $direction = Direction::getDirection($direction_id);

                    $workstation = Workstation::getWorkstation($direction['workstation_id']);

                    $city = City::getCity($workstation['city_id']);

                    $region = Region::getRegion($city['region_id']);

                    $users_list[$key]['region_name'] = $region['name'];

//                    $position_string .= ' регионального представительства ' . "<span class='region-name'>«" . $region['name'] . "»</span>";
//
//                    $position_string .= ' город ' . "<span class='city-name'>«" . $city['name'] . "»</span>";

                } else {

                    $users_list[$key]['region_name'] = 'Не определено';

                }

            }

            $users_list[$key]['avatar'] = ContainerController::user_avatar($user['avatar']);
            $users_list[$key]['writer_text'] = ($user['writer']) ? 'ДА' : 'НЕТ';
            $users_list[$key]['blog_editor_text'] = ($user['blog_editor']) ? 'ДА' : 'НЕТ';
            $users_list[$key]['job_editor_text'] = ($user['job_editor']) ? 'ДА' : 'НЕТ';
            $users_list[$key]['super_admin_text'] = ($user['super_admin']) ? 'ДА' : 'НЕТ';
            $users_list[$key]['position'] = $position_string;

        }

        return $users_list;

    }

}