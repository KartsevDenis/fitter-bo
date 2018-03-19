<?php

namespace App\Http\Controllers\Fitter;

use App\Models\Post;
use Request;

class PostController extends ContainerController
{
    public function index() {

        $this->data['content_information'] = [
            'page_title' => 'Ваши публикации',
            'breadcrumb' => [
                ['url' => route('posts'), 'status' => 'active', 'name' => 'Список публикаций']
            ],
            'buttons' => [
                ['class' => 'btn-default', 'url' => url()->previous(), 'name' => 'Назад'],
                ['class' => 'btn-success', 'url' => route('fit_new_post'), 'name' => 'Добавить'],
            ]
        ];

        $this->data['posts'] = Post::getAllPostsByUser( auth()->user()->id );

        return view('fitter.posts', $this->data);

    }

    public function new_post() {

        $this->data['content_information'] = [
            'page_title' => 'Добавить новую публикацию',
            'breadcrumb' => [
                ['url' => route('fit_new_post'), 'status' => 'active', 'name' => 'Добавить публикацию']
            ],
            'buttons' => [
                ['class' => 'btn-default', 'url' => url()->previous(), 'name' => 'Назад'],
                ['class' => 'btn-success', 'url' => '#', 'name' => 'Сохранить'],
            ]
        ];

        return view('fitter.new_post', $this->data);

    }

    public function insert_post(Request $request) {

       dd($request-input());

    }

}
