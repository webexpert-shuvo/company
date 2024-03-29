<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Brand;
use App\Models\Aboutus;
use App\Models\Gallery;
use App\Models\Homeservices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomaPageController extends Controller
{


    //Show Home Page
    public function Index()
    {
        $brandData      =   Brand::latest()->get();
        $aboutusdata    =   Aboutus::first();
        $allhomeservices = Homeservices::latest()->get();

        return view('company.homepage' , [
            'brandimage'        => $brandData,
            'aboutdata'         => $aboutusdata,
            'servicesdata'      => $allhomeservices,
        ]);
    }






}
