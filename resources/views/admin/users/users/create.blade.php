@extends('layouts.admin')
@section('title', 'Добавление пользователя')
@push('css')
    <link href="/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.css" rel="stylesheet" />
@endpush
@section('content')
<div class="panel panel-inverse">
    <div class="panel-body">

        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="/admin">Админ. панель</a></li>
            <li class="breadcrumb-item active"><a href="/admin">Добавление пользователя</a></li>
        </ol>

        <h1 class="page-title">Добавление пользователя</h1>

        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">
                    Логин <span class="text-theme">*</span><br>
                    <small>Текст длиною не более 255 символов</small>
                </label>
                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                id="name" name="name" type="text" value="{{ old('name') }}" autofocus>
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">
                    Email <span class="text-theme">*</span><br>
                    <small>Текст длиною не более 255 символов</small>
                </label>
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                id="email" name="email" type="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="password">
                    Пароль <span class="text-theme">*</span><br>
                    <small>Минимум 8 символов</small>
                </label>
                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                id="password" name="password" type="password" value="{{ old('password') }}">
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password_confirmation">
                    Подтверждение пароля <span class="text-theme">*</span><br>
                    <small>Минимум 8 символов</small>
                </label>
                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                id="password_confirmation" name="password_confirmation" type="password"
                value="{{ old('password_confirmation') }}">
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="avatar">
                    Изображение для аватара <span class="text-theme">*</span><br>
                    <small>Файл будет преобразован в изображение размером 436х327 px</small>
                </label>
                <div id="avatar" name="avatar" class="input-group input-file-picture-announce">
                    <input class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}"
                    type="text" placeholder='Выберите файл' />
                    <div class="input-group-append">
                        <button type="button" class="btn btn-success btn-choose-picture-announce">Выбрать</button>
                    </div>  
                    @if ($errors->has('avatar'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            {{ csrf_field() }}

            <button type="submit" class="btn btn-lime"><i class="fas fa-plus-circle"></i> Добавить</button>
            
        </form>
        
        @if (session('status'))
        <div class="alert alert-success"> {{ session('status') }} </div>
        @endif

        @if (count($errors))
        <div class="alert alert-danger"> 
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    </div>
</div>
@endsection
@push('scripts')
<script src="/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
    $('#detailed_desc').wysihtml5({
        toolbar: {
            "font-styles": true, // Font styling, e.g. h1, h2, etc.
            "emphasis": true, // Italics, bold, etc.
            "lists": true, // (Un)ordered lists, e.g. Bullets, Numbers.
            "html": true, // Button which allows you to edit the generated HTML.
            "link": true, // Button to insert a link.
            "image": false, // Button to insert an image.
            "color": false, // Button to change color of font
            "blockquote": true, // Blockquote
            "fa": true, // Use Awesome Icon
        }
    });
</script>
<script type="text/javascript">
function bs_input_file_avatar() {
    $(".input-file-picture-announce").before(
        function() {
            if ( ! $(this).prev().hasClass('input-ghost') ) {
                var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                element.attr("name",$(this).attr("name"));
                element.change(function(){
                    element.next(element).find('input').val((element.val()).split('\\').pop());
                });
                $(this).find("button.btn-choose-picture-announce").click(function(){
                    element.click();
                });
                $(this).find("button.btn-reset").click(function(){
                    element.val(null);
                    $(this).parents(".input-file-picture-announce").find('input').val('');
                });
                $(this).find('input').css("cursor","pointer");
                $(this).find('input').mousedown(function() {
                    $(this).parents('.input-file-picture-announce').prev().click();
                    return false;
                });
                return element;
            }
        }
    );
}
$(function() {
    bs_input_file_avatar();
});
</script>
@endpush
