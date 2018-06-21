@extends('frontend.layouts.app')
@section('content')

    <div class="container" xmlns:v-on="http://www.w3.org/1999/xhtml">

        <div class="row exchange full-block" id="pay-content">
            <div class="col-lg-7">

                <div class="bg">
                    <div class="text-right mb-3">
                        <span class="info">{{$translations->where('key', '10_minutes')->first()->translate()->name}}</span>
                        <hr class="my-hr"/>
                    </div>
                    <div class="text-left mb-3">
                        <h5 class="info-2">{{$translations->where('key', 'electronics_currency')->first()->translate()->name}}</h5>
                        <hr class="my-hr"/>
                    </div>
                    <example-component
                        route="{{route('change')}}"
                        will="{{$translations->where('key', 'will')->first()->translate()->name}}"
                        choose="{{$translations->where('key', 'choose')->first()->translate()->name}}"
                        currency="{{json_encode($valutes)}}"
                        you_get="{{$translations->where('key', 'you_get')->first()->translate()->name}}"
                        sum="{{$translations->where('key', 'amout')->first()->translate()->name}}"
                        wallet="{{$translations->where('key', 'wallet')->first()->translate()->name}}"
                        email="{{$translations->where('key', 'email')->first()->translate()->name}}"
                        phone="{{$translations->where('key', 'phone')->first()->translate()->name}}"
                        change_translate="{{$translations->where('key', 'change')->first()->translate()->name}}"
                        minimum_value="{{$translations->where('key', 'minimum_value')->first()->translate()->name}}"
                        confirm="{{$translations->where('key', 'confirm')->first()->translate()->name}}"
                        cancel="{{$translations->where('key', 'cancel')->first()->translate()->name}}"
                        max_reserve="{{$translations->where('key', 'max_reserve')->first()->translate()->name}}"
                    ></example-component>
                </div>
                <div class="mt-3 backgr">
                    @foreach($last_pays as $i => $last_pay)
                        <div class="text-center ">
                            @if($i == 0)
                                <h5 class="info-2">{{$translations->where('key', 'last_change')->first()->translate()->name}}</h5>
                            @endif
                            <hr class="my-hr"/>

                            <div class="last-exchange-block row align-items-center">
                                <div class="col text-center">
                                    <div>
                                        <img src="{{asset('storage/'.$last_pay->from_valute_relation->general_image)}}"
                                             alt="{{$last_pay->from_valute_relation->name}}" class="img-responsive">
                                    </div>
                                    <div>
                                        <span>{{$last_pay->from_coast}} {{$last_pay->from_valute_relation->name}}</span>
                                    </div>
                                </div>
                                <div class="col pos-rel"><span class="arr-right"><i
                                                class="fas fa-angle-double-right"></i></span></div>
                                <div class="col text-center">
                                    <div>
                                        <img src="{{asset('storage/'.$last_pay->to_valute_relation->general_image)}}"
                                             alt="{{$last_pay->to_valute_relation->name}}" class="img-responsive">
                                    </div>
                                    <div><span>{{$last_pay->to_coast}} {{$last_pay->to_valute_relation->name}}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="">
                                <span class=""><i
                                            class="far fa-calendar-alt"></i> {{$last_pay->created_at}}</span>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 t-5">
                <div class="row">
                    <div class="money-course w-100 text-center">

                        {{--<!--<h5 class="text-center mb-4">{{$translations->where('key', 'rate')->first()->translate()->name}}</h5>-->--}}
                        {{--<!--<hr class="my-hr mb-4"/>-->--}}


                        <div class="courses row mb-0 mt-0">
                            <span class="col">{{$translations->where('key', 'purchase')->first()->translate()->name}}
                                <img src='{{asset("img/arr1.png")}}' alt='arq' class='arr-img'
                                     width='20px'/></span>
                            <span class="valute col">
                                    <h5 class="text-center">{{$translations->where('key', 'change_to')->first()->translate()->name}}</h5>
                            </span>
                            <span class="col"><img src='{{asset("img/arr2.png")}}' alt='arq' class='arr-img-left'
                                                   width='20px'/> {{$translations->where('key', 'sale')->first()->translate()->name}} </span>
                        </div>
                        <hr class="my-hr mb-0 mt-0 hr-bold"/>
                        @foreach($changes as $change)
                            <div class="courses row mt-2 mb-2 align-items-center">
                                <span class="col">{{$change->ftom_val}}</span>
                                <span class="valute col">
                                    <img src="{{asset('storage/'.$change->icon->icon)}}" alt="" width="35px">
                                </span>
                                <p class=" col">
                                    {{$change->icon->name}}
                                </p>
                                <span class="col">{{$change->to_val}}</span>
                            </div>
                            <hr class="my-hr mb-1 mt-1"/>
                        @endforeach
                    </div>
                    <div class='table-padd mt-3 w-100 table-dark'>
                        <table class="table table-dark table-hover mob-font-s">
                            <thead>
                            <tr>
                                <th colspan="2">{{$translations->where('key', 'we_accept')->first()->translate()->name}}</th>
                                <th scope="col">{{$translations->where('key', 'reserv')->first()->translate()->name}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($valutes as $valute)
                                <tr>
                                    <td>
                                        <img src="{{asset('storage/'.$valute->general_image)}}" alt="{{$valute->name}}"
                                             class="img-responsive">
                                    </td>
                                    <td>{{$valute->name}}</td>
                                    <td>{{$valute->balance}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

        </div>

        <div class="container nmt-5">
            <div class="row">
                <h4 class="text-center py-3 w-100 news-header mb-2">
                    {{$translations->where('key', 'news')->first()->translate()->name}}
                </h4>
                <div class="card-deck news-block">
                    @foreach($posts as $post)
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
            </div>
        </div>
    </div>
@endsection




