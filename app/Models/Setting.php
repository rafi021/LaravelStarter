<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function getByName($name, $deafult = null)
    {
       $setting = self::whereName($name)->first();
       if(isset($setting)){
           return $setting->value;
       }else{
           return $deafult;
       }
    }
}
