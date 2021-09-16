<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     *  One To One (Polymorphic)
     * Get the parent imageable model (user or post).
     */
    public function index(){
        $image = Image::findOrFail(4)->imageable;
        return  $image;
    }
}
