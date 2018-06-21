<div class="text-center mb-3">
    <span class="info">{{$translations->where('key', '10_minutes')->first()->translate()->name}}</span>
    <hr class="my-hr"/>
</div>
<div class="text-center mb-3">
    <h5 class="info-2">{{$translations->where('key', 'electronics_currency')->first()->translate()->name}}</h5>
    <hr class="my-hr"/>
</div>
<form method="post">
    {{csrf_field()}}
    <div>
        <div class="form-row">
            <div class="form-group col-md-6 dropdown" id="first-drop">
                <label>{{$translations->where('key', 'will')->first()->translate()->name}}</label>
                <span class="sh" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                      id="dropdownMenuLink1">Choose ...</span>
                <ul class="money-dropdown first-field dropdown-menu"
                    aria-labelledby="dropdownMenuLink1">
                    @foreach($valutes as $i =>$valute)
                        <li class="row mx-0 choose-1" v-on:click="from_change('{{$valute->id}}', '{{$valute->name}}')"
                            data-choose="valute_{{$valute->id}}">
                                                <span class="col-6 ">
                                                    <img src="{{asset('storage/'.$valute->general_image)}}"
                                                         alt="{{$valute->name}}"
                                                         class="img-responsive"/>
                                                </span>
                            <span class="col-6 text-right this_text">{{$valute->name}}</span>
                        </li>
                        @if($i < (count($valutes) -1))
                            <hr class="new-hr "/>
                        @endif
                    @endforeach
                    <input type="hidden" value="1"/>
                </ul>
            </div>
            <div class="form-group col-md-6">
                <label for="money1">{{$translations->where('key', 'amout')->first()->translate()->name}} </label>
                <input type="number" class="form-control" id="money1" placeholder="0" @keyup="will_give"  v-on:change="will_give" :value="give_cost">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 dropdown">
                <label>{{$translations->where('key', 'you_get')->first()->translate()->name}}</label>
                <span class="sh" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                      id="dropdownMenuLink2">Choose ...</span>
                <ul class="money-dropdown first-field dropdown-menu"
                    aria-labelledby="dropdownMenuLink2">
                    @foreach($valutes as $i =>$valute)
                        <li class="row mx-0 choose-2" data-inner="valute_{{$valute->id}}"
                            v-on:click="to_change('{{$valute->id}}', '{{$valute->name}}')">
                                                <span class="col-6 ">

                                                    <img src="{{asset('storage/'.$valute->general_image)}}"
                                                         alt="{{$valute->name}}" class="img-responsive"/>
                                                </span>
                            <span class="col-6 text-right this_text">{{$valute->name}}</span>
                        </li>
                        @if($i < (count($valutes) -1))
                            <hr class="new-hr "/>
                        @endif
                    @endforeach
                    <input type="hidden" value="2"/>
                </ul>
            </div>
            <div class="form-group col-md-6">
                <label for="money2">Գումարը </label>
                <input type="number" class="form-control" id="money2" placeholder="0" @keyup="will_get" v-on:change="will_get" :value="get_cost">
            </div>
        </div>


        <div class="exchange-text" v-if="message">
            <span class="exchange-text-under" v-html="message">@{{ message  }}</span>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 choose-1-block"  v-if="wallet_1">
                <label for="purse1" class="purse">
                    {{$translations->where('key', 'wallet')->first()->translate()->name}}: @{{ from }}
                </label>
                <input type="text"
                       class="form-control" id="purse1"
                       :placeholder="'{{$translations->where('key', 'wallet')->first()->translate()->name}}: ' + from ">
            </div>
            <div class="form-group col-md-6 choose-2-block"  v-if="wallet_2">
                <label for="purse2" class="purse">
                    {{$translations->where('key', 'wallet')->first()->translate()->name}}: @{{ to }}
                </label>
                <input type="text"
                       class="form-control" id="purse2"
                       :placeholder="'{{$translations->where('key', 'wallet')->first()->translate()->name}}: ' + to">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 choose-1-block">
                <label for="email" class="purse">
                    {{$translations->where('key', 'email')->first()->translate()->name}}
                </label>
                <input type="text"
                       class="form-control" id="email"
                       placeholder="{{$translations->where('key', 'email')->first()->translate()->name}}">
            </div>
            <div class="form-group col-md-6 choose-2-block" >
                <label for="phone" class="purse">
                    {{$translations->where('key', 'phone')->first()->translate()->name}}
                </label>
                <input type="text"
                       class="form-control" id="phone"
                       placeholder="{{$translations->where('key', 'phone')->first()->translate()->name}}">
            </div>
        </div>
    </div>
    <div class="text-center mt-2">
        <a href="" class="btn btn-primary my-btn"> Փոխանակում </a>
    </div>

</form>