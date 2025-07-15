<x-layout>
    <div class="show-container">
        <h1 class="show-title">{{$post->title}}</h1>
        <p>{!! $post->body !!}</p>
        <p>{{ number_format($post->price, 2) }}</p>
        <img src="{{ $post->image }}" class="small-img">
    </div>
</x-layout>