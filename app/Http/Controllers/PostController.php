<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view("advertisements.create");
    }

    public function store(){
        // SHIT I NEED TO PUSH TO THE DB LIKE THE DUMB BITCH I AM: Ad Title, Ad Description, Ad price, Ad image
        // Grab the info from the inputs and store them in the database, then show them on the main page
    }
}
