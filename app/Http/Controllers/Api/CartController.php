<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
   public function checkout(Request $request)
   {
         return response()->json([
              'data'=>$request->all(),  // get all ajax data sent up
              'product'=>session()->get('cart')
         ]);
   }
}
