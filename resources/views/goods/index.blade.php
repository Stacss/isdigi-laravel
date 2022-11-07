{{--подключаем layout--}}
@extends('layouts.layout')

{{--указваем title страницы--}}
@section('title')
    <title>Товары</title>
@endsection


{{--добавляем основной контент--}}
@section('content')

{{--добавление сообщения о записи--}}
@include('collection.message')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-xs-12 col-md-offset-2">
                <div class="panel panel-default">


                    <div class="panel-heading">
                        <h1>Список товаров</h1>
                        <p>В данном разделе отображается список всех товаров</p>
                        <a href="/goods/create" class="btn btn-success">Добавить новый товар</a>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Номер</th>
                                <th>Коллекция</th>
                                <th>Назвение товра</th>
                                <th>Цена</th>
                                <th style="text-align:right;">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($goods as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{$collection->find($row->collection_id)->name}}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->price }}</td>

                                    <td style="text-align:right;">
                                        <a href="/goods/{{ $row->id }}" class="btn btn-info">Посмотреть</a>
                                        <a href="/goods/{{ $row->id }}/edit" class="btn btn-success">Редактировать</a>
                                        <a href="/goods/{{ $row->id }}/destroy" class="btn btn-danger">Удалить</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
