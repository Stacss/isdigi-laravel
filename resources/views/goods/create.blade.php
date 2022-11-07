{{--подключаем layout--}}
@extends('layouts.layout')

{{--указваем title страницы--}}
@section('title')
    <title>Добавление товара</title>
@endsection

{{--добавляем основной контент--}}
@section('content')

{{--добавление сообщения о записи--}}
@include('collection.message')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-xs-12 col-md-offset-2">
                <h1>Добавление товара</h1>

                <form action="/goods" method="post">
                    <div class="form-group">

                        @csrf

                        <select name="collection_id" id="collection_id" class="form-select">
                            <option selected>Выберете коллекцию</option>

                        @foreach($collection as $row)

                            <option value="{{$row->id}}">{{$row->name}}</option>

                        @endforeach

                        </select>

                        <input type="text" name="collection" placeholder="Название товара" class="form-control" required style="margin-top: 10px">
                        <input type="number" name="price" placeholder="Цена товара" class="form-control" required style="margin-top: 10px">
                        <button type="submit" class="btn btn-success" style="margin-top: 10px">Добавить</button>
                    </div>
                </form>
                <a href="/goods" class="btn btn-primary" style="margin-top: 10px">Назад к списку товаров</a>
            </div>
        </div>
    </div>


@endsection
