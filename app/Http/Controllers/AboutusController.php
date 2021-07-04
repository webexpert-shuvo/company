<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class AboutusController extends Controller
{


    //Show Aboutus Section page

    public function Index()
    {
       $allaboutus = Aboutus::all();
       return View('backend.layouts.aboutus.index',[

            'aboutusdata'       =>  $allaboutus,

       ]);
    }


    //About Us create

    public function aboutusCraete(Request $request )
    {
        Aboutus::create([
            'name'      => $request -> name,
            'content'   => $request -> content,
            'description'   => $request -> aboutsection,
        ]);

        return redirect()->back()->with('success' , 'About Us Section insert');


    }

    //About us edit

    public function aboutusEdit(Request $request , $id)
    {
        $about_us_edit_data = Aboutus::find($id);
        return view('backend.layouts.aboutus.edit' ,[

            'aboutdata'     => $about_us_edit_data,

        ]);


    }



    //Abouts Us Delete

    public function aboutusDelete(Request $request , $id)
    {

        $aboutsus_delete =  Aboutus::find($id);
        $aboutsus_delete -> delete();
        $aboutsus_delete -> update();

        return redirect()->back()->with('success' , 'About Us Section Deleted Successfull');




    }








}
