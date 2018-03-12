@extends('admin.template.theme')

@section('styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/bower_components/sweetalert/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom/user.css') }}">

@endsection

@section('scripts')

    <script src="{{ asset('admin/plugins/bower_components/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/users.js') }}"></script>

@endsection

@section('content')

    <div class="col-md-12">

        <div class="white-box">

            <table class="table table-bordered table-striped">

                <thead>

                <tr>
                    <th>#</th>
                    <th>Фото</th>
                    <th>Имя</th>
                    {{--<th>Рп</th>--}}
                    <th>Должность</th>
                    <th>Создан</th>
                    <th>Лента</th>
                    <th>Вакансии</th>
                    <th>Блог</th>
                    <th>Админ</th>
                    <th>Измененить</th>
                    <th>Удалить</th>
                </tr>

                </thead>

                <tbody>

                @foreach( $users_list as $user )

                    <tr>

                        <td>{{ $user['id'] }}</td>

                        <td class="avatar-outer"><img class="avatar tooltip-item" src="{{ $user['avatar'] }}"></td>

                        <td>{{ $user['name'] }}</td>

                        {{--<td>{{ $user['region_name'] }}</td>--}}

                        <td>{!! $user['position'] !!}</td>

                        <td>{{ $user['created_at'] }}</td>

                        <td><button class="disabled btn btn-block btn-outline btn-{{ ($user['writer']) ? 'info' : 'default' }}">{{ $user['writer_text'] }}</button></td>

                        <td><button class="disabled btn btn-block btn-outline btn-{{ ($user['job_editor']) ? 'info' : 'default' }}">{{ $user['job_editor_text'] }}</button></td>

                        <td><button class="disabled btn btn-block btn-outline btn-{{ ($user['blog_editor']) ? 'info' : 'default' }}">{{ $user['blog_editor_text'] }}</button></td>

                        <td><button class="disabled btn btn-block btn-outline btn-{{ ($user['super_admin']) ? 'info' : 'default' }}">{{ $user['super_admin_text'] }}</button></td>

                        <td>

                            <a href="{{ route('edit_user', $user['id']) }}">

                                <button class="btn btn-block btn-outline btn-warning">Изменить</button>

                            </a>

                        </td>

                        <td>

                            <button class="btn btn-block btn-outline btn-danger delete-user"
                                    data-url="{{ route('delete_user') }}"
                                    data-name="{{ $user['name'] }}"
                                    data-user-id="{{ $user['id'] }}">
                                Удалить
                            </button>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

    {{--<div class="container-fluid">--}}

        {{--<div class="row el-element-overlay m-b-40">--}}

            {{--@foreach( $users_list as $user )--}}

                {{--<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">--}}

                    {{--<div class="white-box">--}}

                        {{--<div class="el-card-item">--}}

                            {{--<div class="el-card-avatar el-overlay-1"> <img src="{{ $user['avatar'] }}">--}}
                                {{--<div class="el-overlay">--}}
                                    {{--<ul class="el-info">--}}
                                        {{--<li><a class="btn default btn-outline image-popup-vertical-fit" href="{{ $user['avatar'] }}"><i class="icon-magnifier"></i></a></li>--}}
                                        {{--<li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="el-card-content">--}}
                                {{--<h3 class="box-title">{{ $user['name'] }}</h3> <small>{{ $user['position'] }}</small>--}}
                                {{--<br>--}}
                            {{--</div>--}}

                        {{--</div>--}}

                    {{--</div>--}}

                {{--</div>--}}


            {{--@endforeach--}}

        {{--</div>--}}

    {{--</div>--}}

@endsection