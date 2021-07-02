<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{

    public function Index()
    {
        $allBrand = Brand::latest()->get();
        return view('backend.layouts.brand.index',[

            'alldata'       => $allBrand,

        ]);
    }


    //Function Brand Add
    public function brandAdd(Request $request)
    {

        $request -> validate([

            'name'      => 'required',

        ],[

            'name.required' => 'Please Type Brand Name Filed',

        ]);


        $brand   =    Brand::create([
            'user_id'   => Auth::user()->id,
            'name'      => $request -> name,
            'slug'      => Str::slug($request -> name),
        ]);

        //Image Upload

        $photouname = '';
        if ($request->hasFile('photo')) {
            $getphoto = $request->file('photo');
            $photouname = md5(time().rand()).'.'.$getphoto -> getClientOriginalExtension();
            $getphoto -> move(public_path('backend/assets/img/brands'), $photouname);

            $brand -> image()->create([
                'imagename'     => $photouname,
            ]);
        }
        return redirect()->back()->with('success' , 'Brand Insert Successfull');

    }

    //Brand Edit
    public function brandEdit(Request $request , $id)
    {

        $brandEditid = Brand::find($id);

        return view('backend.layouts.brand.edit' , [

            'branddata' => $brandEditid,

        ]);


    }

    //Brand Delete
    public function brandDelete(Request $request , $id)
    {
        $brand_delete = Brand::find($id);
        $brand_delete -> delete();
        $brand_delete -> update();
        return redirect()->back()->with('success' , 'Brand Deleted Successfull');




    }












}
