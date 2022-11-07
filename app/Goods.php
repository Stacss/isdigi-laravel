<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Collection;

class Goods extends Model
{
    public $table = 'goods_collection';
    public $fillable = ['title'];

    public function collection(){
        //отношение к таблице collection, указываем имя таблицы, название столбца.
        return $this->belongsToMany(Collection::class, 'goods_collection', 'collection_id');
    }


}
