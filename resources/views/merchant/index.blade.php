@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-9">
            <div class="card">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <p>
                        <a href="#" class="btn btn-success">Add product</a>
                    </p>
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011/07/25</td>
                                <td>$170,750</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="card">
                <div class="card-header">Balance</div>

                <div class="card-body">
                    1000€
                </div>
            </div>
        </div>        
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    
    $(document).ready(function() {
        $('#example').DataTable();
    } );    

</script>
@endsection
