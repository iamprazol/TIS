<?php

namespace App\Http\Controllers\Web;

use App\Districts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Places;
use Image;


class PlacesController extends Controller
{
    public function index(){
        $places = Places::orderBy('districts_id', 'asc')->paginate(15);
        $districts = Districts::orderBy('district_name', 'asc')->get();
        return view('districts.places.index')->with('places', $places)->with('districts', $districts);
    }

    public function create(){
        $districts = Districts::orderBy('district_name', 'asc')->get();
        return view('districts.places.create')->with('districts', $districts);
    }

    public function store(Request $request){
        $this->validate($request, [
            'place_name' => 'required|min:2|string|unique:places',
            'picture' => 'required|max:15360|dimensions:min_width=500,min_height=200|mimes:jpeg,jpg,png',
        ]);

        $file = $request->file('picture');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('/argon/img/districts/places/' . $filename);
        Image::make($file)->save($path);

        Places::create([
            'districts_id' => $request->district_id,
            'place_name' => $request->place_name,
            'picture' => $filename,
            'description' => $request->description
        ]);

        return redirect()->route('places.index')->withStatus(__('Place information successfully added.'));
    }

    public function edit($id){
        $place = Places::find($id);
        return view('districts.places.edit')->with('place', $place);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'place_name' => 'required|min:2|string',
            'picture' => 'max:15360|dimensions:min_width=500,min_height=200|mimes:jpeg,jpg,png',
        ]);

        $place = Places::find($id);

        $file = $request->file('picture');
        if(isset($file)){
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('/argon/img/districts/places/' . $filename);
            Image::make($file)->save($path);
            $place->picture = $filename;
        }

        $place->place_name = $request->place_name;
        $place->districts_id = $request->district_id;
        $place->description = $request->description;
        $place->save();

        return redirect()->route('places.index')->withStatus(__('Place information successfully updated.'));
    }

    public function search(Request $request){
        $places = Places::where('districts_id', $request->district_id)->paginate(15);
        $districts = Districts::orderBy('district_name', 'asc')->get();
        return view('districts.places.index')->with('places', $places)->with('districts', $districts);
    }

    public function delete($id){
        $place = Places::find($id);
        $place->delete();
        return redirect()->route('places.index')->withStatus(__('Place information successfully deleted.'));
    }
}
