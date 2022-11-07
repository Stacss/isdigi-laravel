{{--подключаем layout--}}
@extends('layouts.layout')

{{--указваем title страницы--}}
@section('title')
    <title>Удаление товара {{$goods->name}}</title>
@endsection

{{--добавляем основной контент--}}
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-xs-12 col-md-offset-2">

                <h1>Удаление товара {{$goods->name}}</h1>

                <p>Вы уверены что хотите <b>удалить</b> товар - <b>{{$goods->name}}</b>?</p>
                <form method="post" action="/goods/{{ $goods->id }}">

                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit"class="btn btn-danger">Удалить</button>
                </form>

                <a href="/goods" class="btn btn-primary" style="margin-top: 10px">Назад к списку товаров</a>

            </div>
        </div>
    </div>
@endsection
