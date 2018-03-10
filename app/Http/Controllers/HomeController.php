<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::All();

        $data['posts'] = $posts;

        $data['large_image'] = 'https://experiencinginformation.files.wordpress.com/2016/03/blueprint.jpg';

        return view('main', $data);

    }
}
