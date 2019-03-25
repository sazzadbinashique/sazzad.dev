<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function __construct()
    {

        $this->middleware('IsAdmin');


    }


    public function index(){

        return "your are an admin  because you are seeing this page";
    }
}
