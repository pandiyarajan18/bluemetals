@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@if(!session('admin'))
<script>window.location = "{{ url('/logout') }}";</script>
@endif

@section('content')
@include('layouts.navbars.admin.sidenav')
@include('layouts.navbars.admin.topnav', ['title' => 'Tables'])



    <div class="container py-4">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="card-title">Authors Table</h6>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Quarry Name</th>
                            <th>Quarry Owner Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->quarry_name }}</td>
                            <td>{{ $data->quarry_ownername }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->quarry_address }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Quarry Name</th>
                            <th>Quarry Owner Name</th>
                            <th>Phone</th>
                            <th>Address</th>
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
