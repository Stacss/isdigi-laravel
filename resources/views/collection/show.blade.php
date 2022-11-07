{{--подключаем layout--}}
@extends('layouts.layout')

{{--указваем title страницы--}}
@section('title')
    <title>Просмотр коллекции {{$collection->name}}</title>
@endsection

{{--добавляем основной контент--}}
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-xs-12 col-md-offset-2">
                <h1>Просмотр коллекции</h1>

                <p>ID коллекции - <b>{{$collection->id}}</b> </p>
                <p>Имя коллекции - <b>{{$collection->name}}</b></p>
                <p>Дата создания - <b>{{$collection->created_at}}</b></p>
                <p>Дата изменения - <b>{{$collection->updated_at}}</b></p>
                <a href="/collection/{{ $collection->id }}/edit" class="btn btn-success">Редактировать</a>
                <a href="/collection" class="btn btn-primary">Назад к списку коллекций</a>
                
            </div>
        </div>
    </div>
@endsection
