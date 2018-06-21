<?php

namespace App\Http\Controllers;

use App\Models\Contact as C;
use App\Mail\Contact;
use App\Models\Aa;
use App\Models\Change;
use App\Models\ChangeText;
use App\Models\LastPay;
use App\Models\Order;
use App\Models\Post;
use App\Models\Touse;
use App\Models\Valute;
use App\Models\ValuteCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use TCG\Voyager\Models\Page;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     *
     *
     * /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $last_pays = LastPay::orderBy('id', 'desc')->orderBy('id', 'desc')->limit(3)->get();
        $valutes = Valute::orderBy('sort', 'asc')->get();
        $posts = Post::orderBy('id', 'desc')->limit(2)->get();
        $changes = Change::orderBy('id', 'desc')->get();
        return view('frontend.index', [
            'valutes' => $valutes,
            'posts' => $posts,
            'last_pays' => $last_pays,
            'changes' => $changes,
        ]);
    }

    public function cost(Request $request)
    {

        if ($request->from_cost && $request->to_cost) {
            $cost = ValuteCost::where('from_valute', $request->from_cost)->where('to_valute', $request->to_cost)->first();
            if ($cost) {
                $max = Valute::find($request->to_cost)->balance;
                return response()->json([
                    'from' => $cost->from_valute_relation->name,
                    'to' => $cost->to_valute_relation->name,
                    'cost' => $cost->cost,
                    'minimum' => $cost->from_valute_relation->minimum_value,
                    'max' => $max,
                ]);
            }
        } else {
            return abort(404);
        }
    }

    public function change(Request $request)
    {
        if ($request->level == 1) {
            $this->validate($request, [
                'dramapanak_1' => 'required',
                'dramapanak_2' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'value_1' => 'required',
                'value_2' => 'required',
                'from_cost' => 'required',
                'to_cost' => 'required',
            ]);

            $from_valute = Valute::where('id', $request->from_cost)->firstOrFail();
            $to_valute = Valute::where('id', $request->to_cost)->firstOrFail();
            $cost = $from_valute->costs()->where('to_valute', $to_valute->id)->firstOrFail()->cost;
            $ktam = $request->value_1;
            $kstanam = $request->value_1 * $cost;
            $order_id = rand(100000, 999999);
            $test = Order::where('zapros_id', $order_id)->first();
            if ($test) {
                while (true) {
                    $order_id = rand(100000, 999999);
                    $test = Order::where('zapros_id', $order_id)->first();
                    if (!$test) {
                        break;
                    }
                }
            }

            session(['to_id' => $to_valute->id]);
            session(['order' => [
                'user_id' => !Auth::guest() ? Auth::id() : 0,
                'zapros_id' => $order_id,
                'ktam' => $ktam,
                'kstanam' => $kstanam,
                'email' => $request->email,
                'phone' => $request->phone,
                'ktam_kashelok' => $request->dramapanak_1,
                'kstanam_kashelok' => $request->dramapanak_2,
                'poxanakum' => $from_valute->name . ' -> ' . $to_valute->name,
            ]]);

            if (session('order')) {

                $text = ChangeText::first();
                return View::make('frontend.level_2', [
                    'from_valute' => $from_valute,
                    'text' => $text
                ]);

            }
        } elseif ($request->level == 2) {
            $order = Order::create(session('order'));
            $test = session('order.kstanam');
            $to_id = session('to_id');
            $to_valute = Valute::where('id', $to_id)->firstOrFail();
            $to_valute->balance = ($to_valute->balance - $test);
            $to_valute->save();


//            Mail::send('emails.orders.shipped',[], function ($m) {
//
//                $m->to('xazaryan.89@mail.ru')->subject('Your Reminder!');
//            });

            if ($order) {
                $text = ChangeText::find(2);
                return View::make('frontend.level_3', [
                    'text' => $text
                ]);
            } else {
                return 0;
            }
        } else {
            return abort(404);
        }


    }


    public function news(Request $request)
    {
        if ($request->slug) {
            $new = Post::where('slug', $request->slug)->firstOrFail();

            return \view('frontend.news.single_new', compact('new'));
        } else {
            $news = Post::orderBy('id', 'desc')->paginate(10);
            return \view('frontend.news.news', compact('news'));
        }
    }

    public function to_use()
    {
        $videos = Touse::orderBy('id', 'desc')->get();
        return \view('frontend.to_use', compact('videos'));
    }

    public function contact(Request $request)
    {
        if ($request->method() == 'GET'){
            $contacts = C::get();
            return \view('frontend.contact',compact('contacts'));
        }else{
            $this->validate($request,[
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'subject' => 'required',
                'text' => 'required',
            ]);
//            Mail::send(new Contact($request->all()));
            return back();
        }
    }

}
