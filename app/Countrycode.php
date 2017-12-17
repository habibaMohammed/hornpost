<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countrycode extends Model
{
   public static function lists()
    {
        return self::all()->pluck('name', 'id');
    }


}
