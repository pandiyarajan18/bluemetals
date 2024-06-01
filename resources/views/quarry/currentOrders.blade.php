@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@if(!session('quarry'))
<script>
window.location = "{{ url('/logout') }}";
</script>
@endif
@section('content')
@include('layouts.navbars.quarry.sidenav')
@include('layouts.navbars.quarry.topnav', ['title' => 'Dashboard'])
<!-- Replace the HTML for the toggle switch style -->
<style>
/* The switch - adapted from https://www.w3schools.com/howto/howto_css_switch.asp */
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

/* The slider */
.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 34px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 50%;
}

input:checked+.slider {
    background-color: #2196F3;
}

input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}
</style>


<div class="container py-4">
    <div class="card mb-4">
        <div class="card-header">
            <h6 class="card-title">Authors Table</h6>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit price</th>
                        <th>Total</th>
                        <th>Transport Name</th>
                        <th>Phone</th>
                        <th>Vehicle NO</th>
                        <th>Billing Address</th>
                        <th>Order Taken</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->product_name }}</td>
                        <td>{{ $data->quantity }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->total }}</td>
                        <td>{{ $data->transport_name }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->vehicle_no }}</td>
                        <td>{{ $data->billing_address }}</td>
                        <td>
                                            <label class="switch">
                                                <input type="checkbox" class="toggleSwitch" data-id="{{ $data->uid }}">
                                                <span class="slider round"></span>
                                            </label>
                                    </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit price</th>
                        <th>Total</th>
                        <th>Transport Name</th>
                        <th>Phone</th>
                        <th>Vehicle NO</th>
                        <th>Billing Address</th>
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
    // Handle toggle switch state change
    $('#example').on('change', '.toggleSwitch', function() {
        var id = $(this).data('id');
        var checked = $(this).prop('checked') ? 1 : 0;

        if (checked == 1) {
            // Perform AJAX request to update server-side data
            $.ajax({
                url: "{{ url('Quarryconform-order') }}",
                type: "POST",
                data: {
                    id: id,
                    checked: checked,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    // Handle success response if needed
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error response if needed
                    console.error(xhr.responseText);
                }
            });
        } else {

        }
    });
});
</script>



@endsection
