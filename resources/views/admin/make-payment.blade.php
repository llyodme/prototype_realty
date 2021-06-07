@extends('layout.layouts')
@section('content')  
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Make Payment</h1>
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
                <table class="table table-bordered data-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th class="text-center" style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th class="text-center" style="width: 10%">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
         <!-- Edit Modal -->

         <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeadingAdd"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="invoiceForm" name="invoiceForm" class="form-horizontal">
                            <input type="hidden" name="invoice_id" id="invoice_id">

                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="" required="">
                                    
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <label>Price</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">₱</span>
                                        </div>
                                        <input type="text" class="form-control" required="" value="" id="amount" name="amount" placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                    
                    
                    
                            <div class="form-row mt-2">
                                <div class="col-md-6">
                                    <label>Date Issued</label>
                                    <input type="date" required="" value="" id="date_issued	" name="date_issued	" class="form-control">
                                    
                                </div>
                            </div>
                          
                                <button type="submit" class="btn btn-success mt-3" id="saveBtn" value="create">Save</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Edit Modal -->
    </div>
@push('scripts')
    <script type="text/javascript">
        $(function () 
        {

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

             /////////////////DISPLAY RECORDS//////////////////////////
            var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('make-payment.index') }}",
              columns: [
                  {data: 'first_name', name: 'first_name'},
                  {data: 'gender', name: 'gender'},
                  {data: 'email', name: 'email'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
        });

        ////////////////////////CREATE PAYMENT////////////////////////////
        $('body').on('click', '.addPayment', function () {
            $('#saveBtn').val("create-post");
              $('#invoice_id').val('');
              $('#invoiceForm').trigger("reset");
              $('#modelHeadingAdd').html("Create Payment");
              $('#ajaxModel').modal('show');
        });

        /////////////////////////////// SAVE POST ///////////////////////////////  
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Save');
        
            $.ajax({
                data: $('#invoiceForm').serialize(),
                url: "{{ route('invoice.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    toastr.info('The Payment was saved sucessfully.', 'Saved Payment', {timeOut:3000});
                    $('#invoiceForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });


    });

    </script>
@endpush
@endsection