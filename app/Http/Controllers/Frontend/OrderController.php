<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        // session()->flush();
        $this->cartService = $cartService;
    }
    public function order()
    {
        if(empty(session()->get('cart'))){
            return redirect()->route('frontend.cart.all');
        }
        $allCart =  $this->cartService->all();
          return view('frontends.order.show',['allCart'=>$allCart ?? collect()]) ;

    }
}
