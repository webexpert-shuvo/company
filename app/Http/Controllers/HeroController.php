<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{

    //Hero Slider Show

    public function Index()
    {
        $allbrand = Hero::latest()->get();
        return view('backend.layouts.hero.index',[

            'alldata'   =>  $allbrand,

        ]);
    }

    //Slider Insert or Craeate


    public function sliderCreate(Request $request)
    {
        $sldier =  Hero::create([
            'name'      => $request -> name,
            'content'   => $request -> content,
            'buttontext'   => $request -> buttontext,
            'url'   => $request -> buttonurl,

        ]);

        $iuname = ' ';
        if ($request -> hasFile('photo')) {
            $sliderget = $request -> file('photo');
            $iuname =  md5(time().rand()).'.'.$sliderget -> getClientOriginalExtension();
            $sliderget -> move(public_path('backend/assets/img/slider') , $iuname );

            $sldier -> image()->create([

                'imagename'  => $iuname,
            ]);

        }
        return redirect()->back()->with('success'  , 'Slider Insert Done');
    }

    //Hero Edit
    public function heroEdit(Request $request , $id)
    {
        $hero_edit  =  Hero::find($id);
        return view('backend.layouts.hero.edit' , [
            'herodata'      => $hero_edit
        ]);
    }

    //Hero Update

    public function heroUpdate(Request $request , $id)
    {
        $hero_update_id = Hero::find($id);
        $hero_update_id -> name  =  $request -> name;
        $hero_update_id -> content  =  $request -> content;
        $hero_update_id -> buttontext  =  $request -> buttontext;
        $hero_update_id -> url  =  $request -> url;
        $hero_update_id -> update();

        return redirect()->back()->with('success' , 'Hero Updated Successful');


    }


    //Hero Delete
    public function heroDelete(Request $request , $id)
    {
        $hero_delete_id =  Hero::find($id);
        $hero_delete_id -> delete();
        $hero_delete_id -> update();
        return redirect()->back()->with('success' , 'Hero Deleted Successful');
    }










}
