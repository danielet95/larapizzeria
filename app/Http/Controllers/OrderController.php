<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\BalanceTrait;
use App\Traits\OrderTrait;
use App\Traits\MerchantTrait;
use Auth;
use App\Order;

class OrderController extends Controller
{
    use BalanceTrait, OrderTrait, MerchantTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $orders = $user->isClient() ? 
                    $user->orders()->orderBy('created_at', 'desc')->get() :
                    Order::orderBy('created_at', 'desc')->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $cart = $request->input('cart');
        if($user->balance<$cart['totalPrice']) {
            return redirect()->route('clients.goToCheckout')->with('error', 'You don\'t have enough money to complete the purchase');
        }

        $merchant = $this->getMerchant();
        $order = $this->createOrderFromCart($cart, $user);
        $this->decreaseUserBalance($user, $cart['totalPrice']);
        $this->increaseUserBalance($merchant, $cart['totalPrice']);

        //Forget session
        session()->forget('cart');
        return redirect()->route('home')->with('success', 'Purchase completed successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $products = json_decode($order->order_json)->items;
        return view('orders.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
