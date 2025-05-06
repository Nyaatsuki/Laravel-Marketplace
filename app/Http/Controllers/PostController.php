<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view("advertisements.create");
    }

    public function store(){
        
    }
}
