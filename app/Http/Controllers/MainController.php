<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Goods;
use Illuminate\Http\Request;
use function React\Promise\all;

class MainController extends Controller
{
    public function show(){

        /*$collection = new Collection;
        $collection = $collection->goods();*/


        /*$collection = new Collection;
        $collection = $collection->goods();*/

        $collection = Collection::has('goods')->get();

        $goods = Goods::all();


        return view('show',['collection' => $collection, 'goods' => $goods]);

    }
}
