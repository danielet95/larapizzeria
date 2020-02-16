@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-9">
            <div class="card">
                <div class="card-header">{{__('Order Products')}}</div>
                <div class="card-body">
                    <table id="orders" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Quantity')}}</th>
                                <th>{{__('Price')}}</th>
                            </tr>
                        </thead>                        
                        @if ($products)
                            @foreach ($products as $key=>$product)
                                <tr data-entry-id="{{ $key }}">
                                    <td field-key='name'>{{ $product->name }}</td>
                                    <td field-key='description'>{{ $product->description }}</td>
                                    <td field-key='quantity'>{{ $product->quantity }}</td>
                                    <td field-key='price'>{{ $product->price }}€</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">{{__('No products')}}</td>
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
