<template>
    <div>
        <div v-if="level == 1">
            <form :action=" route " method="post" v-on:submit.prevent="change" id="level_1">
                <div>
                    <div class="form-row">
                        <div class="form-group col-md-6 dropdown" id="first-drop">
                            <label>{{ will }}</label>
                            <span class="sh" data-toggle="dropdown" aria-haspopup="true"
                                  aria-expanded="false"
                                  id="dropdownMenuLink1">
                            {{ choose }} ...
                        </span>
                            <ul class="money-dropdown first-field dropdown-menu"
                                aria-labelledby="dropdownMenuLink1">
                                <li class="row mx-0 choose-1"
                                    v-on:click="from_change( item.id , item.name)"
                                    data-choose="'valute-' + item.id" v-for="item in items">
                                    <span class="col-6 ">
                                        <img :src="'storage/' + item.general_image"
                                             alt="item.name"
                                             class="img-responsive"/>
                                    </span>
                                    <span class="col-6 text-right this_text">{{ item.name }}</span>
                                </li>
                                <hr class="new-hr "/>
                            </ul>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="money1">{{ sum }} </label>
                            <input type="text" class="form-control" id="money1" placeholder="0"
                                   @keyup="will_give" v-on:change="will_give" :value="give_cost" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 dropdown">
                            <label>{{ you_get }}</label>
                            <span class="sh" data-toggle="dropdown" aria-haspopup="true"
                                  aria-expanded="false"
                                  id="dropdownMenuLink2">
                            {{ choose }} ...
                        </span>
                            <ul class="money-dropdown first-field dropdown-menu"
                                aria-labelledby="dropdownMenuLink2">
                                <li class="row mx-0 choose-2" data-inner="'valute-' + item.id"
                                    v-on:click="to_change( item.id, item.name )" v-for="item in items">
                                                <span class="col-6 ">

                                                    <img :src="'storage/' + item.general_image"
                                                         alt="item.name" class="img-responsive"/>
                                                </span>
                                    <span class="col-6 text-right this_text">{{ item.name }}</span>
                                </li>
                                <hr class="new-hr "/>
                            </ul>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="money2">{{ sum }} </label>
                            <input type="text" class="form-control" id="money2" placeholder="0"
                                   @keyup="will_get" v-on:change="will_get" :value="get_cost" required>
                        </div>
                    </div>


                    <div class="exchange-text" v-if="message">
                        <span class="exchange-text-under" v-html="message"> {{ message  }}</span>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 choose-1-block" v-if="wallet_1">
                            <label for="purse1" class="purse">
                                {{ wallet + ' : ' + from }}
                            </label>
                            <input type="text"
                                   class="form-control" id="purse1"
                                   :placeholder=" wallet + ' : ' + from "
                                   required>
                        </div>
                        <div class="form-group col-md-6 choose-2-block" v-if="wallet_2">
                            <label for="purse2" class="purse">
                                {{ wallet + ' : ' + to }}
                            </label>
                            <input type="text"
                                   class="form-control" id="purse2"
                                   :placeholder=" wallet + ' : ' + to "
                                   required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 choose-1-block">
                            <label for="email" class="purse">
                                {{ email }}
                            </label>
                            <input type="email"
                                   class="form-control" id="email"
                                   :placeholder=" email "
                                   required>
                        </div>
                        <div class="form-group col-md-6 choose-2-block">
                            <label for="phone" class="purse">
                                {{ phone }}
                            </label>
                            <input type="text"
                                   class="form-control" id="phone"
                                   :placeholder=" phone "
                                   required>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-primary my-btn">
                    <span v-if="loader">
                        <img src="storage/site/loader.gif">
                    </span>
                        {{ change_translate }}
                    </button>
                </div>

            </form>
            <div class="col-sm-12 text-center" v-if="error_limit">
                {{ from + ' ' + minimum_value + ' ' + minimum }}
            </div>
            <div class="col-sm-12 text-center" v-if="max_error">
                {{ to + ' ' + max_reserve + ' ' + max }}
            </div>
        </div>
        <div class="text-center mb-3" v-if="level == 2">
            <div v-html="condition">
                {{ condition }}
            </div>
            <div class="text-center mt-2">
                <span v-if="loader">
                        <img src="storage/site/loader.gif">
                    </span>
                <form action="" v-on:submit.prevent="level_2">
                    <button type="submit" class="btn btn-primary my-btn">
                        <span v-if="loader"><img src="storage/site/loader.gif'"></span>
                        {{ confirm }}
                    </button>
                    <a href="/" class="btn btn-primary my-btn">
                        {{ cancel }}
                    </a>
                </form>

            </div>
        </div>

        <div class="text-center mb-3" v-if="level == 3" v-html="condition">
            {{condition}}
        </div>
    </div>

</template>

