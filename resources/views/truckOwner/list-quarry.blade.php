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
        <div class="col-lg-7 mt-4 w-100">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Quarries</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        @foreach ($locations as $location)
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg clickable-item" data-uid="{{ $location->uid }}">

                            <div class="d-flex flex-column">
                            <span class="mb-2 text-xs">Distance in Km: <span class="text-dark font-weight-bold ms-sm-2">{{ $location->distance }}</span></span>

                                <span class="mb-2 text-xs">Your Product Name: <span class="text-dark font-weight-bold ms-sm-2">{{ $location->product_name }}</span></span>
                                <span class="mb-2 text-xs">Price Per Unit: <span class="text-dark font-weight-bold ms-sm-2">{{ $location->price }}</span></span>
                                <form action="{{ route('search-product') }}" id="myForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $sentence }}" name="speech">
                                    <input type="hidden" value="{{ $userLatitude }}" name="lat">
                                    <input type="hidden" value="{{ $userLongitude }}" name="long">
                                    <input type="hidden" id="myInput" value="{{ $location->uid }}" name="uid">
                                    <input type="hidden" value="3" name="status">
                                    <input type="submit" style="display: none;">
                                </form>
                                <span class="mb-2 text-xs">Your Quantity in Unit : <span class="text-dark font-weight-bold ms-sm-2">{{ $unit }}</span></span>
                                <span class="mb-2 text-xs">Quarry Name: <span class="text-dark font-weight-bold ms-sm-2">{{ $location->quarry_name }}</span></span>
                                <span class="mb-2 text-xs">Quarry Phone: <span class="text-dark ms-sm-2 font-weight-bold">{{ $location->phone }}</span></span>
                                <span class="text-xs">Quarry Address: <span class="text-dark ms-sm-2 font-weight-bold">{{ $location->quarry_address }}</span></span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.clickable-item').click(function() {
        var uid = $(this).data('uid');
        $('#myInput').val(uid);
        $('#myForm').submit();
        console.log(uid); // Example: Output UID to console
        // You can send this UID to the server using AJAX if required
    });
});
</script>
@endsection
