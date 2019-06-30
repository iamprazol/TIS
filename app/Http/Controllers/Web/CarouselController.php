<?php

namespace App\Http\Controllers\Web;

use App\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class CarouselController extends Controller
{
    public function index(){
        $carousel = Carousel::all();
        return view('carousel.index')->with('carousels', $carousel);
    }

    public function create(){
        return view('carousel.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|min:2|string',
            'picture' => 'required|max:15360|dimensions:min_width=1500,min_height=500|mimes:jpeg,jpg,png',
        ]);

        $file = $request->file('picture');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('/argon/img/carousel/' . $filename);
        Image::make($file)->save($path);

        Carousel::create([
            'title' => $request->title,
            'picture' => $filename,
            'tag' => $request->tag
        ]);

        return redirect()->route('carousel.index')->withStatus(__('Carousel information successfully added.'));
    }

    public function edit($id){
        $carousel = Carousel::find($id);
        return view('carousel.edit')->with('carousel', $carousel);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|min:2|string',
            'picture' => 'max:15360|dimensions:min_width=1500,min_height=500|mimes:jpeg,jpg,png',
        ]);

        $carousel = Carousel::find($id);
        $file = $request->file('picture');
        if(isset($file)){
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('/argon/img/carousel/' . $filename);
            Image::make($file)->save($path);
            $carousel->picture = $filename;
        }

        $carousel->title = $request->title;
        $carousel->tag = $request->tag;
        $carousel->save();

        return redirect()->route('carousel.index')->withStatus(__('Carousel information successfully updated.'));
    }

    public function delete($id){
        $carousel = Carousel::find($id);
        $carousel->delete();
        return redirect()->route('carousel.index')->withStatus(__('Carousel information successfully deleted.'));
    }
}
