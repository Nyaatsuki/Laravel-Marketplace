<x-layout>
    <div class="content">
        <div class="layout-boxes">
            @Foreach ($advertisements as $advertisement)
            <div class="{{$loop->iteration < 3 ? 'grid-col-3' : 'grid-col-2'}}">
                <article class="post-container">
                    <div class="container-title">
                        <h3>{{$advertisement->title}}</h3>
                        <!--<span>published <time>{{ \Carbon\Carbon::parse($advertisement->created_at)->diffForHumans() }}</time></span>-->
                    </div>
                    <h5 class="user-name">Posted by: {{ $advertisement->author->name }}</h5>
                    <a href="/?category={{ $advertisement->category->slug }}&{{ http_build_query(request()->except('category')) }}" class="category-tag">{{$advertisement->category->name}}</a>
                    <div class="container-excerpt">
                        {!! $advertisement->body !!}
                    </div>
                    <p>€{{ number_format($advertisement->price, 2) }}</p>
                    <img src="{{ $advertisement->image }}" class="small-img"><br><br>
                    <a href="advertisement/{{$advertisement->slug}}">GO HERE. AAAAAAAAAAAA</a>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>