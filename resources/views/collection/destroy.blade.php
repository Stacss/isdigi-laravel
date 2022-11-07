{{--подключаем layout--}}
@extends('layouts.layout')

{{--указваем title страницы--}}
@section('title')
    <title>Удаление коллекции {{$collection->name}}</title>
@endsection

{{--добавляем основной контент--}}
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-xs-12 col-md-offset-2">

                <h1>Удаление коллекции {{$collection->name}}</h1>

                <p>Вы уверены что хотите <b>удалить</b> коллекцию - <b>{{$collection->name}}</b>?</p>
                <form method="post" action="/collection/{{ $collection->id }}">

                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit"class="btn btn-danger">Удалить</button>
                </form>

                <a href="/collection" class="btn btn-primary" style="margin-top: 10px">Назад к списку коллекций</a>

            </div>
        </div>
    </div>
@endsection
