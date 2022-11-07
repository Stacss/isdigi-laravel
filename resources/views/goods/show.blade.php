{{--подключаем layout--}}
@extends('layouts.layout')

{{--указваем title страницы--}}
@section('title')
    <title>Просмотр товара {{$goods->name}}</title>
@endsection

{{--добавляем основной контент--}}
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-xs-12 col-md-offset-2">
                <h1>Просмотр товара</h1>

                <p>ID товара - <b>{{$goods->id}}</b> </p>
                <p>Название коллекции - <b>{{$collection->find($goods->collection_id)->name}}</b></p>
                <p>Название товара - <b>{{$goods->name}}</b></p>
                <p>Дата создания - <b>{{$goods->created_at}}</b></p>
                <p>Дата изменения - <b>{{$goods->updated_at}}</b></p>
                <a href="/collection/{{ $goods->id }}/edit" class="btn btn-success">Редактировать</a>
                <a href="/goods" class="btn btn-primary">Назад к списку товаров</a>

            </div>
        </div>
    </div>
@endsection
