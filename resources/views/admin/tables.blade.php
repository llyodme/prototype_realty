@extends('layout.layouts')
@section('content')  
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Client Tables</h1>
    <p class="mb-4">We use DataTables a third party plugin that is used to generate the table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <a href="#" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-user-plus"></i>
                </span>
                <span class="text">add client</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Active</th>
                            <th>Start Pay</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Active</th>
                            <th>Start Pay</th>
                        </tr>
                    </tfoot>
                    <tbody> 
                        @foreach($clients as $client)   
                            <tr>
                                <td>{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}</td>
                                <td>{{$client->gender}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->phone_number}}</td>
                                <td>{{$client->is_active}}</td>
                                <td>{{$client->start_pay}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection