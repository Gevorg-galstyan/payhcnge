@extends('frontend.layouts.app')

@section('content')
    <div class="container" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="row t-5">

            <div class="col-lg-6">
                <ul class="list-group list-group-flush">
                    @foreach($contacts as $contact)
                        <li class="list-group-item">
                            <i class="{{$contact->name == 'mobile' ? 'fas' : 'fab'}} fa-{{$contact->name}}"></i>  {{$contact->value}}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <form action="" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                       placeholder="{{$translations->where('key', 'your_name')->first()->translate()->name}} *"
                                       required>
                            </div>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                       placeholder="{{$translations->where('key', 'email')->first()->translate()->name}} *"
                                       required>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                                       placeholder="{{$translations->where('key', 'phone')->first()->translate()->name}} *"
                                       required>
                            </div>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
                                <input type="text" class="form-control" name="subject" value="{{ old('subject') }}"
                                       placeholder="{{$translations->where('key', 'subject')->first()->translate()->name}} *"
                                       required>
                            </div>
                            @if ($errors->has('subject'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('subject') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('text') ? 'has-error' : ''}}">
                        <textarea class="form-control" rows="7" name="text"
                                  placeholder="{{$translations->where('key', 'text')->first()->translate()->name}} *"
                                  required>{{ old('text') }}</textarea>
                        @if ($errors->has('text'))
                            <span class="help-block">
                                                <strong>{{ $errors->first('text') }}</strong>
                                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class=" form-control btn btn-primary my-btn">
                            {{$translations->where('key', 'submit')->first()->translate()->name}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection