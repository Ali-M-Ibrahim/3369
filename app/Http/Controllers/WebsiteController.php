<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WebsiteController extends Controller
{
    public function index(){
        return view('Page1');
    }

    public function index2(){
        return view('admin.page2');
    }

    public function list(){
        $data = Customer::all();
        $title = "List of customers from backend";
        return view('listCustomers',['mylist'=>$data,'title'=>$title]);
    }

    public function viewCustomer($id){
        $customer  = Customer::findOrFail($id);
        $customer2 = Customer::findOrFail(4);
        $this->prepareData();
        return view('viewCustomer')->with('customer',$customer)
                                        ->with('customer2',$customer2);
    }


    public function viewCustomer2($id){
        $customer  = Customer::findOrFail($id);
        $customer2 = Customer::findOrFail(4);
        $this->prepareData();
        return view('viewCustomer',compact('customer','customer2'));
    }

    public function prepareData(){
        $customer3 = Customer::findOrFail(11);
        $lign = "this should be added to all pages22";
        \View::share(['customer3'=>$customer3,'lign'=>$lign]);
    }


    public function viewCustomer3($id){
        $customer  = Customer::findOrFail($id);
        return view('viewSingleCustomer')->with('customer',$customer);
    }


    public function addCustomer(){
        return view('addCustomer');
    }


    public function postCustomer(Request  $request){
//        $c1 = new Customer();
//        $c1->first_name = $request->first_name;
//        $c1->last_name =  $request->last_name;
//        $c1->address = $request->address;
//        $c1->balance = $request->balance;
//        $c1->save();

        Customer::create($request->all());
        return redirect()->route('list-customers');
    }


    public function deleteCustomer($id){
        $obj = Customer::findOrFail($id);
        $obj->delete();
        return redirect()->back();
    }

    public function editCustomer($id){
        $obj = Customer::findOrFail($id);
        return view('updateCustomer')->with('obj',$obj);
    }


    public function updateCustomer($id,Request  $request){
        $c1 = Customer::findOrFail($id);
        $c1->first_name = $request->first_name;
        $c1->last_name =  $request->last_name;
        $c1->address = $request->address;
        $c1->balance = $request->balance;
        $c1->save();
        return redirect()->route('list-customers');
    }



}
