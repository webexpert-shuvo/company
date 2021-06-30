<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{
    //Show Category Page

    public function index()
    {
        $allcate =  Category::latest()->get();
       return view('backend.layouts.category.index' , [

            'alldata'       => $allcate,

       ]);
    }


    //Category Add
    public function addCategory(Request $request)
    {

        $request ->validate([

            'name'          => 'required',

        ],[

            'name.required'     => 'please fill the form',

        ]);

        //Photo Upload
        $photoname = '';
        if ($request->hasFile('photo')) {
            $fileget = $request->file('photo');
            $photoname = md5(time().rand()).'.'.$fileget->getClientOriginalExtension();
            $fileget ->move(public_path('backend/assets/img/category') , $photoname);
        }


        Category::create([

            'user_id'   =>  Auth::user()->id,
            'name'      =>  $request -> name,
            'slug'      =>  Str::slug($request->name),
            'photo'     => $photoname,

        ]);

        return redirect()->back()->with('success' , 'Category Insert Successfull');
    }


    //Category Edit
    public function categoryEdit(Request $request , $id)
    {

        $cate_edit_id = Category::find($id);

        return view('backend.layouts.category.edit' , [

            'catedata'      => $cate_edit_id,

        ]);


    }


    //Category Update
    public function categoryUpdate(Request $request , $id)
    {
        $cate_update_id  = Category::find($id);
        $cate_update_id -> name = $request -> name;
        $cate_update_id -> slug = Str::slug($request -> name);
        $cate_update_id -> update();
        return redirect()->back()->with('success' , 'Category Update Successfull');

    }

    //Category Delete

    public function categoryDelete(Request  $request , $id )
    {
       $cate_delete_id  = Category::find($id);
       $cate_delete_id -> delete();
       $cate_delete_id -> update();
       return redirect()->back()->with('success' , 'Category Delete Successfull');


    }




}
