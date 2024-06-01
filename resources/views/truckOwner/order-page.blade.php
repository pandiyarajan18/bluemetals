@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@if(!session('transport'))
<script>
window.location = "{{ url('/logout') }}";
</script>

@endif
@section('content')
@include('layouts.navbars.truckowner.sidenav')
@include('layouts.navbars.truckowner.topnav', ['title' => 'Dashboard'])
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order Confirmation</h3>
                    <div class="mt-4">
                        <p><strong>Distance In Km: {{ $locations->distance }}</strong> <span
                                id="estimatedDeliveryDate"></span></p>
                        <p><strong>Quarry Name : {{ $locations->quarry_name }}</strong> <span
                                id="estimatedDeliveryDate"></span></p>
                        <p><strong>Phone : {{ $locations->phone }}</strong> <span id="trackingNumber"></span></p>
                        <p><strong>Quarry Address : {{ $locations->quarry_address }}</strong> </p>
                    </div>

                    <form action="{{ route('search-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $sentence }}" name="speech">
                        <input type="hidden" value="{{ $userLatitude }}" name="lat">
                        <input type="hidden" value="{{ $userLongitude }}" name="long">
                        <input type="hidden" value="2" name="status">
                        <button type="submit" class="btn btn-primary">Change Quarry</button>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('place-order') }}" id="myForm" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="col-md-6 mb-3">
                                <h4 class="mb-3">Billing Information </h4>

                                <div class="mb-3">
                                    <label for="billingName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="billingName" name="product_name"
                                        value="{{ $locations->product_name }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="billingPhone" class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="billingPhone" name="phone"
                                         required>
                                </div>
                                <div class="mb-3">
                                    <label for="billingPhone" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="billingPhone" name="email"
                                         required>
                                </div>
                                <div class="mb-3">
                                    <label for="billingPhone" class="form-label">Vehicle Number</label>
                                    <input type="text" class="form-control" id="billingPhone" name="vehicle number"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="billingAddress" class="form-label">Billing Address</label>
                                    <textarea class="form-control" id="billingAddress" name="billingAddress" rows="3"
                                        required></textarea>
                                </div>
                                <input type="hidden" value="{{ $locations->product_id }}" name="product_id">
                                <input type="hidden" value="{{ $locations->price }}" id="calprice" name="price">
                                <input type="hidden" value="{{ $unit }}" id="calunit" name="quantity">
                                <input type="hidden" name="total"  id="total3">
                                <input type="hidden" value="{{ $locations->uid }}" name="quarry_id">
                                <input type="hidden" value="1" name="status">
                            </div>

                        </form>

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
                                    <td>{{ $unit }}</td>
                                    <td id='result'></td>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Estimated Shipping Cost</th>
                                        <td id="shippingCost"></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3"><strong>Order Total</strong></th>
                                        <td id="result2"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <hr>






                    <div class="d-flex justify-content-end">
                        <button class="btn btn-secondary me-2" id="myButton"> Back</button>
                        <button type="button" class="btn btn-primary" id="submitButton"  >Confirm Order</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
//     $(document).ready(function(){
//     alert('Page loaded successfully!');
// });
// $(document).ready(function(){
//     alert('well');
//             // Handle button click event
//             $('#myButton').click(function(){
//                 // Show SweetAlert
//                 Swal.fire({
//                     title: 'Hello!',
//                     text: 'This is a SweetAlert example with jQuery.',
//                     icon: 'success',
//                     confirmButtonText: 'Okay'
//                 });
//             });
//         });
window.addEventListener("load", function() {
    //   fetchData();
    const calprice = document.getElementById('calprice').value;
    const calunit = document.getElementById('calunit').value;

    const product = calprice * calunit;

    document.getElementById('result').innerText = product;
    document.getElementById('result2').innerText = product;
    document.getElementById('total3').value = product;
    // Fetch data as soon as the window loads fully
});
$(document).ready(function() {
  $("#submitButton").click(function(event) {
    $("#myForm").submit();
  });
});

document.getElementById('submitButton').addEventListener('click', function() {
            Swal.fire({
                title: 'Order Placed Successfully!',
                text: 'Thank You',
                icon: 'success',
                showConfirmButton: false
            });
        });
</script>

@endsection
