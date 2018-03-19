@extends('fitter.template.theme')

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')

    <div class="col-md-12">

        <div class="white-box">

            <table class="table table-bordered table-striped">

                <thead>

                <tr>
                    <th>#</th>
                    <th>Заголовок</th>
                    <th>Создан</th>
                    <th>Изменен</th>
                    <th></th>
                    <th></th>
                </tr>

                </thead>

                <tbody>

                @foreach( $posts as $key => $post )

                    <tr>

                        <td>{{ $key }}</td>
                        <td>{{ $post['title'] }}</td>
                        <td>{{ $post['created_at'] }}</td>
                        <td>{{ $post['updated_at'] }}</td>

                        <td>
                            <a href="">
                                <button class="btn btn-block btn-outline btn-warning">Изменить</button>
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-block btn-outline btn-danger delete-direction"
                                    data-url=""
                                    data-name=""
                                    data-direction-id="">
                                Удалить
                            </button>
                        </td>
                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

@endsection