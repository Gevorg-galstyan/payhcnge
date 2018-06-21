<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="row w-100">
            <a class="navbar-brand" href="/"><img src="{{asset('storage/'.setting('site.logo'))}}"
                                                  style="width:230px; height:auto;"></a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">
                            {{$translations->where('key', 'home')->first()->translate()->name}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('news')}}">
                            {{$translations->where('key', 'news')->first()->translate()->name}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('to_use')}}">
                            {{$translations->where('key', 'inchpes_ogtvel')->first()->translate()->name}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "
                           href="{{route('contact')}}">
                            {{$translations->where('key', 'contact')->first()->translate()->name}}
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{LaravelLocalization::getSupportedLocales()[app()->getLocale()]['short']}}
                        </a>
                        <div class="dropdown-menu my-dropdown" aria-labelledby="navbarDropdown">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a  class="dropdown-item" hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                </ul>

            </div>
        </div>

    </div>

</nav>