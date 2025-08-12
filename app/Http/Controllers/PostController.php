<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Post;
use Illuminate\support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        return view('index', [
            'posts' => Post::orderBy('created_at', 'desc')->filter(request(['category']))->get()
        ]);
    }

    public function create(){
        $categories = categories::all();
        return view('advertisements.create', ['categories' => $categories]);
    }

    public function show(Post $post)
    {
        return view('show', [
            'post' => $post
        ]);
    }

    public function store(){
        
        $user = Auth::user()->id;

        // SHIT I NEED TO PUSH TO THE DB LIKE THE DUMB BITCH I AM: Ad Title, Ad Description, Ad price, Ad image
        // Grab the info from the inputs and store them in the database, then show them on the main page

        $body = preg_split('/\r\n|\r|\n/', request()->input('description'));
        $body = '<p>' . implode('</p><p>', $body) . '</p>';

         $attributes = request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:1000'],
            'price' =>['required', 'decimal:2'],
            'categories' => ['required']
        ]);

        //dd($attributes);

        $imageName = time() . '.' . request()->image->extension();
        request()->image->move(public_path('img'), $imageName);

        Post::create([
            'slug' => random_int(1000000000000, 9999999999999),
            'user_id' => $user,
            'category_id' => request()->input('categories'),
            'title' => request()->input('title'),
            'body' => $body,
            'image' => '/img/' . $imageName,
            'price' => request()->input('price')
        ]);

        return redirect('/');
    }
}
