<?php

namespace App\Http\Controllers;

use App\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{


    /**
     * Вывод на экран списка коллекций.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = new Collection();
        $collection = $collection->all();
        return view('collection.index', ['collection' => $collection]);
    }

    /**
     * Форма создания новой коллекции.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //получаем список всех записей с таблицы collection
        $collection = Collection::orderBy('id', 'desc');
        return view('collection.create')->with('collection', $collection);
    }

    /**
     * Добавление новой записи коллекции с БД
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collection = new Collection();

        //проверка на совпадение уже имеющихся коллекций
        $checking = DB::table('collection')->where('name', $request->collection)->first();

        if ($checking == true) {

            //если есть совпадение отправляем назад с сообщением об ошибке
            return redirect()->route('collection.create')->with('error', 'Такая коллекция уже существует');

        }

        else {

            //если нет такой коллецкии делаем запись в бд
            $collection->name = $request->input('collection');

            $collection->save();

        }

        return redirect()->route('collection.create')->with('success', 'Коллекция успешно добавлена');

    }

    /**
     * Просмотр коллекции.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        return view('collection.show', ['collection' => $collection]);
    }

    /**
     * Форма редактирования коллекции.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        return view('collection.edit', ['data'=> $collection]);
    }

    /**
     * Обнавление коллекции в БД.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        $collection->name = $request->input('collection');
        $collection->save();

        return redirect()->route('collection.edit', $collection)->with('success', 'Коллекция успешно отредактировна');
    }

    /**
     * Удаление коллекции.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();
        $collection = $collection->all();

        return redirect()->route('collection.index', ['collection' => $collection])->with('success', 'Коллекция удалена');
    }

     /**
     * Предупреждение удаления коллекции.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy_show( $id)
    {
        $collection = new Collection();
        $collection = $collection->find($id);

        return view('collection.destroy', ['collection' => $collection]);
    }


}
