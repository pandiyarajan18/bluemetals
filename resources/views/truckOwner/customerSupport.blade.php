@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@if(!session('transport'))
<script>
    window.location = "{{ url('/logout') }}";
</script>
@endif
@section('content')
@include('layouts.navbars.truckowner.sidenav')
@include('layouts.navbars.truckowner.topnav', ['title' => 'Dashboard'])
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    /* Additional CSS for styling */
    body {
        background-color: #f8f9fa;
    }

    .card {
        margin-top: 20px;
    }

    .card-body {
        padding: 20px;
    }

    textarea {
        resize: none;
        /* Prevent resizing of textarea */
    }

    button[type='submit'] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 8px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type='submit']:hover {
        background-color: #0056b3;
    }
</style>
</head>

<body>

    <div class="container py-4">
        <div class="row mt-4 justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm rounded-3 border border-primary">
                    <div class="card-body">
                        <button id="button1" class="btn btn-primary">Complaints</button>
                        <button id="button2" class="btn btn-primary">History</button>
                    </div>
                    <div class="card-body" id="div1" style="display: none;">
                        <h5>Complaint Form</h5>
                        <form action="{{ route('complaint') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="quarry_id" class="form-label">Enter Quarry Id</label>
                                <input type="text" id="quarry_id" name='quarry_id' class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="complaint" class="form-label">Enter the complaint</label>
                                <textarea id="complaint" name="complaint" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                            <button type='submit' class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="card-body" id="div2" style="display: none;">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Quarry Id</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Complaint</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                <tr>
                                    <td>
                                        <p class="text-xs text-secondary mb-0">{{ $data->quarry_id }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs text-secondary mb-0">{{ $data->complaint }}</p>
                                    </td>
                                    <td>
                                        @if($data->status == 1)
                                        <span class="badge bg-success">Resolved</span>
                                        @else
                                        <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // JavaScript to handle button click and toggle visibility of divs
        $(document).ready(function() {
            $("#button1").click(function() {
                $("#div1").toggle();
                $("#div2").hide();
            });
            $("#button2").click(function() {
                $("#div2").toggle();
                $("#div1").hide();
            });
        });
    </script>





    @endsection
