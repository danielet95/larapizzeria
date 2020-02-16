@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if (session('success'))
                    <div class="alert alert-success m-3" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body px-2" style="display: flex; flex-wrap: wrap;">
                    @if($merchant_products && count($merchant_products))
                        @foreach($merchant_products as $merchant_product)
                            <div class="card-wrapper px-2" style="flex: 0 0 33.333333%;">
                                <div class="card">
                                    <div class="card-header">
                                        {{$merchant_product->name}}
                                    </div>                
                                    <div class="card-body">
                                        <div class="col-xs-12">{{$merchant_product->description}}</div>
                                        <div class="col-xs-12 pt-3">{{$merchant_product->price}}€</div>
                                        <div class="col-xs-12 pt-4">
                                            <a href="{{route('products.addToCart',[$merchant_product->id])}}" class="btn btn-success">{{__('Add to cart')}}</a>
                                        </div>
                                    </div>                
                                </div>
                            </div>
                        @endforeach                                                            
                    @else
                    <div class="col-xs-12 px-2">{{__('No products')}}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="card mb-4">
                <div class="card-header">{{__('Balance')}}</div>
                <div class="card-body">
                    {{Auth::user()->balance}}€
                </div>
            </div>            
            <div class="card">                
                <div class="card-header"><i class="fas fa-shopping-cart"></i> {{ __('Cart') }}({{ session()->has('cart') ? session()->get('cart')->totalQuantity : 0 }})</div>
                <div class="card-body">
                    @if($cart)
                        @foreach($cart->items as $cart_item)
                            <div class="d-flex justify-content-between">
                                <p>{{$cart_item['quantity']}} x {{$cart_item['name']}}</p> <p>{{$cart_item['price']}}€</p>
                            </div>
                        @endforeach
                        <div>
                            <strong class="d-flex justify-content-between">
                                <p>{{__('Total')}}</p> <p>{{$cart->totalPrice}}€</p>
                            </strong>
                        </div>  
                        <div>
                            <a href="{{route('clients.goToCheckout')}}" class="btn btn-success">{{__('Go to checkout')}}</a>
                        </div>                      
                    @else
                        {{__('No products in cart')}}
                    @endif
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection
