<!-- ===== UNDER HEADER ===== -->
<div class="container" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="row full-block  pos-rel justify-content-between align-items-center">
        <div class="col-lg">
            <!--<span class="top-angle angle"></span>-->
            <h1 class='heading mb-0'> {{$translations->where('key', 'change_currency')->first()->translate()->name}}</h1>
            {{--<!--<h4>{{$translations->where('key', 'logo_text')->first()->translate()->name}}</h4>-->--}}
            {{--<!--<span class="bottom-angle angle"></span>-->--}}
        </div>
        <div class="col-lg mob-mt-5 text-center text-lg-right ">
            @guest
                <form action="{{route('login')}}" method="post">
                    {{csrf_field()}}
                    <input type="email" name="email" class="login-inputs mob-mt-3" placeholder="E-mail"/>
                    <input type="password" name='password' class="login-inputs mob-mt-3" placeholder="Password"
                           required/>
                    <input type="submit" name="login" class="btn btn-primary my-btn mob-mt-3 btn-pad"
                           value="{{$translations->where('key', 'login')->first()->translate()->name}}" required/>
                    <div class="row">
                        <a href="/password/reset" class="color-white underline col text-center font-12">
                            {{$translations->where('key', 'password_forgot')->first()->translate()->name}}
                        </a>
                        <a href="{{route('register')}}" class="color-white underline col font-12 text-left">
                            {{$translations->where('key', 'register')->first()->translate()->name}}
                        </a>
                    </div>
                </form>
                @else
                    <div class="justify-content-end">
                        <a href="{{route('my_changes')}} "
                           class="mr-1 color-white"> {{$translations->where('key', 'my_page')->first()->translate()->name}}
                            | </a>
                        <a href="{{route('change_account')}} "
                           class="mr-1 color-white"> {{$translations->where('key', 'edit_account')->first()->translate()->name}}
                            | </a>
                        <a href="{{route('logout')}} "
                           class="mr-1 color-white"> {{$translations->where('key', 'logout')->first()->translate()->name}}
                            <i class="fas fa-sign-out-alt"></i>

                        </a>
                    </div>



                @endif
        </div>
    </div>
</div>