<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Position;

class User extends Model
{

    protected $guarded = [];

    public static function getUserData($id) {

        return self::where('id', '=', $id)->firstOrFail();

    }

    public static function addUser($data) {

        return self::updateOrCreate(
            ['id' => !empty($data['id']) ? $data['id'] : self::max('id') + 1],
            [
                'name' => $data['name'],
                'region_id' => $data['region_id'],
                'position' => $data['position'],
                'direction_or_department' => $data['direction_or_department'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'avatar' => $data['avatar'],
                'birthday' => $data['birthday'],
                'blog_editor' => $data['blog_editor'],
                'job_editor' => $data['job_editor'],
                'writer' => $data['writer'],
                'super_admin' => $data['super_admin'],
            ]
            );
    }

    public static function getUser($id) {

        return self::where('id', '=', $id)->firstOrFail();

    }

    public static function getAllUsers() {

        return self::all();

    }

    public static function getBirthdays() {

        return self::whereMonth('birthday', '=', Carbon::now()->month)->get();

    }

    public static function getBirthdayToday() {

        $now = Carbon::now();

        return self::whereMonth('birthday', '=', $now->month)->whereDay('birthday', '=', $now->day)->get();

    }

    public static function getNew() {

        return self::whereMonth('created_at', '=', Carbon::now()->month)->get();

    }

    public static function deleteUser($id) {

        return self::where('id', '=', $id)->delete();

    }

}

