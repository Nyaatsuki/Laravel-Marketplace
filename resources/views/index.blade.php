<x-layout>
    <div class="content">
        <div class="layout-boxes">
            @Foreach ($posts as $post)
            <div class="{{$loop->iteration < 3 ? 'grid-col-3' : 'grid-col-2'}}">
                <article class="post-container">
                    <div class="container-title">
                        <h3>{{$post->title}}</h3>
                        <!--<span>published <time>{{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}</time></span>-->
                    </div>
                    <a href="/?category={{ $post->category->slug }}&{{ http_build_query(request()->except('category')) }}" class="category-tag">{{$post->category->name}}</a>
                    <div class="container-excerpt">
                        {!! $post->body !!}
                    </div>
                    <p>€{{ number_format($post->price, 2) }}</p>
                    <img src="{{ $post->image }}" class="small-img"><br><br>
                    <a href="advertisement/{{$post->slug}}">GO HERE. AAAAAAAAAAAA</a>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>