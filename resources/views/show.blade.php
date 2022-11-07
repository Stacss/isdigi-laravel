{{--подключаем layout--}}
@extends('layouts.layout')

{{--указваем title страницы--}}
@section('title')
    <title>Просмотр коллекций и товаров</title>
@endsection

{{--добавляем основной контент--}}
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h1>Просмотр коллекций и товаров</h1>
                <div class="row">

                    {{--перебераем все коллекциии товары--}}
                    <?$i = 0;?>
                @foreach($collection as $row)

                    <?$i++;?>

                    {{--если число коллекции кратное 3--}}
                        @if($i%3===0)

                    {{--добавляем пустой блок--}}
                            <div class="col-lg-4 col-sm-4 col-4" style="">
                            </div>
                                <?$i++;?>


                            <div class="col-lg-4 col-sm-4 col-4" style="border: 1px solid; border-radius: 5px; background-color: gainsboro">
                                <h3 style="color: red">Коллекция</h3>
                                <p>{{$row->name}}</p>
                                <a href="/collection/{{$row->id}}" class="btn btn-outline-primary">Посмотреть коллекцию</a>
                            </div>

                        @else
                            <div class="col-lg-4 col-sm-4 col-4" style="border: 1px solid; border-radius: 5px; background-color: gainsboro">
                                <h3 style="color: red">Коллекция</h3>
                                <p>{{$row->name}}</p>
                                <a href="/collection/{{$row->id}}" class="btn btn-outline-primary">Посмотреть коллекцию</a>
                            </div>

                        @endif

                {{--вывод товаров относящихся к данной коллекции--}}
                    @foreach($goods as $good)
                        @if($good->collection_id === $row->id)

                            <?$i++;?>

                            <div class="col-lg-4 col-sm-4 col-4" style="border: 1px solid; border-radius: 5px; background-color: aliceblue">
                                <h4>Товар</h4>
                                <p><b>{{$good->name}}</b></p>
                                <p>Цена: {{$good->price}}</p>
                                <a href="/goods/{{$row->id}}" class="btn btn-outline-primary" style="margin-bottom: 10px">Посмотреть товар</a>
                            </div>

                        @endif

                    @endforeach

                @endforeach
                </div>


            </div>
        </div>
    </div>
@endsection