<script type="text/babel">
    export default {
        data: function () {
            return {
                items: JSON.parse(this.currency),
                from: false,
                to: false,
                from_cost: false,
                to_cost: false,
                cost: false,
                from_cost_value: false,
                to_cost_value: false,
                wallet_1: false,
                wallet_2: false,
                message: false,
                minimum: 0,
                max: 0,
                give_cost: '',
                get_cost: '',
                level_1: true,
                condition: false,
                loader: false,
                error_limit: false,
                max_error: false,
                url: '',
                level: 1,
                number: 0,
                animatedNumber: 0,
                token: $('meta[name=_token]').attr("content")
            }
        },
        props: [
            'route', 'will', 'choose',
            'currency', 'you_get', 'sum', 'wallet',
            'email', 'phone', 'change_translate',
            'minimum_value', 'confirm', 'cancel',
            'max_reserve'
        ],
        methods: {
            post_cost: function () {
                let pay_content = this;
                if (this.wallet_1 && this.wallet_2 && this.from_cost && this.to_cost) {
                    this.message = "<img src=storage/site/loader.gif>";
                    axios.post('/cost', {
                        from_cost: this.from_cost,
                        to_cost: this.to_cost,
                        _token: this.token
                    }).then(function (response) {
                        if (response.data && response.data.cost) {
                            pay_content.cost = response.data.cost;
                            pay_content.minimum = response.minimum;
                            pay_content.message = '1 ' + response.data.from + ' = ' + response.data.cost + ' ' + response.data.to;
                        }
                        pay_content.minimum = response.data.minimum;
                        pay_content.max = response.data.max;


                        if (pay_content.cost && pay_content.give_cost) {
                            return pay_content.get_cost = (pay_content.cost * pay_content.give_cost);
                        } else if (pay_content.cost && pay_content.get_cost) {
                            return pay_content.give_cost = (pay_content.get_cost / pay_content.cost);
                        }

                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            },
            from_change: function (val, name) {
                if (val) {
                    this.wallet_1 = true;
                    this.from = name;
                    this.from_cost = val;
                    this.post_cost();
                }
            },
            to_change: function (val, name) {
                if (val) {
                    this.wallet_2 = true;
                    this.to = name;
                    this.to_cost = val;
                    this.post_cost();

                }
            },

            will_give: function (event) {
                this.give_cost = event.target.value;
                if (this.cost) {
                    return this.get_cost = (this.cost * this.give_cost);
                }
            },
            will_get: function (event) {
                this.get_cost = event.target.value;
                if (this.cost) {
                    return this.give_cost = (this.get_cost / this.cost);
                }
            },
            pay_next: function () {

            },
            change: function () {
                let pay_content = this;
                console.log(this.max);
                console.log(pay_content.max);
                if (parseInt(pay_content.give_cost) < parseInt(pay_content.minimum)) {
                    pay_content.error_limit = true;
                    console.log(this.minimum)
                } else if (parseInt(pay_content.get_cost) > parseInt(pay_content.max)) {
                    pay_content.max_error = true;
                    console.log(this.max)
                } else {
                    let phone = $('#phone').val();
                    let email = $('#email').val();
                    let dramapanak_1 = $('#purse1').val();
                    let dramapanak_2 = $('#purse2').val();
                    pay_content.loader = true;
                    pay_content.url = $('#level_1').attr('action');
                    axios.post(pay_content.url, {
                        level: 1,
                        dramapanak_1: dramapanak_1,
                        dramapanak_2: dramapanak_2,
                        email: email,
                        phone: phone,
                        value_1: this.give_cost,
                        value_2: this.get_cost,
                        from_cost: this.from_cost,
                        to_cost: this.to_cost,
                        _token: this.token
                    }).then(function (response) {
                        pay_content.loader = false;
                        pay_content.level = 2;
                        pay_content.level_1 = false;
                        pay_content.condition = response.data;
                        console.log(response.data);
                    }).catch(function (error) {
                        console.log(error);
                    });
                }

            },
            level_2: function () {
                let pay_content = this;
                pay_content.loader = true;
                axios.post(pay_content.url, {
                    level: this.level,
                    _token: this.token
                }).then(function (response) {
                    pay_content.level = 3;
                    pay_content.loader = false;
                    pay_content.loader = false;
                    pay_content.condition = response.data;
                    console.log(response.data);
                }).catch(function (error) {
                    console.log(error);
                });
            }


        }
//        watch: {
//            number: function (newValue, oldValue) {
//                var vm = this
//
//                function animate() {
//                    if (TWEEN.update()) {
//                        requestAnimationFrame(animate)
//                    }
//                }
//
//                new TWEEN.Tween({tweeningNumber: oldValue})
//                    .easing(TWEEN.Easing.Quadratic.Out)
//                    .to({tweeningNumber: newValue}, 500)
//                    .onUpdate(function () {
//                        vm.animatedNumber = this.tweeningNumber.toFixed(0)
//                    })
//                    .start()
//
//                animate()
//            }
//        }
    }
</script>
