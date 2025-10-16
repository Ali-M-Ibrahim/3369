<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\InvController;
use App\Http\Controllers\SecondController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;

use App\Http\Controllers\DataController;
use App\Http\Controllers\CustomerController;


Route::get('/', function () {
    return view('welcome');
});

Route::get("route1",function(){
  return "I am your first route";
});

Route::get("route2",function(){
   return  123;
});

Route::get("route3",function(){
   return response()->json(["course"=>"Web 2","nbOFCredits"=>3]);
});

Route::get("route4",function(Request $request){
   if($request->header("token")=="123456"){
       return "ok accepted";
   }else{
       return "404";
   }
});

Route::get("route5",function(){
   return response()->json(["data"=>"this is my data"])
   ->header("message1","this is my message from server")
   ->header("message2","this is my second message") ;
});

Route::get("route6",function(){
    return response()->json(["data"=>"this is my data"])
        ->withHeaders([
            'h1'=>"message 1",
            'h2'=>"messsage 2"
        ]);
});


Route::get("route7",function(){
    $data = [
        "name"=>"ali ibrahim"
    ];
   return response($data,Response::HTTP_NO_CONTENT);
});

Route::get("route8",function(){
    $data = [
        "name"=>"ali ibrahim"
    ];
    return response($data,201);
});

Route::get("route-param/{id}",function ($id){
    return "the id is : " . $id;
});

Route::get("route-param2/{id}/{name}",function($test1, $tester){
   return "the name is:" . $tester . "   and the id is: " . $test1;
});

Route::get("route-param3/{id?}",function ($id=0){
    if($id==0){
        return abort(403);
    }else{
        return "the id is : " . $id;
    }

});


Route::get("route-param5/{id1?}/{id2?}",function($id1, $id2=0){
    return "the id is:" . $id1 . "   and the id2 is: " . $id2;
});


Route::get("route-param6",function(Request  $request){
    $id1 = $request->input('id1',0);
    $id2 =  $request->id2;
    return "the id is:" . $id1 . "   and the id2 is: " . $id2;
});

Route::post("post-route",function(Request  $request){
   return "i am post route";
});



Route::get("route10",[FirstController::class,"index"])->name('first-route');
Route::get("route12/{id}",[FirstController::class,"details"]);

Route::get("route11",'App\Http\Controllers\FirstController@index');
Route::get("route13",[
    'uses'=>'App\Http\Controllers\FirstController@index'
]);

Route::resource('second',SecondController::class);
//->only(['index','create']);
//->except(['index']);

Route::apiResource('test',APIController::class);


Route::get('invoke',InvController::class);


Route::get('data',[DataController::class,'index']);

Route::get("create1",[CustomerController::class,'create1']);
Route::get("create2",[CustomerController::class,'create2']);
Route::post("create3",[CustomerController::class,'create3']);
Route::post("create4",[CustomerController::class,'create4']);

Route::get("update1",[CustomerController::class,'update1']);
Route::get("update2",[CustomerController::class,'update2']);
Route::put("update3/{id}",[CustomerController::class,'update3']);
Route::get("update4",[CustomerController::class,'update4']);
Route::get("delete1/{id}",[CustomerController::class,'delete1']);
Route::get("delete2",[CustomerController::class,'delete2']);


Route::get("getAll",[CustomerController::class,'getAll']);
Route::get("getCustomerById/{id}",[CustomerController::class,'getCustomerById']);
Route::get("getCustomerHavingBalance0",[CustomerController::class,'getCustomerHavingBalance0']);
Route::get("getCustomerHavingBalanceget0",[CustomerController::class,'getCustomerHavingBalanceget0']);

Route::get("getCustomers",[CustomerController::class,'getCustomers']);

Route::get("getCustomerHavingBalance/{b}",[CustomerController::class,'getCustomerHavingBalance']);

Route::get("getBaabda",[CustomerController::class,'getBaabda']);
Route::get("getFnames",[CustomerController::class,'getFnames']);
Route::get("getBaabdaOrBalance",[CustomerController::class,'getBaabdaOrBalance']);
Route::get("getLike",[CustomerController::class,'getLike']);


Route::get("first2rows",[CustomerController::class,'first2rows']);
Route::get("customerIn",[CustomerController::class,'customerIn']);
Route::get("customerBetween",[CustomerController::class,'customerBetween']);

Route::get("findCustomerOrFail/{id}",[CustomerController::class,'findCustomerOrFail']);

Route::get("ordering",[CustomerController::class,'ordering']);
Route::get("stats",[CustomerController::class,'stats']);
Route::get("join",[CustomerController::class,'join']);







