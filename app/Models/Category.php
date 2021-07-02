<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function getNameAttribute($avalue)
    {
       return strtoupper($avalue);
    }


    public function setNameAttribute($value)
    {
        $this  -> attributes['name']  =  "shuvo" . $value;
    }














}
