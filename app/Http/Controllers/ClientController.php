<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\MerchantTrait;
use App\Cart;
use Auth;

class ClientController extends Controller
{
    use MerchantTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the index page for clients.
     */
    public function index()
    {
        $cart = session()->has('cart') ? new Cart(session()->get('cart')) : null;
        $merchant_products = $this->getMerchantProducts();
        return view('client.index', compact('merchant_products', 'cart'));
    } 

    /**
     * Go to checkout page.
     */
    public function goToCheckout()
    {
        $cart = session()->has('cart') ? new Cart(session()->get('cart')) : null;
        return view('client.checkout', compact('cart'));
    }        
}
