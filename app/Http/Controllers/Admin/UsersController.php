<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index() {

        $data = [];

        $data['currentUserdata'] = $this->data['currentUserData'];

        $data['sidebar_items'] = $this->data['sidebar_items'];

        $data['users'] = '';

        $data['user'] = '';

        return view('admin.dashboard', $data);

    }
}
