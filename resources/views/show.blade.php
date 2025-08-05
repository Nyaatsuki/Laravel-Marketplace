<x-layout>
    <div class="show-container">
        <img src="{{ $post->image }}" class="small-img">
        <a href="/category/{{ $post->category->slug }}" class="category-tag">{{ $post->category->name }}</a>
        <h1 class="show-title">{{$post->title}}</h1>
        <p>€{{ number_format($post->price, 2) }}</p>
        <p>{!! $post->body !!}</p>
    </div>
</x-layout>