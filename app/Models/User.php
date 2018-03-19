<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
                'status' => $data['status'],
                'status_start' => $data['status_start'],
                'status_end' => $data['status_end'],
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

    public static function deleteUser($id) {

        return self::where('id', '=', $id)->delete();

    }

}

