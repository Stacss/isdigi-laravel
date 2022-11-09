<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Goods;

class Collection extends Model
{
    //уточняем название таблицы, так как фреймворк автоматически добавляет 's' в конце
    protected $table = 'collection';
    protected $fillable = ['title'];

    public function goods(){
        return $this->hasMany(Goods::class);
    }

}
