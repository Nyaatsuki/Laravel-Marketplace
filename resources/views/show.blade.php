<x-layout>
    <div class="show-container">
        <img src="{{ $advertisement->image }}" class="big-img">
        <h5 class="user-name">Posted by: {{$advertisement->author->name }}</h5>
        <a href="/category/{{ $advertisement->category->slug }}" class="category-tag">{{ $advertisement->category->name }}</a>
        <h1 class="show-title">{{$advertisement->title}}</h1>
        <p>€{{ number_format($advertisement->price, 2) }}</p>
        <p>{!! $advertisement->body !!}</p>
    </div>
</x-layout>