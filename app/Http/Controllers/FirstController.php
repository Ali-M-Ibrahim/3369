<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index(){
        return "hello i am index function";
    }

    public function details($id){
        return "the id from the controller is: " . $id;
    }
}

