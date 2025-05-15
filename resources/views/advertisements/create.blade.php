<x-layout>
    <section class="advertisement-form">
        <div>
            <form method="POST" action="/register">
                @csrf

                <label for="name">Title</label><br>
                <input type="text" id="name" name="name" value="{{ old('name') }}"><br>
                <br>
                <label for="description">Description</label><br>
                <input type="text" id="description" name="description" value="{{ old('description') }}"><br>
                <br>
                <label for="price">Price</label><br>
                <input type="text" id="price" name="price" value="{{ old('price') }}"><br>
                <br>
                <label for="file-upload" class="custom-file-upload">
                    <img src="https://static-00.iconduck.com/assets.00/file-upload-icon-1708x2048-tmbrin9e.png">  Custom Upload
                </label>
                <input type="file" id="image" name="image"><br>
                <br>
            </form>
        </div>
    </section>
</x-layout>