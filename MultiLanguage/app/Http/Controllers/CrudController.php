<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequset;
use App\Models\Offer;
use App\Traits\saveImageTraits;
use Illuminate\Http\Request;
use Validator;

class CrudController extends Controller
{
    use saveImageTraits;

    public function __construct()
    {

    }
//    public function getOffers(){
//        return Offer::select('id','name')->get();
//    }
    public function index()
    {
        $offers = Offer::select('id', 'name_en', 'name_ar', 'price')->get();
        return view('offers.all', compact('offers'));
    }

    public function create()
    {
        return view('offers.create');
    }

    public function store(OfferRequset $request)
    {
//        return $request;
        //validate data before insert to database
//        $rules = $this->getRules();
//        $messages = $this->getMessages();
//         $validator = Validator::make($request->all() ,$rules, $messages);
//         if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInputs($request->all());
//         }
//        $validator = Validator::make($request->all(),$rules,$messages );
//        if($validator -> fails()){
//            return  $validator->errors();
//        }

        //save photo in folder
        $file_name = $this->saveImage($request->photo, 'images/offers');

        //insert
        Offer::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'photo' => $file_name,
        ]);
//        return "added";
        return redirect()->back()->with(['success' => 'تم اضافه العرض بنجاح ']);


    }


    public function edit($offer_id)
    {
//        $offer = Offer::findOrFail($offer_id);
        $offer = Offer::select('id', 'name_ar', 'name_en', 'price')->findOrFail($offer_id);
        return view('offers.edit', compact('offer'));
    }

    public function Update(OfferRequset $request, $offer_id)
    {
        //validtion

        // chek if offer exists

        $offer = Offer::find($offer_id);
        if (!$offer)
            return redirect()->back();

        //update data

        $offer->update($request->all());

        return redirect()->back()->with(['success' => ' تم التحديث بنجاح ']);

        /*  $offer->update([
              'name_ar' => $request->name_ar,
              'name_en' => $request->name_en,
              'price' => $request->price,
          ]);*/

    }

//    protected function getMessages()
//    {
//        return $messages = [
//            'name.required' => __('messages.offer name required'),
//            'name.unique' => __('messages.offer name must be unique'),
//            'price.numeric' => __('messages.Offer Price numeric'),
//            'price.required' => __('messages.offer name required'),
//        ];
//    }

//    protected function getRules()
//    {
//        return $rules = [
//            'name' => 'required|max:100|unique:offers,name',
//            'price' => 'required|numeric',
//        ];
//    }
//    protected function saveImage($photo, $folder)
//    {
//        $file_extension = $photo->getClientOriginalExtension();
//        $file_name = time() . '.' . $file_extension;
//        $path = $folder;
//        $photo->move($path, $file_name);
//        return $file_name;
//    }
}
