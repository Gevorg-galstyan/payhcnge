@extends('frontend.layouts.app')
@section('meta')
    <title>{{$new->seo_title}}</title>
    <meta name="description" content="{{$new->meta_description}}">
    <meta name="keywords" content="{{$new->meta_keywords}}">
@endsection

@section('content')
    <div class="container" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="container nmt-5">
            <div class="row">

                <h4 class="text-center py-3 w-100 news-header mb-2">{{$new->translate()->title}}</h4>
                <div class="col-lg-4">
                    <img class="card-img-top" src="{{asset('storage/'.$new->image)}}"
                         alt="{{$new->seo_title}}" title="{{$new->seo_title}}">
                </div>
                <div class="col-lg-8">
                    {!! $new->translate()->body !!}
                </div>
            </div>
        </div>
    </div>
@endsection