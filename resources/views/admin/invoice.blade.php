@extends('layout.layouts')
@section('content')  
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Invoices</h1>
    <p class="mb-4">We use DataTables a third party plugin that is used to generate the table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Amount Payed</th>
                            <th>Date Issued</th>
                            <th>Current Balanced</th>
                            <th>Prev Balanced</th>
                            <th class="text-center" style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Amount Payed</th>
                            <th>Date Issued</th>
                            <th>Current Balanced</th>
                            <th>Prev Balanced</th>
                            <th class="text-center" style="width: 15%">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>$86,000</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>$86,000</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                            <td>$170,750</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>$86,000</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                            <td>$86,000</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Cedric Kelly</td>
                            <td>$433,060</td>
                            <td>2012/03/29</td>
                            <td>$433,060</td>
                            <td>$433,060</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection