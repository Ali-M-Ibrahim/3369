<?php

namespace App\Http\Controllers;

use App\Services\LoggingService;
use Illuminate\Http\Request;

class DIController extends Controller
{

    public $globalLogs;

    public function __construct(LoggingService $logs){
        $this->globalLogs = $logs;

    }
    public function old(){
        $logs = new LoggingService();
        $logs->addLog("hello from old function");
        return "ok";
    }

    public function methodDi(LoggingService $logs){
        $logs->addLog("this is log using DI");
        return "ok";
    }

    public function f3(){

    $this->globalLogs->addLog("this is log from f3");
    }

    public function f4(){
        $this->globalLogs->addLog("this is log from f4");
    }
}
