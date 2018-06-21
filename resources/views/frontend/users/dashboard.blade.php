@extends('frontend.layouts.app')

@section('content')

    <div class="container" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <h2 class="text-center">
            {{$translations->where('key', 'my_changes')->first()->translate()->name}}
        </h2>
        @if(!count(Auth::user()->orders))
            <span>{{$translations->where('key', 'change_no_exist')->first()->translate()->name}} </span>
        @else
            <div class='row'>
                <table class=" table table-dark table-hover w-100 last-tabel">
                    <thead>
                    <tr class="black">
                        <th scope="col">#</th>
                        <th scope="col">{{$translations->where('key', 'zapros_id')->first()->translate()->name}}</th>
                        <th scope="col">{{$translations->where('key', 'poxanakum')->first()->translate()->name}}</th>
                        <th scope="col">{{$translations->where('key', 'ktam')->first()->translate()->name}}</th>
                        <th scope="col">{{$translations->where('key', 'kstanam')->first()->translate()->name}}</th>
                        <th scope="col">{{$translations->where('key', 'email')->first()->translate()->name}}</th>
                        <th scope="col">{{$translations->where('key', 'phone')->first()->translate()->name}}</th>
                        <th scope="col">{{$translations->where('key', 'ktam_kashelok')->first()->translate()->name}}</th>
                        <th scope="col">{{$translations->where('key', 'kstanam_kashelok')->first()->translate()->name}}</th>
                        <th scope="col">{{$translations->where('key', 'note')->first()->translate()->name}}</th>
                        <th scope="col">{{$translations->where('key', 'status')->first()->translate()->name}}</th>
                        <th scope="col">{{$translations->where('key', 'created_at')->first()->translate()->name}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach(Auth::user()->orders->sortByDesc('id') as  $order)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$order->zapros_id}}</td>
                            <td>{{$order->poxanakum}}</td>
                            <td>{{$order->ktam }}</td>
                            <td>{{$order->kstanam}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->ktam_kashelok}}</td>
                            <td>{{$order->kstanam_kashelok}}</td>
                            <td>{{$order->note}}</td>
                            <td>
                                @if($order->status == 'option1')
                                    {{$translations->where('key', 'in_procesing')->first()->translate()->name}}
                                @elseif($order->status == 'option2')
                                    {{$translations->where('key', 'completed')->first()->translate()->name}}
                                @elseif($order->status == 'option3')
                                    {{$translations->where('key', 'excused')->first()->translate()->name}}
                                @endif
                            </td>
                            <td>{{$order->created_at}}</td>
                        </tr>
                        @php($i ++)
                    @endforeach
                    </tbody>
                </table>
            </div>


        @endif
    </div>

@endsection