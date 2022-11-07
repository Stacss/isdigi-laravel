<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Goods;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use function React\Promise\all;

class GoodsController extends Controller
{
    /**
     * Вывод на экран списка товаров.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = new Goods();
        $goods = $goods->all();

        $collection = new Collection();
        $collection = $collection->all();

        return view('goods.index', ['goods' => $goods, 'collection' => $collection]);
    }

    /**
     * Форма создания нового товара.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //получаем список всех записей с таблицы goods
        $goods = Goods::orderBy('id', 'desc');
        $collection = new Collection();

        //все варианты коллекций для заполнения формы товаров
        $collection = $collection->all();

        return view('goods.create', ['collection' => $collection])->with('goods', $goods);
    }

    /**
     * Добавление новой записи товара в БД
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goods = new Goods();
        // заполнение полей таблицы данными из формы
        $goods->collection_id = $request->input('collection_id');
        $goods->price = $request->input('price');
        $goods->name = $request->input('collection');
        $goods->save();

        return redirect()->route('goods.create')->with('success', 'Товар успешно добавлен');
    }

    /**
     * Просмотр товара.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //находим товар
        $goods = Goods::find($id);
        $collection = new Collection();

        return view('goods.show', ['goods' => $goods, 'collection' => $collection]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goods = Goods::find($id);
        $collection = new Collection();
        $collection = $collection->all();

        return view('goods.edit', ['data'=> $goods, 'collection' => $collection]);
    }

    /**
     * Обнавление товара в БД.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $goods = Goods::find($id);
        $goods->collection_id = $request->input('collection_id');
        $goods->name = $request->input('name');
        $goods->price = $request->input('price');
        $goods->save();

        return redirect()->route('goods.edit', $goods)->with('success', 'Товар успешно отредактирован');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goods = Goods::find($id);
        $goods->delete();
        $goods = $goods->all();

        return redirect()->route('goods.index', ['goods' => $goods])->with('success', 'Товар удален');
    }

    public function destroy_show( $id)
    {
        $goods = Goods::find($id);
        return view('goods.destroy', ['goods' => $goods]);
    }
}
