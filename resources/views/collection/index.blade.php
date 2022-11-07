{{--подключаем layout--}}
@extends('layouts.layout')

{{--указваем title страницы--}}
@section('title')
    <title>Коллекции</title>
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
                        <h1>Список коллекций</h1>
                        <p>В данном разделе отображается список всех коллекций</p>
                        <a href="/collection/create" class="btn btn-success">Добавить новую коллекцию</a>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Номер</th>
                                <th>Назвение коллекции</th>
                                <th style="text-align:right;">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($collection as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td style="text-align:right;">
                                        <a href="/collection/{{ $row->id }}" class="btn btn-info">Посмотреть</a>
                                        <a href="/collection/{{ $row->id }}/edit" class="btn btn-success">Редактировать</a>
                                        <a href="/collection/{{ $row->id }}/destroy" class="btn btn-danger">Удалить</a>
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
