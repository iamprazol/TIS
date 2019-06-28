<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Districts;
use Image;

class DistrictsController extends Controller
{
    public function index(){
        $districts = Districts::orderBy('district_name', 'asc')->get();
        return view('districts.index')->with('districts', $districts);
    }

    public function create(){
        return view('districts.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'district_name' => 'required|min:2|string|unique:districts',
            'picture' => 'required|max:15360'
        ]);

        $file = $request->file('picture');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('/argon/img/districts/' . $filename);
        Image::make($file)->save($path);

        Districts::create([
            'district_name' => $request->district_name,
            'picture' => $filename,
            'description' => $request->description
        ]);

        return redirect()->route('districts.index')->withStatus(__('District information successfully added.'));
    }

    public function edit($id){
        $district = Districts::find($id);
        return view('districts.edit')->with('district', $district);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'district_name' => 'required|min:2|string',
            'picture' => 'max:15360'
        ]);

        $district = Districts::find($id);

        $file = $request->file('picture');
        if(isset($file)){
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('/argon/img/districts/' . $filename);
            Image::make($file)->save($path);
            $district->picture = $filename;
        }

        $district->district_name = $request->district_name;
        $district->description = $request->description;
        $district->save();

        return redirect()->route('districts.index')->withStatus(__('District information successfully updated.'));
    }
}
