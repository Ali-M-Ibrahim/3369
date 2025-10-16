<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function create1(){
        $obj = new Customer();
        $obj->first_name = "Ali";
        $obj->last_name = "Ibrahim";
        $obj->balance = 100;
        $obj->address= "Beirut";
        $obj->save();
        return "The Customer has been created";
    }

    public function create2(){
        Customer::create(
            [
                'first_name'=>"Peter",
                'last_name'=>"Khoury",
                "balance"=>500,
                'address'=>"Baabda"
            ]
        );
        return "The Customer has been created";
    }

    public function create3(Request $request){
        Customer::create(
            [
                'first_name'=> $request->first_name,
                'last_name'=> $request->last_name,
                "balance"=> $request->balance,
                'address'=> $request->address,
            ]
        );


        $obj = new Customer();
        $obj->first_name = $request->first_name;
        $obj->last_name =  $request->last_name;
        $obj->balance = $request->balance;
        $obj->address= $request->address;
        $obj->save();


        DB::table('customers')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'balance' => 100,
            'address'=>"beirut"

        ]);

        return "done";

    }

    public function create4(Request  $request){
        Customer::create($request->all());
        return "done";
    }


    public function update1(){
        // SELECT * FROM CUSTOMERS WHERE ID=2;
        $obj = Customer::find(2);
        $obj->first_name = "Ali 2";
        $obj->last_name = "Ibrahim 2";
        $obj->balance = 1002;
        $obj->address= "Beirut2";
        $obj->save();
    }

    public function update2(){
        // SELECT * FROM CUSTOMERS WHERE ID=2;
        $obj = Customer::find(2);
        $obj->fill([
            'first_name'=>"Ali 3",
            'last_name'=>"Ibrahim3",
            "balance"=>500,
            'address'=>"Baabda"
        ]);
        $obj->save();
        return "done";

    }

    public function update3($id, Request $request){
//        $obj = Customer::find($id);
//        $obj->fill([
//            'first_name'=>"Ali 4",
//            'last_name'=>"Ibrahim4",
//            "balance"=>500,
//            'address'=>"Baabda"
//        ]);
//        $obj->save();
        $obj = Customer::find($id);
        $obj->fill($request->all());
        if($obj->isClean()){
            return "data was not changed";
        }
        $obj->save();

        return "o";
    }

    public function update4(){
        // update customers set balance= 0 where id  > 1;
        Customer::where('id','>','1')->update(["balance"=>0]);
    }

    public function delete1($id){
        $obj = Customer::find($id);
        $obj->delete();
        return "the customer has been deleted";
    }

    public function delete2(){
        Customer::where('id','>','4')->delete();
    }


    public function getAll(){
        // SELECT * FROM CUSTOMERES;
        $data = Customer::all();
        return $data;
    }

    public function getCustomerById($id){
        // SELECT * FROM CUSTOMER WHERE ID=?;
        $data = Customer::find($id);
        return $data;
    }

    public function getCustomerHavingBalance0(){
        $customers = Customer::where('balance',0)
            ->get();
        return $customers;
    }
    public function getCustomerHavingBalanceget0(){
        $customers = Customer::where('balance','>',0)
            ->get();
        return $customers;
    }

    public function getCustomers(){
        $customer = Customer::where('balance','>',0)
            ->where('address',"Baabda")
            ->get();
        return $customer;
    }


    public function getCustomerHavingBalance($balance){
        $customers = Customer::where('balance',$balance)->get();
        return $customers;
    }

    public function getBaabda(){
        $data= Customer::where('address',"Baabda")
            ->first();
        return $data;
    }

    public function getFnames(){
        $data= Customer::where('address',"Baabda")
            ->select(['first_name','last_name'])
            ->get();
        return $data;
    }

    public function getBaabdaOrBalance(){
        //select * from customers where address="baabda" or balance=0
        $data = Customer::where('address',"baabda")
            ->OrWhere('balance',0)
            ->get();
        return $data;
    }

    public function getLike(){
        $data = Customer::where('address','like','%b%')
            ->get();
        return $data;
    }

    public function first2rows(){
          // select * from customers where address="baaba"  limit 2;
        $data = Customer::where('address',"baabda")
            ->get()
            ->take(2);
        return $data;
    }

    public function customerIn(){
        // select * from customers where id in ("1","2","3","4","5");
        $data = Customer::whereIn('id',[1,2,3,4,5])
            ->get();
        return $data;
    }

    public function customerBetween(){
        $data = Customer::whereBetween('id',[1,5])
            ->get();
        return $data;
    }

    public function findCustomerOrFail($id){
       // $customer = Customer::findOrFail($id);
        $customer= Customer::findOr($id,function(){
            return "no customer";
        });
        return $customer;
    }

    public function ordering(){
        $data = Customer::where('id','>',0)
//            ->orderBy("balance")
            ->orderBy("balance",'desc')
            ->get();
        return $data;

    }

    public function stats(){
        $sum = Customer::where('id','>',0)->sum('balance');
        $avg = Customer::where('id','>',0)->avg('balance');
        $count = Customer::where('id','>',0)->count();
        $minBalance = Customer::where('id','>',0)->min('balance');
        $maxBalance = Customer::where('id','>',0)->max('balance');
        return $maxBalance;
    }

    public function join(){

        $data = Customer::join('credentials','customers.id','credentials.customer_id')
            ->select(["customers.first_name",'credentials.email'])
            ->get();
        return $data;

    }


}
