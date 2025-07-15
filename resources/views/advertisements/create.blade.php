<x-layout>
    <section class="advertisement-form">
        <div>
            <form method="POST" action="/create-post" enctype="multipart/form-data">
                @csrf

                <label for="name">Title</label><br>
                <input type="text" id="title" name="title" value="{{ old('title') }}"><br>
                @error('name')
                <p style="color:red; font-size:12px;">{{ $message }}</p>
                @enderror
                <br>
                <label for="description">Description</label><br>
                <input type="text" id="description" name="description" value="{{ old('description') }}"><br>
                @error('description')
                <p style="color:red; font-size:12px;">{{ $message }}</p>
                @enderror
                <br>
                <label for="price">Price</label><br>
                <input id="price" name="price" type="number" value="{{ old('price') }}"><br>
                @error('price')
                <p style="color:red; font-size:12px;">{{ $message }}</p>
                @enderror
                <br>
                <input type="file" id="image" name="image"><br>
                @error('image')
                <p style="color:red; font-size:12px;">{{ $message }}</p>
                @enderror

                <button type="submit">Submit</button>
            </form>
        </div>
    </section>
</x-layout>