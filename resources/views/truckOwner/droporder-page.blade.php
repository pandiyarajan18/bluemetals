@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@if(!session('transport'))
<script>
window.location = "{{ url('/logout') }}";
</script>

@endif
@section('content')
@include('layouts.navbars.truckowner.sidenav')
@include('layouts.navbars.truckowner.topnav', ['title' => 'Dashboard'])

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order Confirmation</h3>
                    <div class="mt-4">

                        <p><strong>Quarry Name : {{ $locations->quarry_name }}</strong> <span
                                id="estimatedDeliveryDate"></span></p>
                        <p><strong>Phone : {{ $locations->phone }}</strong> <span id="trackingNumber"></span></p>
                        <p><strong>Quarry Address : {{ $locations->quarry_address }}</strong> </p>
                    </div>


                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h4 class="mb-3">Billing Information </h4>
                            <form action="{{ route('place-order') }}" id="myForm" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="billingName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="billingName" name="product_name"
                                        value="{{ $locations->product_name }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="billingName" class="form-label">Enter unit</label>
                                    <input type="number" class="form-control" id="unit" name="quantity" required>
                                </div>

                                <div class="mb-3">
                                    <label for="billingPhone" class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="billingPhone" name="phone"
                                         required>
                                </div>
                                <div class="mb-3">
                                    <label for="billingPhone" class="form-label">Vehicle Number</label>
                                    <input type="text" class="form-control" id="billingPhone" name="vehicle_number"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="billingPhone" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="billingPhone" name="email"
                                         required>
                                </div>
                                <div class="mb-3">
                                    <label for="billingAddress" class="form-label">Billing Address</label>
                                    <textarea class="form-control" id="billingAddress" name="billingAddress" rows="3"
                                        required></textarea>
                                </div>
                                <input type="hidden" value="{{ $locations->product_id }}" name="product_id">
                                <input type="hidden" value="{{ $locations->price }}" name="price">
                                <input type="hidden" name="quanyity" id="totalunit">
                                <input type="hidden" name="total" id="total">
                                <input type="hidden" value="{{ $locations->uid }}" name="quarry_id" >
                                <input type="hidden" value="{{ $locations->uid }}" name="quarry_id" >
                                <input type="hidden" value="1" name="status">


                                <input type="hidden" value="{{ $locations->price }}" id="calprice">

                            </form>
                        </div>

                        <div class="col-md-6 mb-3">
                            <h4 class="mb-3">Order Details</h4>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="orderItems">
                                    <td>{{ $locations->product_name }}</td>
                                    <td>{{ $locations->price }}</td>
                                    <td id='enteredunit'></td>
                                    <td id='result'></td>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Other Charges</th>
                                        <td id="shippingCost">-</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3"><strong>Order Total</strong></th>
                                        <td id="result2"></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- <p class="text-muted">**Note:** You can modify quantities in the "Quantity" column.</p> -->
                        </div>
                    </div>
                    <hr>
                    <!-- <p class="text-muted">**Please review your order details carefully. Once confirmed, your order will
                        be processed and cannot be changed.**</p> -->
                    <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-secondary me-2">Back</a>
                        <button type="button" class="btn btn-primary" id="submitButton"  >Confirm Order</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {

    $('#unit').keyup(function() {

        var calunit = $(this).val();

        const calprice = $('#calprice').val();


        const product = calprice * calunit;

        $('#enteredunit').text(calunit);
        $('#totalunit').val(calunit);
        $('#result').text(product);
        $('#result2').text(product);
        $('#total').val(product);
    });
});
$(document).ready(function() {
  $("#submitButton").click(function(event) {
    $("#myForm").submit();
  });
});
</script>

@endsection
