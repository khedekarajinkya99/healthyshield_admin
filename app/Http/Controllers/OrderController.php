<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function orders() {
        $orders = Order::with('product')->get();
        return view('orders.orderList', compact('orders'));
    }

    public function orderAdd() {
        $product = Product::all();
        return view('orders.addOrder', compact('product'));
    }

    public function orderCreate(Request $request) {
        $validator = Validator::make($request->all(), [
            "order_id" => "required",
            "customer_id" => "required",
            "customer_name" => "required",
            "customer_email" => "required",
            "product" => "required",
            "product_qty" => "required|numeric",
            "shipping_charges" => "required|numeric",
            "discount" => "required|numeric",
            "status" => "required",
            "payment_status" => "required",
            "gst_amount" => "required|numeric",
            "tax_rate" => "required|numeric",
            "id" => "sometimes|required"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        if (isset($request->id)) {
            $order = Order::find($request->id);
        } else {
            $order = new Order;
        }

        $order->order_id = $request->order_id;
        $order->customer_id = $request->customer_id;
        $order->customer_name = $request->customer_name;
        $order->customer_email = $request->customer_email;
        $order->product_id = $request->product;
        $order->product_quantity = $request->product_qty;
        $order->shipping_charges = $request->shipping_charges;
        $order->discount = $request->discount;
        $order->order_date = Carbon::now()->format('Y-m-d h:i:s');
        $order->status = $request->status;
        $order->payment_status = $request->payment_status;
        $order->gst_amount = $request->gst_amount;
        $order->tax_rate = $request->tax_rate;

        if ($order->save()) {
            return redirect('orders')->with('success', 'Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Some error occured');
        }
    }

    public function viewOrder($id) {
        $orders = Order::where('id', $id)->with('product')->first();
        return view('orders.orderView', compact('orders'));
    }

    public function editOrder($id) {
        $orders = Order::where('id', $id)->first();
        $product = Product::all();
        return view('orders.orderEdit', compact('orders', 'product'));   
    }

    public function deleteOrder($id) {
        $delete = Order::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
