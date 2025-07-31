<x-layout>
    <div class="show-container">
        <img src="{{ $post->image }}" class="small-img">
        <p>{{ $post->category->name }}</p>
        <h1 class="show-title">{{$post->title}}</h1>
        <p>€{{ number_format($post->price, 2) }}</p>
        <p>{!! $post->body !!}</p>
    </div>
</x-layout>