<?php

namespace App\Http\Controllers\Web;

use App\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AboutUs;

class AboutUsController extends Controller
{
    public function home(){
        $about = AboutUs::first();
        $contact = ContactUs::first();
        return view('welcome')->with('about', $about)->with('contact', $contact);
    }
    public function index(){
        $about = AboutUs::first();
        return view('aboutus.index')->with('about', $about);
    }

    public function contact(){
        $contact = ContactUs::first();
        return view('aboutus.contact')->with('contact', $contact);
    }

    public function update(Request $request, $id){
        $about = AboutUs::find($id);
        $about->description = $request->description;
        $about->save();
        return view('aboutus.index')->with('about', $about)->withStatus(__('About Us updated successfully.'));;

    }

    public function contactUpdate(Request $request, $id){
        $contact = ContactUs::find($id);
        $contact->address = $request->address;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->fax = $request->fax;
        $contact->save();
        return view('aboutus.contact')->with('contact', $contact)->withStatus(__('Contact Us updated successfully.'));;

    }
}
