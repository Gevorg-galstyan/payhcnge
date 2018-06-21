<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\ValuteCost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function update_cost(Request $request){
        if (count($request->costs)){
            foreach ($request->costs as $id => $cost){
                ValuteCost::where('id', $id)->update(['cost' => ($cost > 0 ? $cost : 0)]
                );
            }
            return back()->with('success', 'Costs update successfully');
        }
    }
    public function update_order_new(Request $request){

        Order::where('id',$request->id)->update(['new' => 1]);
        return $request->id;
    }

    public function checked_new_order(Request $request){
        $dataTypeContent = Order::get();
        return View::make('vendor.voyager.checked_new_order', ['dataTypeContent' => $dataTypeContent]);

    }
}
