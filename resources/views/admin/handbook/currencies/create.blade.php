@extends('layouts.admin')
@section('title', 'Добавление валюты')
@push('css')
    <link href="/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.css" rel="stylesheet" />
@endpush
@section('content')
<div class="panel panel-inverse">
    <div class="panel-body">

        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="/admin">Админ. панель</a></li>
            <li class="breadcrumb-item active"><a href="/admin">Добавление валюты</a></li>
        </ol>

        <h1 class="page-title">Добавление валюты</h1>

        <form action="{{ route('currencies.store') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name_currency_en">
                    Название валюты на английском языке <span class="text-theme">*</span><br>
                    <small>Текст длиною не более 255 символов</small>
                </label>
                <input class="form-control{{ $errors->has('name_currency_en') ? ' is-invalid' : '' }}"
                id="name_currency_en" name="name_currency_en" type="text" value="{{ old('name_currency_en') }}"
                autofocus>
                @if ($errors->has('name_currency_en'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name_currency_en') }}</strong>
                </span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="name_currency_ru">
                    Название валюты на русском языке <span class="text-theme">*</span><br>
                    <small>Текст длиною не более 255 символов</small>
                </label>
                <input class="form-control{{ $errors->has('name_currency_ru') ? ' is-invalid' : '' }}"
                id="name_currency_ru" name="name_currency_ru" type="text"
                value="{{ old('name_currency_ru') }}" autofocus>
                @if ($errors->has('name_currency_ru'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name_currency_ru') }}</strong>
                </span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="iso_4217_code_currency_literal">
                    Код ISO 4217 буквенный для данной валюты <span class="text-theme">*</span><br>
                    <small>Текст длиною не более 4 символов</small>
                </label>
                <input class="form-control{{ $errors->has('iso_4217_code_currency_literal') ? ' is-invalid' : '' }}"
                id="iso_4217_code_currency_literal" name="iso_4217_code_currency_literal"
                type="text" value="{{ old('iso_4217_code_currency_literal') }}" autofocus>
                @if ($errors->has('iso_4217_code_currency_literal'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('iso_4217_code_currency_literal') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="iso_4217_code_currency_numeric">
                    Код ISO 4217 цифровой для данной валюты <span class="text-theme">*</span><br>
                    <small>Число, значением не более 999</small>
                </label>
                <input class="form-control{{ $errors->has('iso_4217_code_currency_numeric') ? ' is-invalid' : '' }}"
                id="iso_4217_code_currency_numeric" name="iso_4217_code_currency_numeric" type="number"
                value="{{ old('iso_4217_code_currency_numeric') }}" autofocus>
                @if ($errors->has('iso_4217_code_currency_numeric'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('iso_4217_code_currency_numeric') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="rounding_currency">
                    Величина (кол-во знаков после запятой), 
                    до которой округляется валюты <span class="text-theme">*</span><br>
                    <small>Число длиною не более 4 символов</small>
                </label>
                <input class="form-control{{ $errors->has('rounding_currency') ? ' is-invalid' : '' }}"
                id="rounding_currency" name="rounding_currency" type="number"
                value="{{ old('rounding_currency') }}" autofocus>
                @if ($errors->has('rounding_currency'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('rounding_currency') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="unicode">
                    Знак валюты в формате юникод<br>
                    <small>Текст длиною не более 10 символов</small>
                </label>
                <input class="form-control{{ $errors->has('unicode') ? ' is-invalid' : '' }}" id="unicode"
                name="unicode" type="text" value="{{ old('unicode') }}" autofocus>
                @if ($errors->has('unicode'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('unicode') }}</strong>
                </span>
                @endif
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
function bs_input_file_picture_announce() {
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
        bs_input_file_picture_announce();
});
</script>
@endpush