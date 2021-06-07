@extends('layout.layouts')
@section('content')  
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Message Center</h1>
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
                <table class="table table-bordered data-table" id="user_table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Content</th>
                            <th>Date</th>
                            <th class="text-center" style="width: 13%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Content</th>
                            <th>Date</th>
                            <th class="text-center" style="width: 13%">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>


        <!-- View Modal -->
        <div class="modal fade" id="ajaxViewModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeadingEdit"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="messageViewForm" name="messageViewForm" class="form-horizontal">
                            <input readonly type="hidden" name="message_ids" id="message_ids">

                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <label>Name</label>
                                    <input readonly type="text" class="form-control" id="names" name="names" placeholder="Name" value="" required="">
                                    
                                </div>
                                <div class="col-md-12">
                                    <label>Email</label>
                                    <input readonly type="email" class="form-control" id="emails" name="emails" placeholder="email" value="" required="">
                                    
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <label>Phone Number</label>
                                    <div class="input-group mb-3">
                                        <input readonly type="text" class="form-control" required="" value="" id="phone_numbers" name="phone_numbers" placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <label>Content</label>
                                    <textarea readonly type="text" class="form-control" required="" value="" id="contents" name="contents" rows="6"></textarea>
                                   
                                </div>
                            </div>
                    
                            <div class="form-row mt-2">
                                <div class="col-md-6">
                                    <label>Date message</label>
                                    <input readonly type="date" required="" value="" id="date_recieveds" name="date_recieveds" class="form-control">
                                    
                                </div>
                            </div>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Edit Modal -->

        <!-- Destroy Modal -->
        <div class="modal fade" id="deleteMessage"  role="dialog" >
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroyModalLabel">Delete Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body text-center">
                        <h4>Are you sure?</h4>
                        <p>Do you want to delete these Message? This process cannot be undone.</p>
                    </div>
                
                    <div class="modal-footer d-flex justify-content-center">
                        <a data-dismiss="modal" href="#" class="btn btn-secondary btn-icon-split mr-5">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text">Cancel</span>
                        </a>
                        <a href="javascript:void(0)"  name="ok_button" id="ok_button" class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Delete</span>
                        </a>
                    </div>
            </div>
            </div>
        </div>
        <!-- Destroy Modal End-->
        
        
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
            
        var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('message.index') }}",
                columns: [
                    
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone_number', name: 'phone_number'},
                    {data: 'content', name: 'content'},
                    {data: 'date_recieved', name: 'date_recieved'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
        });

        /////////////////////////////// VIEW MESSAGE ///////////////////////////////  
$('body').on('click', '.viewMessage', function () {
            var message_ids = $(this).data('id');
            $.ajax({

                url: "{{ route('message.index') }}" +'/' + message_ids +'/edit', function (data) {
                    $('#modelHeading').html("View Message");
              
                $('#ajaxModel').modal('show');
                $('#message_ids').val(data.id);
                $('#names').val(data.name);
                $('#emails').val(data.email);
                $('#phone_numbers').val(data.phone_number);
                $('#contents').val(data.content);
                $('#date_recieveds').val(data.date_recieved);
                }
            });
            $.get("{{ route('message.index') }}" +'/' + message_ids +'/edit', function (data) {
                $('#modelHeading').html("View Message");
                $('#ajaxViewModel').modal('show');
                $('#message_ids').val(data.id);
                $('#names').val(data.name);
                $('#emails').val(data.email);
                $('#phone_numbers').val(data.phone_number);
                $('#contents').val(data.content);
                $('#date_recieveds').val(data.date_recieved);
            })
        });

         /////////////////////////////// DELETE MESSAGE ///////////////////////////////    
         $('body').on('click', '.deleteMessage', function () {
            var message_id = $(this).data('id');
            $('#deleteMessage').modal('show')
            $('#ok_button').click(function(){
                  $.ajax({
                      type: "DELETE",
                      url: "{{ route('message.store') }}"+'/'+message_id,
                      success:function (data) {
                          table.draw();

                          toastr.warning('The Message was deleted succesfully.', 'Delete success', {timeOut:3000});
                          
                          setTimeout(function(){
                          $('#deleteMessage').modal('hide');
                          $('#user_table').DataTable().ajax.reload();
                          },0);
      
                      },
                      error: function (data) {
                          console.log('Error:', data);
                      }
                  });
      
              });    
         });



    });

    </script>
@endpush

@endsection