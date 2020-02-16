@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-9">
            <div class="card">
                <div class="card-header">{{__('Checkout')}}</div>
                @if (session('error'))
                    <div class="alert alert-danger m-3" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
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
                            <form 
                                method="POST" 
                                action="{{ route('orders.store', ['cart'=>$cart]) }}"
                                style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    {{ __('Buy Now') }}
                                </button>                                            
                            </form>

                        </div>                      
                    @else
                        {{__('No products in cart')}}
                    @endif
                </div>
            </div>
        </div> 
        <div class="col-xs-12 col-md-3">
            <div class="card">
                <div class="card-header">{{__('Balance')}}</div>
                <div class="card-body">
                    {{Auth::user()->balance}}€
                </div>
            </div>
        </div>       
    </div>
</div>
@endsection
