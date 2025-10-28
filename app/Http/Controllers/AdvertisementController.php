<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Advertisement;
use Illuminate\support\Facades\Auth;

class AdvertisementController extends Controller
{
    public function index(){
        return view('index', [
            'advertisements' => Advertisement::orderBy('created_at', 'desc')->filter(request(['category', 'author']))->get()
        ]);
    }

    public function create(){
        $categories = categories::all();
        return view('advertisements.create', ['categories' => $categories]);
    }

    public function show(Advertisement $advertisement)
    {
        return view('show', [
            'advertisement' => $advertisement
        ]);
    }

    public function store(){
        
        $user = Auth::user()->id;

        $body = preg_split('/\r\n|\r|\n/', request()->input('description'));
        $body = '<p>' . implode('</p><p>', $body) . '</p>';

         $attributes = request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:1000'],
            'price' =>['required', 'decimal:2'],
            'categories' => ['required']
        ]);

        //dd($attributes);

        $imageName = time() . '.' . request()->image->extension();
        request()->image->move(public_path('img'), $imageName);

        Advertisement::create([
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

    public function edit(Advertisement $advertisement){
        $categories = categories::all();
        $body = str_replace('</p><p></p><p>', "\r\n\r\n", $advertisement->body);

        return view('advertisements.edit', ['categories' => $categories, 'advertisement' => $advertisement, 'body' => $body]);
    }

    public function update(Advertisement $advertisement){
        $body = preg_split('/\r\n|\r|\n/', request()->input('description'));
        $body = '<p>' . implode('</p><p>', $body) . '</p>';

         $attributes = request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' =>['required', 'decimal:2'],
        ]);

        $advertisement->update([
            'title' => request()->input('title'),
            'body' => $body,
            'price' => request()->input('price')
        ], $attributes);

        return redirect('/');
    }

    public function destroy(Advertisement $advertisement) {
        
        $advertisement->delete();

        return redirect("/");
    }
}