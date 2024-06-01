@extends('layouts.app')

@section('content')
@include('layouts.navbars.guest.navbar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .page-header {
            background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg');
            background-size: cover;
            min-height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 2rem;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #fff;
            border-bottom: none;
            padding: 1.5rem 2rem;
        }

        .card-header h5 {
            margin-bottom: 0;
            font-weight: bold;
            color: #333;
        }

        .card-body {
            padding: 2rem;
        }

        .btn-quarry,
        .btn-transport {
            background-color: #5e72e4;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 16px;
            padding: 15px 0;
        }

        .btn-quarry:hover,
        .btn-transport:hover {
            background-color: #324cdd;
        }
    </style>
</head>

<body>
    <div class="page-header">
        <div class="container">
            <h1 class="mb-4">Welcome!</h1>
            <p class="lead">Use these forms to login or create a new account in your project for free.</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Register with</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <a href="{{ route('quarry-reg') }}" class="btn btn-block btn-quarry">
                                    <i class="fas fa-cube mr-2"></i> Quarry
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('transport-reg') }}" class="btn btn-block btn-transport">
                                    <i class="fas fa-truck mr-2"></i> Transport
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

@include('layouts.footers.guest.footer')
@endsection
