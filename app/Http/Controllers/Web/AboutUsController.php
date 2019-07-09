<?php

namespace App\Http\Controllers\Web;

use App\Carousel;
use App\ContactUs;
use App\Districts;
use App\Message;
use App\UsefulLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AboutUs;
use Image;

class AboutUsController extends Controller
{
    public function home(){
        $about = AboutUs::first();
        $contact = ContactUs::first();
        $carousels = Carousel::all();
        $districts = Districts::orderBy('district_name', 'asc')->get();
        $usefullinks = UsefulLink::all();
        $message = Message::first();
        return view('welcome')->with('about', $about)->with('contact', $contact)->with('districts', $districts)->with('carousels', $carousels)->with('usefullinks', $usefullinks)->with('message', $message);
    }

    public function index(){
        $about = AboutUs::first();
        $message = Message::first();
        return view('aboutus.index')->with('about', $about)->with('message', $message);
    }

    public function contact(){
        $contact = ContactUs::first();
        $usefullinks = UsefulLink::all();
        return view('aboutus.contact')->with('contact', $contact)->with('usefullinks', $usefullinks);
    }

    public function update(Request $request, $id){
        $about = AboutUs::find($id);
        $about->description = $request->description;
        $about->save();
        return view('aboutus.index')->with('about', $about)->withStatus(__('About Us updated successfully.'));;

    }

    public function updateMessage(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|min:2|string',
            'picture' => 'max:15360|dimensions:min_width=500,min_height=200|mimes:jpeg,jpg,png',
            ]);

        $message = Message::find($id);

        $file = $request->file('picture');
        if(isset($file)){
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('/argon/img/districts/places/' . $filename);
            Image::make($file)->save($path);
            $message->picture = $filename;
        }

        $message->title = $request->title;
        $message->description = $request->description;
        $message->save();

        $about = AboutUs::first();
        return view('aboutus.index')->with('about', $about)->with('message', $message)->withStatus(__('Message updated successfully.'));

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

    public function addLink(){
        return view('aboutus.create-link');
    }

    public function storeLink(Request $request){
        $this->validate($request, [
            'display_name' => 'required|min:2|string',
            'link' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        ]);

         UsefulLink::create([
            'display_name' => $request->display_name,
            'link' => $request->link
        ]);

        return redirect()->route('contactus')->withStatus('Link added successfully');
    }

    public function editLink($id){
        $link = UsefulLink::find($id);
        return view('aboutus.edit-link')->with('link', $link);
    }

    public function updateLink(Request $request, $id){
        $link = UsefulLink::find($id);

        $this->validate($request, [
            'display_name' => 'required|min:2|string',
        ]);

        $link->display_name = $request->display_name;
        $link->link = $request->link;
        $link->save();

        return redirect()->route('contactus')->withStatus('Link updated successfully');
    }

    public function deleteLink($id){
        $link = UsefulLink::find($id);
        $link->delete();
        return redirect()->route('contactus')->withStatus('Link deleted successfully');

    }

    public function places($id){
        $district = Districts::find($id);
        $contact = ContactUs::first();
        $usefullinks = UsefulLink::all();
        return view('aboutdistrict')->with('district', $district)->with('contact', $contact)->with('usefullinks', $usefullinks);
    }
}
