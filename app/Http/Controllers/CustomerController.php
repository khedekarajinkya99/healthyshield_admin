<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function customers() {
        $customers = Customer::all();
        return view('customer.customerList', compact('customers'));
    }

    public function customerAdd() {
        return view('customer.customerAdd');
    }

    public function customerCreate(Request $request) {
        $validator = Validator::make($request->all(), [
            "customer_name" => 'required',
            "customer_email" => 'required',
            "password" => 'nullable|required_if:id,null',
            "customer_contact" => 'required',
            "customer_address" => 'required',
            "customer_dob" => 'required',
            "id" => "sometimes|required"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        if (isset($request->id)) {
            $customer = Customer::find($request->id);
        } else {
            $customer = new Customer;
        }

        $customer->customer_name = $request->customer_name;
        $customer->customer_email = $request->customer_email;
        $customer->password = Hash::make($request->password);
        $customer->customer_contact = $request->customer_contact;
        $customer->customer_address = $request->customer_address;
        $customer->customer_dob = $request->customer_dob;

        if ($customer->save()) {
            return redirect('customers')->with('success', 'Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Some error occured');
        }
    }

    public function viewCustomer($id) {
        $customer = Customer::where('id', $id)->first();
        return view('customer.customerView', compact('customer'));
    }

    public function editCustomer($id) {
        $customer = Customer::where('id', $id)->first();
        return view('customer.customerEdit', compact('customer'));
    }

    public function deleteCustomer($id) {
        Customer::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
