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
                <!-- Image input -->
            </form>
        </div>
    </section>
</x-layout>