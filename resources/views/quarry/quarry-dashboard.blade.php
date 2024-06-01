@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@if(!session('quarry'))
<script>window.location = "{{ url('/logout') }}";</script>
@endif
@section('content')
@include('layouts.navbars.quarry.sidenav')
@include('layouts.navbars.quarry.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
    <div class="row">

        <div class="col-12">

            <div class="card mb-4">
            <!-- @if(session('uid')) -->
                <a href="{{ route('add-product') }}">
                    <button type="button" style="width:150px;margin-left:1050px;margin-top:20px;"
                        class="btn btn-success">Add Product</button>
                </a>
                <!-- {{session('uid')}} -->
                <!-- @endif -->
                <div class="card-header pb-0">
                    <h6>Products</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Product Name</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Quantity</th>
                                        <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Unit price</th>
                                    <!-- <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        action</th> -->
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        action</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                <tr>
                                    <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $data->product_name }}</p>
                                        <!-- <div class="d-flex px-2 py-1"> -->
                                            <!-- <div>
                                                <img src="/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                            </div> -->
                                            <!-- <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $data->product_name }}</h6> -->
                                                <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                                            <!-- </div>
                                        </div> -->
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $data->quantity }}</p>
                                        <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $data->price }}</p>
                                        <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <button class="btn btn-success">update</button>
                                    </td>
                                    <!-- <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
