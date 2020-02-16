@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-9">
            <div class="card">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <p>
                        <a href="{{ route('products.create') }}" class="btn btn-success">{{__('Add Product')}}</a>
                    </p>
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="products" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Price')}}</th>
                                <th></th>
                            </tr>
                        </thead>                        
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <tr data-entry-id="{{ $product->id }}">
                                    <td field-key='name'>{{ $product->name }}</td>
                                    <td field-key='description'>{{ $product->description }}</td>
                                    <td field-key='price'>{{ $product->price }}€</td>
                                    <td>
                                        <a href="{{ route('products.edit',[$product->id]) }}" class="btn btn-primary">{{__('Edit')}}</a>
                                        <form 
                                            method="POST" 
                                            action="{{ route('products.destroy', $product->id) }}"
                                            onSubmit="return confirm('Are you sure you wish to delete?');"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                {{ __('Delete') }}
                                            </button>                                            
                                        </form>
                                    </td>
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
                <div class="card-header">Balance</div>

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
        $('#products').DataTable();
    } );    

</script>
@endsection
