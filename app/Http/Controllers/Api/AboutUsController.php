<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutUs as AboutUsResource;
use App\AboutUs;

class AboutUsController extends Controller
{
    public function index(){
        $about = AboutUs::first();
        $data = new AboutUsResource($about);
        return $this->responser($about, $data, "About us description displayed successfully");
    }
}
