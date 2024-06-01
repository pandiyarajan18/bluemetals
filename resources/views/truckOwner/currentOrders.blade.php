@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@if(!session('transport'))
<script>
window.location = "{{ url('/logout') }}";
</script>
@endif
@section('content')
@include('layouts.navbars.truckowner.sidenav')
@include('layouts.navbars.truckowner.topnav', ['title' => 'Dashboard'])


<div class="container py-4">
    <div class="card mb-4">
        <div class="card-header">
            <h6 class="card-title">Authors Table</h6>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                    <th>Quarry Id</th>
                    <th>Quarry Name</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit price</th>
                        <th>Total</th>

                        <th>Phone</th>
                        <th>Vehicle NO</th>
                        <th>Billing Address</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                    <td>{{ $data->quarry_id }}</td>
                    <td>{{ $data->quarry_name }}</td>
                        <td>{{ $data->product_name }}</td>
                        <td>{{ $data->quantity }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->total }}</td>

                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->vehicle_no }}</td>
                        <td>{{ $data->billing_address }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                    <th>Quarry id</th>
                    <th>Quarry Name</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit price</th>
                        <th>Total</th>

                        <th>Phone</th>
                        <th>Vehicle NO</th>
                        <th>Billing Address</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>



@endsection
