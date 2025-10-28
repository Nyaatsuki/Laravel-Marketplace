<x-layout>
    <section class="advertisement-form">
        <div>
            <form method="POST" action="/advertisement/{{$advertisement->slug}}/edit" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="title">Title</label><br>
                <input type="text" id="title" name="title" value="{{ $advertisement->title }}"><br>
                @error('title')
                <p style="color:red; font-size:12px;">{{ $message }}</p>
                @enderror
                <br>

                <label for="categories">Categories</label><br>
                <select name="categories" class="category-dropdown" id="categories">
                    @foreach ($categories->all() as $category)
                    @if ($category == 'product')
                    <option value="{{ $advertisement->category->id }}" id="categories" name="categories" selected>{{$advertisement->category->name}}</option>
                    @endif
                    <option value="{{ $category->id }}" id="categories" name="categories">{{$category->name}}</option>
                    @endforeach
                </select><br>
                @error('categories')
                <p style="color:red; font-size:12px;">{{ $message }}</p>
                @enderror
                <br>

                <label for="description">Description</label><br>
                <input type="text" id="description" name="description" value="{{ str_replace(array('<p>','</p>'), "", $body) }}"><br>
                @error('description')
                <p style="color:red; font-size:12px;">{{ $message }}</p>
                @enderror
                <br>

                <label for="price">Price</label><br>
                <input id="price" name="price" type="number" value="{{$advertisement->price}}" step="0.01"><br>
                @error('price')
                <p style="color:red; font-size:12px;">{{ $message }}</p>
                @enderror
                <br>
                
                <button type="submit">Save</button>
            </form>
            <form action="/advertisement/{{$advertisement->slug}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="del-btn" value="Delete">Delete</button>
            </form>
        </div>
    </section>
</x-layout>