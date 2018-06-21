<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Order;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\LanguageKey;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $translations = LanguageKey::get();
        $count_new_orders = Order::where('new', 0)->count();
        $contacts = Contact::get();
        View::share([
            'translations' => $translations,
            'count_new_orders' => $count_new_orders,
            'contacts' => $contacts,
        ]);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'laravellocalization.supportedLocales' => [
                'ru' => ['name' => 'Russian', 'script' => 'Cyrl', 'native' => 'Русский', 'short' => 'Рус'],
                'am' => ['name' => 'Armenian', 'script' => 'Armn', 'native' => 'Հայերեն', 'short' => 'Հայ']
//                'en'          => ['name' => 'English',                'script' => 'Latn', 'native' => 'English', 'regional' => 'en_GB'],
            ],

            'laravellocalization.useAcceptLanguageHeader' => true,

            'laravellocalization.hideDefaultLocaleInURL' => true
        ]);
    }
}
