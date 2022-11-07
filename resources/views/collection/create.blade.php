{{--подключаем layout--}}
@extends('layouts.layout')

{{--указваем title страницы--}}
@section('title')
    <title>Добавление коллекции</title>
@endsection

{{--добавляем основной контент--}}
@section('content')

{{--добавление сообщения о записи--}}
@include('collection.message')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-xs-12 col-md-offset-2">
                <h1>Добавление коллекции</h1>

                <form action="/collection" method="post">
                    <div class="form-group">

                        @csrf

                        <input type="text" name="collection" placeholder="Название коллекции" class="form-control" required>
                        <button type="submit" class="btn btn-success" style="margin-top: 10px">Добавить</button>
                    </div>
                </form>
                <a href="/collection" class="btn btn-primary" style="margin-top: 10px">Назад к списку коллекций</a>
            </div>
        </div>
    </div>


@endsection
