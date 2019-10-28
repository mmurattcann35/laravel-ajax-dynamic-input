<?php

namespace App\Http\Controllers;

use App\ProductStock;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view("add-more");
    }

    public function addMore(Request $request){
        $this->validate($request,[
           "addmore.*.name" => "required",
           "addmore.*.qty" => "required",
           "addmore.*.price" => "required",
        ]);

        foreach ($request->addmore as $i => $value){
            ProductStock::create($value);
        }

        return back()->with("success", " Successfully Created");
    }
}
