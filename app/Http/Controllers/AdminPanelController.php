<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    //Show AdminPanel

    //show register page
    public function registerPage()
    {
        return view('backend.register');
    }
    //show Login page
    public function loginPage()
    {
        return view('backend.login');
    }


    //Show Admin Panel
    public function Index()
    {
        return view('backend.panel');
    }


}
