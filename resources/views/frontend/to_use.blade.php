@extends('frontend.layouts.app')

@section('content')
    <div class="container" xmlns:v-on="http://www.w3.org/1999/xhtml">
        @foreach($videos->chunk(2) as $chunk)
            <div class="row nmt-5">
                @foreach($chunk as $video)
                    <div class="col-lg-6">
                        <h4 class="text-center py-3 w-100 news-header mb-2">{{$video->translate()->title}}</h4>
                        <iframe width="100%"
                                src="https://www.youtube.com/embed/{{$video->video_id}}"
                                frameborder="0" style="min-height: 270px "></iframe>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection