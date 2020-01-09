@extends('layouts.admin')
@section('title', 'Редактирование авиаплощадки')
@push('css')
    <link href="/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.css" rel="stylesheet" />
@endpush
@section('content')
<div class="panel panel-inverse">
    <div class="panel-body">

        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="/admin">Админ. панель</a></li>
            <li class="breadcrumb-item active"><a href="/admin">Редактирование авиаплощадки</a></li>
        </ol>

        <h1 class="page-title">Редактирование авиаплощадки</h1>

        <form action="{{ route('airfields.update', $value) }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name_airfield_en">Название авиаплощадоки на английском языке <span class="text-theme">*</span> <br>
                    <small>Текст длиною не более 255 символов</small>
                </label>
                <input class="form-control{{ $errors->has('name_airfield_en') ? ' is-invalid' : '' }}"
                 id="name_airfield_en" name="name_airfield_en" type="text"
                 value="@if(old('name_airfield_en')){{ old('name_airfield_en') }}@else{{$value->name_airfield_en ?? ''}}@endif"
                 autofocus>
                @if ($errors->has('name_airfield_en'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name_airfield_en') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="name_airfield_ru">Название авиаплощадки на русском языке <br>
                    <small>Текст длиною не более 255 символов</small>
                </label>
                <input class="form-control{{ $errors->has('name_airfield_ru') ? ' is-invalid' : '' }}" id="name_airfield_ru"
                 name="name_airfield_ru" type="text"
                 value="@if(old('name_airfield_ru')){{ old('name_airfield_ru') }}@else{{$value->name_airfield_ru ?? ''}}@endif"
                 autofocus>
                @if ($errors->has('name_airfield_ru'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name_airfield_ru') }}</strong>
                </span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="iata_code_airfield">IATA код авиаплощадки <span class="text-theme">*</span> <br>
                    <small>Текст длиною не более 4 символов</small>
                </label>
                <input class="form-control{{ $errors->has('iata_code_airfield') ? ' is-invalid' : '' }}"
                 id="iata_code_airfield" name="iata_code_airfield" type="text"
                 value="@if(old('iata_code_airfield')){{ old('iata_code_airfield') }}@else{{$value->iata_code_airfield ?? ''}}@endif"
                 autofocus>
                @if ($errors->has('iata_code_airfield'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('iata_code_airfield') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="latitude">Широта <br>
                    <small>Текст длиною не более 16 символов</small>
                </label>
                <input class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" id="latitude"
                 name="latitude" type="text"
                 value="@if(old('latitude')){{ old('latitude') }}@else{{$value->latitude ?? ''}}@endif"
                 autofocus>
                @if ($errors->has('latitude'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('latitude') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="longitude">Долгота <br>
                    <small>Текст длиною не более 16 символов</small>
                </label>
                <input class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" id="longitude"
                 name="longitude" type="text"
                 value="@if(old('longitude')){{ old('longitude') }}@else{{$value->longitude ?? ''}}@endif" autofocus>
                @if ($errors->has('longitude'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('longitude') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="time_zone">Часовой пояс, в котором расположен авиаплощадки <br>
                    <small>Текст длиною не более 16 символов</small>
                </label>
                <input class="form-control{{ $errors->has('time_zone') ? ' is-invalid' : '' }}" id="time_zone" 
                 name="time_zone" type="text"
                 value="@if(old('time_zone')){{ old('time_zone') }}@else{{$value->time_zone ?? ''}}@endif"
                 autofocus><!-- удалить!!!!!!!!!! required -->
                @if ($errors->has('time_zone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('time_zone') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="city_id">
                    Ссылка на город, в котором расположена авиаплощадки <br>
                    <small>Число, значением не более 999</small>
                </label>
                <input class="form-control{{ $errors->has('city_id') ? ' is-invalid' : '' }}" id="city_id"
                 name="city_id" type="number"
                 value="@if(old('city_id')){{ old('city_id') }}@else{{$value->city_id ?? ''}}@endif"
                 autofocus>
                @if ($errors->has('city_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('city_id') }}</strong>
                </span>
                @endif
            </div>

            {{ method_field('put') }}

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