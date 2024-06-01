@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@if(!session('quarry'))
<script>
window.location = "{{ url('/logout') }}";
</script>
@endif
@section('content')
@include('layouts.navbars.quarry.sidenav')
@include('layouts.navbars.quarry.topnav', ['title' => 'Dashboard'])

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form | CodingLab</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: #1abc9c;
    overflow: hidden;
}

::selection {
    background: rgba(26, 188, 156, 0.3);
}

.container {
    max-width: 440px;
    padding: 0 20px;
    margin: 170px auto;
}

.wrapper {
    width: 50%;
    background: #fff;
    border-radius: 5px;
    margin-left: 250px;
    box-shadow: 0px 4px 10px 1px rgba(0, 0, 0, 0.1);
}

.wrapper .title {
    height: 90px;
    background: #16a085;
    border-radius: 5px 5px 0 0;
    color: #fff;
    font-size: 30px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
}

.wrapper form {
    padding: 30px 25px 25px 25px;
}

.wrapper form .row {
    height: 45px;
    margin-bottom: 15px;
    position: relative;
}

.wrapper form .row input {
    height: 100%;
    width: 100%;
    outline: none;
    padding-left: 60px;
    border-radius: 5px;
    border: 1px solid lightgrey;
    font-size: 16px;
    transition: all 0.3s ease;
}

form .row input:focus {
    border-color: #16a085;
    box-shadow: inset 0px 0px 2px 2px rgba(26, 188, 156, 0.25);
}

form .row input::placeholder {
    color: #999;
}

.wrapper form .row i {
    position: absolute;
    width: 47px;
    height: 100%;
    color: #fff;
    font-size: 18px;
    background: #16a085;
    border: 1px solid #16a085;
    border-radius: 5px 0 0 5px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.wrapper form .pass {
    margin: -8px 0 20px 0;
}

.wrapper form .pass a {
    color: #16a085;
    font-size: 17px;
    text-decoration: none;
}

.wrapper form .pass a:hover {
    text-decoration: underline;
}

.wrapper form .button input {
    color: #fff;
    font-size: 20px;
    font-weight: 500;
    padding-left: 0px;
    background: #16a085;
    border: 1px solid #16a085;
    cursor: pointer;
}

form .button input:hover {
    background: #12876f;
}

.wrapper form .signup-link {
    text-align: center;
    margin-top: 20px;
    font-size: 17px;
}

.wrapper form .signup-link a {
    color: #16a085;
    text-decoration: none;
}

form .signup-link a:hover {
    text-decoration: underline;
}
</style>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Add Product</h5>
                    <form action="{{ route('store-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="category" class="form-label">Product Name</label>
                            <select id="category" name="product_id" class="form-select" required>
                                @foreach($datas as $data)
                                    <option value="{{ $data->id }}">{{ $data->product_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity In Units</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter Quantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Price Per Unit</label>
                            <input type="number" id="quantity" name="price" class="form-control" placeholder="Enter Quantity" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
