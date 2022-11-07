{{--подключаем layout--}}
@extends('layouts.layout')

{{--указваем title страницы--}}
@section('title')
    <title>Редактирование коллекции {{$data->name}}</title>
@endsection

{{--добавляем основной контент--}}
@section('content')

{{--добавление сообщения о записи--}}
@include('collection.message')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-xs-12 col-md-offset-2">
                <h1>Редактирование коллекции {{$data->name}}</h1>

                <form action="/collection/{{ $data->id }}" method="post">

                    <div class="form-group">

                        @csrf
                        @method('PUT')

                        <input type="text" name="collection" placeholder="Название коллекции" class="form-control" required value="{{$data->name}}">
                        <button type="submit" class="btn btn-success" style="margin-top: 10px">Редактировать</button>
                    </div>
                </form>
                <a href="/collection" class="btn btn-primary" style="margin-top: 10px">Назад к списку коллекций</a>
            </div>
        </div>
    </div>


@endsection
