<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{


    //Show Gallery Page
    public function Index()
    {
        $allgallerydata =    Gallery::latest()->get();
        return view('backend.layouts.gallery.index' ,[

            'gallerys'      =>  $allgallerydata

        ]);
    }

    //Show Gallery Page
    public function galleryCreate()
    {
        return view('backend.layouts.gallery.create');
    }

    //Gallery Store
    public function galleryStore(Request $request)
    {

      //  gallery  Image Get

      $gallerydata =   Gallery::create([

        'name'      => $request -> name,


        ]);

        $fileuname = [];
        if ($request -> hasFile('photo')) {
           $getfile = $request -> file('photo');
           foreach ($getfile as  $galleery) {
            $fileuname = md5(time().rand()).'.'.$galleery -> getClientOriginalExtension();
            $galleery -> move(public_path('backend/assets/img/gallery') , $fileuname );

            $gallerydata -> image() -> create([

                'imagename'     => $fileuname,

            ]);


           }
        }




       return redirect()->back()->with('success' , 'Gallery Inssert Successful');


    }





}
