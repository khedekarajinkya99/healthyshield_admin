<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Order;

class DashboardController extends Controller
{
    public function dashboard(Request $request) {
        $dataArr =[];
        $dataArr['categories'] = Categorie::all()->count();
        $dataArr['product'] = Product::all()->count();
        $dataArr['customer'] = Customer::all()->count();
        $dataArr['order'] = Order::all()->count();
        $dataArr['newCust'] = Customer::whereDate('created_at', Carbon::now())->count();
        $dataArr['newOrder'] = Order::whereDate('created_at', Carbon::now())->count();

        $dataArr['recent_orders'] = Order::orderBy('id', 'DESC')->take('10')->get();

        return view('dashboard', compact('dataArr'));
    }

    public function getChartData() {
        $customer = Customer::whereYear('created_at', Carbon::now()->year)
                ->select(\DB::raw("MONTH(created_at) month"),\DB::raw("count('month') as customer"))
                ->groupBy('month')
                ->get();

        $months = ['1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0, '6' => 0, '7' => 0, '8' => 0, '9' => 0, '10' => 0, '11' => 0, '12' => 0];

        if (count($customer) > 0) {
            foreach ($customer as $key => $val) {
                $months[$val->month] = $val->customer;
            }
        }


        return response()->json(['status' => 'success', 'data' => array_values($months)], 200);

    }
}
