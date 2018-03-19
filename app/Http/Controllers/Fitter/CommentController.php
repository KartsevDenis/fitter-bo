<?php

namespace App\Http\Controllers\Fitter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends ContainerController
{
    public function index() {

        $this->data['content_information'] = [
            'page_title' => 'Главная',
            'breadcrumb' => [
                ['url' => route('login'), 'status' => 'active', 'name' => 'Список']
            ],
            'buttons' => [
                ['class' => 'btn-default', 'url' => url()->previous(), 'name' => 'Назад'],
                ['class' => 'btn-success', 'url' => url()->previous(), 'name' => 'Добавить'],
            ]
        ];

        return view('fitter.dashboard', $this->data);

    }
}
