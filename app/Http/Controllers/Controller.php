<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responser($item, $data, $message)
    {
        if($item != null){
            $num = $item->count();
        } else {
            $num = 0;
        }

        if($num > 0){
            return response()->json([
                'data' => $data,
                'status' => 200,
                'message' => $message
            ], 200);
        } else {
            return response()->json([
                'data' => $item,
                'status' => 404,
                'message' => 'Item not found'
            ], 404);
        }
    }

}
