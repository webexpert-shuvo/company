<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Hero;
use Illuminate\Http\Request;

class HomaPageController extends Controller
{


    //Show Home Page
    public function Index()
    {
        $brandData      =   Brand::latest()->get();
     //   $herosliderdata =   Hero::latest()->get();

        return view('company.homepage' , [
            'brandimage'    => $brandData,

        ]);
    }






}
