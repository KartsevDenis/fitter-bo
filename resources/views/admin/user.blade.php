@extends('admin.template.theme')

@section('styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/bower_components/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">

@endsection

@section('scripts')

    <script src="{{ asset('admin/plugins/bower_components/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/js/validator.js') }}"></script>
    <script src="{{ asset('admin/js/mask.js') }}"></script>
    <script src="{{ asset('admin/js/mask.js') }}"></script>
    <script src="{{ asset('admin/js/custom/user.js') }}"></script>

@endsection

@section('content')

    <form class="form-horizontal" data-toggle="validator" novalidate="true" method="post" action="{{ route('save_user') }}" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="col-sm-4">

            <div class="white-box">

                <label for="input-file-max-fs">Загрузка изображения. Максимальный размер - 2 Мб.</label>

                <input type="file" name="avatar" class="dropify" data-max-file-size="2M" data-height="500" data-default-file="{{ !empty($user['avatar']) ? asset($user['avatar']) : ''}}" />

            </div>

        </div>

        <div class="col-sm-4">

            <div class="white-box">

                <div class="form-group">

                    <label class="col-md-12">Ф.И.О:</label>

                    <div class="col-md-12">

                        <input type="text" name="name" required class="form-control" value="{{ old('name', isset($user['name']) ? $user['name'] : '') }}" placeholder="Ф.И.О">

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-md-12">Регион</label>

                    <div class="col-md-12">

                        <select class="form-control" name="region_id">

                            <option value="">Не определено</option>

                            @foreach( $regions as $region )

                                <option value="{{ $region['id'] }}" {{ ( (!empty($user)) && ($region['id'] == $user['region_id']) ) ? 'selected' : '' }}>{{ $region['name'] }}</option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-md-12">Направление/Подразделение</label>

                    <div class="col-md-12">

                        <select class="form-control" name="direction_or_department">

                            <option value="">Не определено</option>

                            @foreach( $direction_or_department as $direction )

                                <option value="{{ $direction['id'] }}" {{ ($direction['id'] == $user['direction_or_department']) ? 'selected' : '' }}>{{ $direction['name'] }}</option>

                                @if( !empty($direction['departments']) )

                                    @foreach( $direction['departments'] as $department )

                                        <option value="{{ $direction['id'] . '_' . $department['id'] }}" {{ ($direction['id'] . '_' . $department['id'] == $user['direction_or_department']) ? 'selected' : '' }}> - {{ $department['name'] }}</option>

                                    @endforeach

                                @endif

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-md-12">Должность</label>

                    <div class="col-md-12">

                        <select class="form-control" name="position" required="required">

                            <option value="">Не определено</option>

                            @foreach( $positions as $position )

                                <option value="{{ $position['id'] }}" {{ ( (!empty($user)) && ($position['id'] == $user['position']) ) ? 'selected' : '' }}>{{ $position['name'] }}</option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-md-12">Дата рождения</label>

                    <div class="col-md-12">

                        <input type="text" name="birthday" class="form-control date mydatepicker" data-mask="9999-99-99" placeholder="ГГГГ-ММ-ДД" value="{{ old('birthday', isset($user['birthday']) ? $user['birthday'] : '') }}" placeholder="Дата рождения">

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-md-12">Телефон</label>

                    <div class="col-md-12">

                        <input type="text" name="phone" class="form-control" data-mask="999" value="{{ old('phone', isset($user['phone']) ? $user['phone'] : '') }}" placeholder="Номер телефона">

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-md-12">E-mail</label>

                    <div class="col-md-12">

                        <input type="email" required name="email" class="form-control" value="{{ old('email', isset($user['email']) ? $user['email'] : '') }}" placeholder="E-mail">

                    </div>

                </div>

                @if(!empty($user))

                    <input type="hidden" name="id" value="{{ $user['id'] }}">

                @endif

            </div>

        </div>

        <div class="col-sm-4">

            <div class="white-box">

                <div class="form-group">

                    <label class="control-label">Редатировать вакансии</label>

                    <select class="form-control" name="job_editor">

                        @if ( !empty($user['job_editor']) )
                            <option value="1" {{ ($user['job_editor']) ? 'selected' : '' }}>Да</option>
                            <option value="0" {{ ($user['job_editor']) ? '' : 'selected' }}>Нет</option>
                        @else
                            <option value="1">Да</option>
                            <option value="0" selected>Нет</option>
                        @endif

                    </select>

                </div>

                <div class="form-group">

                    <label class="control-label">Редатировать блог</label>

                    <select class="form-control" name="blog_editor">

                        @if ( !empty($user['blog_editor']) )
                            <option value="1" {{ ($user['blog_editor']) ? 'selected' : '' }}>Да</option>
                            <option value="0" {{ ($user['blog_editor']) ? '' : 'selected' }}>Нет</option>
                        @else
                            <option value="1">Да</option>
                            <option value="0" selected>Нет</option>
                        @endif

                    </select>

                </div>

                <div class="form-group">

                    <label class="control-label">Редактировать структуру</label>

                    <select class="form-control" name="">

                        <option value="1" selected>Да</option>
                        <option value="0">Нет</option>

                    </select>

                </div>

                <div class="form-group">

                    <label class="control-label">Писать в ленту</label>

                    <select class="form-control" name="writer">

                        @if ( !empty($user['writer']) )
                            <option value="1" {{ ($user['writer']) ? 'selected' : '' }}>Да</option>
                            <option value="0" {{ ($user['writer']) ? '' : 'selected' }}>Нет</option>
                        @else
                            <option value="1">Да</option>
                            <option value="0" selected>Нет</option>
                        @endif

                    </select>

                </div>

                <div class="form-group">

                    <label class="control-label">Администратор</label>

                    <select class="form-control" name="super_admin">

                        @if ( !empty($user['super_admin']) )
                            <option value="1" {{ ($user['super_admin']) ? 'selected' : '' }}>Да</option>
                            <option value="0" {{ ($user['super_admin']) ? '' : 'selected' }}>Нет</option>
                        @else
                            <option value="1">Да</option>
                            <option value="0" selected>Нет</option>
                        @endif

                    </select>

                </div>

            </div>

        </div>

    </form>

@endsection