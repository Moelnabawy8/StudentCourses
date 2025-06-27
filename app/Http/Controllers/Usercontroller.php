<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Usercontroller extends Controller
{
   public function index()
   {
       return view('welcome');
   }
    public function about()
    {
         return view('about');
    }
    public function show(string $id)
    {
        return "your id is $id";
    }
    public function h()
    {
        return view('h',["name"=>"MOO","age"=>10]);
    }
}
