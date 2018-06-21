@extends('frontend.layouts.app')

@section('content')
    <div class="container" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="container nmt-5">
            <div class="row">

                @foreach($news->chunk(2) as $chunk)
                    <div class="card-deck news-block nmt-5">
                        @foreach($chunk as $post)
                            <div class="card">
                                <img class="card-img-top" src="{{asset('storage/'.$post->image)}}"
                                     alt="{{$post->seo_title}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$post->translate()->title}}</h5>
                                    <p class="card-text">
                                        {{$post->translate()->excerpt}}
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('news',['slug' => $post->slug])}}"
                                       class="btn btn-primary my-btn px-4"> {{$translations->where('key', 'more')->first()->translate()->name}} </a>
                                    <span class="inline-block float-right news-date"><i class="far fa-calendar-alt"></i>
                                        {{$post->created_at}}
                </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

        </div>

            {{$news->links()}}

    </div>
@endsection