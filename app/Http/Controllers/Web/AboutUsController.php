<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AboutUs;

class AboutUsController extends Controller
{
    public function index(){
        $about = AboutUs::first();
        return view('aboutus.index')->with('about', $about);
    }

    public function update(Request $request, $id){
        $about = AboutUs::find($id);
        $about->description = $request->description;
        $about->save();
        return view('aboutus.index')->with('about', $about)->withStatus(__('About Us updated successfully.'));;

    }
}
