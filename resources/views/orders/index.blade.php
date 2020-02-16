@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-9">
            <div class="card">
                <div class="card-header">{{__('Order')}}</div>
                <div class="card-body">
                    <table id="orders" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{__('Id')}}</th>
                                <th>{{__('Amount')}}</th>
                                <th>{{__('Date')}}</th>
                                <th></th>
                            </tr>
                        </thead>                        
                        @if (count($orders) > 0)
                            @foreach ($orders as $order)
                                @php
                                    $order_amount = json_decode($order->order_json)->totalPrice;
                                @endphp
                                <tr data-entry-id="{{ $order->id }}">
                                    <td field-key='id'>{{ $order->id }}</td>
                                    <td field-key='amount'>{{ $order_amount }}€</td>
                                    <td field-key='date'>{{ $order->created_at }}</td>
                                    <td field-key='date'>
                                        <a href="{{route('orders.show', [$order->id])}}" class="btn btn-primary">Show details</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">{{__('No orders')}}</td>
                            </tr>
                         @endif
                    </table>
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

@section('scripts')
<script type="text/javascript">
    
    $(document).ready(function() {
        $('#orders').DataTable();
    } );    

</script>
@endsection
