<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Tile extends Model
{
    protected $guarded = ['id'];

    public static function add($fields)
    {
        $tile = new static;
        $tile->fill($fields);
        $tile->save();

        return $tile;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

     

   
}