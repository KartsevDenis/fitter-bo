<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = [];

    public static function getAllPostsByUser($id) {

        return self::where('author_id', '=', $id)->get();

    }

}

