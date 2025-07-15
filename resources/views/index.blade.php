<x-layout>
    @Foreach ($posts as $post)
    <article class="post-container">
        <div class="container-title">
            <h3>{{$post->title}}</h3>
            <!--<span>published <time>{{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}</time></span>-->
        </div>
        <div class="container-excerpt">
            {!! $post->body !!}
        </div>
        <img src="{{ $post->image }}" class="small-img"><br><br>
        <a href="advertisement/{{$post->slug}}">GO HERE. AAAAAAAAAAAA</a>
    </article>
    @endforeach
</x-layout>