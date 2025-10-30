<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function list(){
        $data = Image::all();
        return view('upload.list',compact('data'));
    }
    public function index(){
        return view('upload.form');
    }
    public function method1(Request  $request){
        if($request->hasFile('my_file')){
            $original_filename =$request->file('my_file')->getClientOriginalName();
            $newName = time() . '-' . $original_filename;
            $request->file('my_file')->move(
                'images',
                $newName
            );
            $image = new Image();
            $image->name= $original_filename;
            $image->path = 'images/' . $newName;
            $image->save();

            return "image received";
        }else{
            return "no image provided";
        }
    }

    public function method2(Request  $request){
        if($request->hasFile('my_file')){
            $original_filename =$request->file('my_file')->getClientOriginalName();
            $newName = time() . '-' . $original_filename;
            $request->file('my_file')->storeAs(
                'images',
                $newName
            );
            $image = new Image();
            $image->name= $original_filename;
            $image->path = 'storage/images/' . $newName;
            $image->save();

            return "image received";
        }else{
            return "no image provided";
        }
    }

    public function method3(Request  $request){
        if($request->hasFile('my_file')){
            $imageName = $request->file('my_file')->store(
                'images',
                'public'
            );
            $image = new Image();
            $image->name= $request->file('my_file')->getClientOriginalName();
            $image->path = 'storage/' . $imageName;
            $image->save();

            return "image received";
        }else{
            return "no image provided";
        }
    }
}
