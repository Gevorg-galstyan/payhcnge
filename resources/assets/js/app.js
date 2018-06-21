/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('content-component', require('./components/ContentComponent.vue'));


const a_content = new Vue({
    el: "#pay-content",
    data: {
        wmz: 0
        // from: false,
        // to: false,
        // from_cost: false,
        // to_cost: false,
        // cost: false,
        // from_cost_value: false,
        // to_cost_value: false,
        // wallet_1: false,
        // wallet_2: false,
        // message: false,
        // minimum: 0,
        // give_cost: '',
        // get_cost: '',
        // level_1: true,
        // condition: false,
        // loader: false,
        // error_limit: false,
        // url: '',
        // level: 0,
        // number: 0,
        // animatedNumber: 0,
        // token: document.getElementsByName("_token")[0].value
    },
    // methods: {
    //     post_cost: function () {
    //         if (this.wallet_1 && this.wallet_2 && this.from_cost && this.to_cost) {
    //             this.message = "<img src='/storage/site/loader.gif'>";
    //             axios.post('/cost', {
    //                 from_cost: this.from_cost,
    //                 to_cost: this.to_cost,
    //                 _token: this.token
    //             }).then(function (response) {
    //                 if (response.data && response.data.cost) {
    //                     pay_content.cost = response.data.cost;
    //                     pay_content.minimum = response.minimum;
    //                     pay_content.message = '1 ' + response.data.from + ' = ' + response.data.cost + ' ' + response.data.to;
    //                 }
    //                 if (pay_content.cost && pay_content.give_cost) {
    //                     return pay_content.get_cost = (pay_content.cost * pay_content.give_cost);
    //                 } else if (pay_content.cost && pay_content.get_cost) {
    //                     return pay_content.give_cost = (pay_content.get_cost / pay_content.cost);
    //                 }
    //                 pay_content.minimum = response.data.minimum;
    //             }).catch(function (error) {
    //                 console.log(error);
    //             });
    //         }
    //     },
    //     from_change: function (val, name) {
    //         this.block = '<div>AAA</div>';
    //         if (val) {
    //             this.wallet_1 = true;
    //             this.from = name;
    //             this.from_cost = val;
    //             this.post_cost();
    //         }
    //     },
    //     to_change: function (val, name) {
    //         if (val) {
    //             this.wallet_2 = true;
    //             this.to = name;
    //             this.to_cost = val;
    //             this.post_cost();
    //
    //         }
    //     },
    //
    //     will_give: function (event) {
    //         this.give_cost = event.target.value;
    //         if (pay_content.cost) {
    //             return this.get_cost = (this.cost * this.give_cost);
    //         }
    //     },
    //     will_get: function (event) {
    //         this.get_cost = event.target.value;
    //         if (this.cost) {
    //             return this.give_cost = (this.get_cost / this.cost);
    //         }
    //     },
    //     pay_next: function () {
    //
    //     },
    //     change: function () {
    //         if (this.give_cost < this.minimum) {
    //             this.error_limit = true;
    //         } else {
    //             var phone = $('#phone').val();
    //             var email = $('#email').val();
    //             var dramapanak_1 = $('#purse1').val();
    //             var dramapanak_2 = $('#purse2').val();
    //             pay_content.loader = true;
    //             pay_content.url = $('#level_1').attr('action');
    //             axios.post(pay_content.url, {
    //                 level:1,
    //                 dramapanak_1:dramapanak_1,
    //                 dramapanak_2:dramapanak_2,
    //                 email:email,
    //                 phone:phone,
    //                 value_1:this.give_cost,
    //                 value_2:this.get_cost,
    //                 from_cost: this.from_cost,
    //                 to_cost: this.to_cost,
    //                 _token: this.token
    //             }).then(function (response) {
    //                 pay_content.loader = false;
    //                 pay_content.level = 1;
    //                 pay_content.level_1 = false;
    //                 pay_content.condition = response.data;
    //                 console.log(response.data);
    //             }).catch(function (error) {
    //                 console.log(error);
    //             });
    //         }
    //
    //     },
    //     level_2:function () {
    //         pay_content.loader = true;
    //         axios.post(pay_content.url, {
    //             level:2,
    //             _token: this.token
    //         }).then(function (response) {
    //             pay_content.level = 2;
    //             pay_content.loader = false;
    //             pay_content.loader = false;
    //             pay_content.level_1 = false;
    //             pay_content.condition = response.data;
    //             console.log(response.data);
    //         }).catch(function (error) {
    //             console.log(error);
    //         });
    //     }
    //
    //
    // },
    // watch:{
    //     number: function(newValue, oldValue) {
    //         var vm = this
    //         function animate () {
    //             if (TWEEN.update()) {
    //                 requestAnimationFrame(animate)
    //             }
    //         }
    //         new TWEEN.Tween({ tweeningNumber: oldValue })
    //             .easing(TWEEN.Easing.Quadratic.Out)
    //             .to({ tweeningNumber: newValue }, 500)
    //             .onUpdate(function () {
    //                 vm.animatedNumber = this.tweeningNumber.toFixed(0)
    //             })
    //             .start()
    //
    //         animate()
    //     }
    // }



});


const change_account = new Vue({
   el: '#change-account',
   data:{
       name:false,
       phone:false,
       password:false
   },
    methods:{
        changeName:function () {
            if (change_account.name == true){
                change_account.name = false;
            }else{
                change_account.name = true;
            }
        },
        changePhone:function () {
            if (change_account.phone == true){
                change_account.phone = false;
            }else{
                change_account.phone = true;
            }
        }
    }
});
