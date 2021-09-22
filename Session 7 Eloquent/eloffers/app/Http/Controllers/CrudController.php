<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Validator;

class CrudController extends Controller
{
    public function  __construct(){

    }
    public function getOffers(){
        return Offer::select('id','name')->get();
    }
    public function store(Request $request){
//        return $request;
        //validate data before insert to database
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:offers,name|max:20',
            'price' => 'required|numeric',
        ]);
        if($validator -> fails()){
            return  $validator->errors();
        }
        //insert
    Offer::create([
        'name' => $request->name,
        'price'=> $request->price,
        ]);
        return "added";
    }
    public function create(){
        return view('offers.create');
    }
}
