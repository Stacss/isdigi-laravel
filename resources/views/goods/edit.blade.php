{{--подключаем layout--}}
@extends('layouts.layout')

{{--указваем title страницы--}}
@section('title')
    <title>Редактирование товара {{$data->name}}</title>
@endsection

{{--добавляем основной контент--}}
@section('content')

{{--добавление сообщения о записи--}}
@include('collection.message')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-xs-12 col-md-offset-2">
                <h1>Редактирование товара {{$data->name}}</h1>

                <form action="/goods/{{ $data->id }}" method="post">

                    <div class="form-group">

                        @csrf
                        @method('PUT')
                        <select name="collection_id" id="collection_id" class="form-select">
                            <option selected value="{{$data->collection_id}}">{{$collection->find($data->collection_id)->name}}</option>

                            @foreach($collection as $row)

                                <option value="{{$row->id}}">{{$row->name}}</option>

                            @endforeach

                        </select>

                        <input type="text" name="name" placeholder="Название товара" class="form-control" required value="{{$data->name}}" style="margin-top: 10px">
                        <input type="number" name="price" placeholder="Цена товара" class="form-control" required style="margin-top: 10px" value="{{$data->price}}" >
                        <button type="submit" class="btn btn-success" style="margin-top: 10px">Редактировать</button>
                    </div>
                </form>
                <a href="/goods" class="btn btn-primary" style="margin-top: 10px">Назад к списку товаров</a>
            </div>
        </div>
    </div>


@endsection
