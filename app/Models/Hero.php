<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $guarded = [];

    //image get in Image Model
    public function image()
    {
        return $this -> morphOne(Image::class , 'imageable');
    }



}
