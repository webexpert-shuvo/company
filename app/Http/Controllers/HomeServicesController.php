<?php

namespace App\Http\Controllers;

use App\Models\Homeservices;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class HomeServicesController extends Controller
{

    public function Index()
    {
        $allservicesdata = Homeservices::latest()->get();
        return view('backend.layouts.services.index',[

            'services'      => $allservicesdata,

        ]);
    }

    public function servicesCreate()
    {
        return view('backend.layouts.services.create');
    }

    public function servicesStore(Request $request)
    {

        Homeservices::create([

            'iconname'      => $request -> iconservices,
            'name'          => $request -> name,
            'content'       => $request -> content,

        ]);

        return redirect()->back()->with('success' , 'Services Added Successful');





    }











}
