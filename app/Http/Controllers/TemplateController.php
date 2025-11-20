<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class TemplateController extends Controller  implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            'firstMiddleware',
        ];
    }
    public function index(){
        return view('template.index');
    }

    public function service(){
        return view('template.service');
    }

}
