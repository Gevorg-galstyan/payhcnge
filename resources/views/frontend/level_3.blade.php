<div class="text-center mb-3">
    {!! $text->translate()->text !!}
</div>
<div class="text-center mt-2">
    <a href="/" class="btn btn-primary my-btn">
        {{$translations->where('key', 'reload_page')->first()->translate()->name}}
    </a>
</div>