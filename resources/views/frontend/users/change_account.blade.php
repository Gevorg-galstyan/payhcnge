@extends('frontend.layouts.app')

@section('content')
    <div class="container" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <h2 class="text-center">
            {{$translations->where('key', 'edit_account')->first()->translate()->name}}
        </h2>

        <ul class="list-group" id="change-account">
            <li class="list-group-item disabled">
                <i class="fas fa-envelope mr-2"></i>
                <span>
                    {{Auth::user()->email}}
                </span>
            </li>

            <li class="list-group-item">
                <i class="fas fa-user mr-2"></i>
                <span>
                    {{Auth::user()->name}}
                </span>

                <a href="" v-on:click.prevent="changeName">
                    {{$translations->where('key', 'change_data')->first()->translate()->name}}
                </a>

                <form action="{{route('change_account', ['selector' => 'name'])}}" class="form-inline" method="post" v-if="name">
                    {{csrf_field()}}
                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                    <button type="submit" class=" form-control btn btn-primary my-btn">
                        {{$translations->where('key', 'change_data')->first()->translate()->name}}
                    </button>
                </form>
            </li>
            <li class="list-group-item">
                <i class="fas fa-phone mr-2"></i>
                <span>
                    {{Auth::user()->phone}}
                </span>
                <a href="" v-on:click.prevent="changePhone">
                    {{$translations->where('key', 'change_data')->first()->translate()->name}}
                </a>
                <form action="{{route('change_account', ['selector' => 'phone'])}}" class="form-inline" method="post" v-if="phone">
                    {{csrf_field()}}
                    <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}">
                    <button type="submit" class=" form-control btn btn-primary my-btn">
                        {{$translations->where('key', 'change_data')->first()->translate()->name}}
                    </button>
                </form>
            </li>
            <li class="list-group-item">
                <i class="fas fa-key mr-2"></i>
                <span>
                    Password
                </span>
            </li>
        </ul>
    </div>
@endsection