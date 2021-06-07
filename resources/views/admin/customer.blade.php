@extends('layout.layouts')
@section('content')  
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">My Client</h1>
    <p class="mb-4">We use DataTables a third party plugin that is used to generate the table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <a href="javascript:void(0)" class="btn btn-primary btn-icon-split" id="createNewCustomer">
                <span class="icon text-white-50">
                    <i class="fas fa-user-plus"></i>
                </span>
                <span class="text">add client</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered data-table" id="user_table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Start Pay</th>
                            <th class="text-center" style="width: 13%">Action</th>
                        </tr>
                    </thead>
                     <tbody> 

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Start Pay</th>
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
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="customerViewForm" name="customerViewForm" class="form-horizontal">
                            <input type="hidden" name="user_ids" id="user_ids">

                            <div class="form-row mt-2">
                                <div class="col-md-4">
                                    <label>First name</label>
                                <input readonly type="text" id="first_names" name="first_names" class="form-control" placeholder="First name">  
                                </div>
                                <div class="col-md-4">
                                    <label>Middle name</label>
                                <input readonly type="text" id="middle_names" name="middle_names" class="form-control" placeholder="Middle name">
                                </div>
                                <div class="col-md-4">
                                    <label>Last name</label>
                                <input readonly type="text" id="last_names" name="last_names" class="form-control" placeholder="Last name">
                                </div>
                            </div>
                                                        
                        <div class="form-row mt-3">
                            <div class="form-group col-md-6">
                                <label class="mt-2" >Email</label>
                                <input readonly type="email" id="emails" name="emails" class="form-control " placeholder="Email">
                            </div>
                            
                            <div class="form-group col-md-6">
                            <label class=" col-form-label">Date Joined</label>
                                <input readonly class="form-control" type="date" id='date_joineds' name='date_joineds'>
                            </div>
                        </div>				
                    
                        <div class="form-row">
                    
                            <div class="form-group col-md-4">
                                <label class="mt-2" for="inlineFormCustomSelect">Gender</label>
                                    <input readonly class="form-control" id="genders" name="genders" >
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mt-2" for="inlineFormCustomSelect">Status</label>
                                <input readonly class="form-control" id="is_actives" name="is_actives" >
                                   
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label"> Birth Date</label>
                                    <input readonly class="form-control" type="date" id="birthdates" name="birthdates">   
                            </div>
                                
                        </div>
                        
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Start Pay</label>
                                    <input readonly type="text" class="form-control" id="start_pays" name="start_pays" placeholder="start pay">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Street</label>
                                    <input readonly type="text" class="form-control" id="streets" name="streets" placeholder="Street">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Block Lot</label>
                                    <input readonly type="text" class="form-control" id="block_lots" name="block_lots" placeholder="Block and Lot">
                                </div>
                            </div>
                    
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label >City</label>
                                    <input readonly type="text" class="form-control" id="citys" name="citys" placeholder="City">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Province</label>
                                    <input readonly type="text" class="form-control" id="provinces" name="provinces" placeholder="Province ">
                                </div>
                                <div class="form-group col-md-3">
                                    <label >ZipCode</label>
                                    <input readonly type="text" class="form-control" id="zipcodes" name="zipcodes" placeholder="Zip Code">
                                </div>
                                <div class="form-group col-md-3">
                                    <label >Phone Number</label>
                                    <input readonly type="text" class="form-control" id="phone_numbers" name="phone_numbers" placeholder="Phone Numnber">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End View Modal -->

        <!-- Edit Modal -->

        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeadingEdit"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="customerForm" name="customerForm" class="form-horizontal">
                            <input type="hidden" name="user_id" id="user_id">

                            <div class="form-row mt-2">
                                <div class="col-md-4">
                                    <label>First name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name">  
                                </div>
                                <div class="col-md-4">
                                    <label>Middle name</label>
                                <input type="text" id="middle_name" name="middle_name" class="form-control" placeholder="Middle name">
                                </div>
                                <div class="col-md-4">
                                    <label>Last name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name">
                                </div>
                            </div>
                                                        
                        <div class="form-row mt-3">
                            <div class="form-group col-md-6">
                                <label class="mt-2" >Email</label>
                                <input type="email" id="email" name="email" class="form-control " placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                            <label class=" col-form-label">Date Joined</label>
                                <input class="form-control" type="date" id='date_joined' name='date_joined'>
                            </div>
                        </div>				
                    
                        <div class="form-row">
                    
                            <div class="form-group col-md-4">
                                <label class="mt-2" for="inlineFormCustomSelect">Gender</label>
                                <select class="custom-select" id="gender" name="gender" >
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mt-2" for="inlineFormCustomSelect">Status</label>
                                <select class="custom-select" id="is_active" name="is_active" >
                                    <option value="active">Active</option>
                                    <option value="Inactive">Not Active</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label"> Birth Date</label>
                                    <input class="form-control" type="date" id="birthdate" name="birthdate">   
                            </div>
                                
                        </div>
                        
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Start Pay</label>
                                    <input type="text" class="form-control" id="start_pay" name="start_pay" placeholder="start pay">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Street</label>
                                    <input type="text" class="form-control" id="street" name="street" placeholder="Street">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Block Lot</label>
                                    <input type="text" class="form-control" id="block_lot" name="block_lot" placeholder="Block and Lot">
                                </div>
                            </div>
                    
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label >City</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="City">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Province</label>
                                    <input type="text" class="form-control" id="province" name="province" placeholder="Province">
                                </div>
                                <div class="form-group col-md-3">
                                    <label >ZipCode</label>
                                    <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip Code">
                                </div>
                                <div class="form-group col-md-3">
                                    <label >Phone Number</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Numnber">
                                </div>
                            </div>

                                <button type="submit" class="btn btn-success mt-3" id="saveBtn" value="create">Save</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Edit Modal -->
        <!-- Destroy Modal -->
        <div class="modal fade" id="deleteCustomer"  role="dialog" >
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroyModalLabel">Delete Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body text-center">
                        <h4>Are you sure?</h4>
                        <p>Do you want to delete these customer? This process cannot be undone.</p>
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
                  ajax: "{{ route('customer.index') }}",
                  columns: [
                      {data: 'first_name', name: 'first_name'},
                      {data: 'middle_name', name: 'middle_name'},
                      {data: 'last_name', name: 'last_name'},
                      {data: 'email', name: 'email'},
                      {data: 'phone_number', name: 'phone_number'},
                      {data: 'is_active', name: 'is_active'},
                      {data: 'start_pay', name: 'start_pay'},
                      {data: 'action', name: 'action', orderable: false, searchable: false},
                  ]
            });
          
    /////////////////////////////// CREATE NEW CUSTOMER ///////////////////////////////  
            $('#createNewCustomer').click(function () {
                  $('#saveBtn').val("create-customer");
                  $('#user_id').val('');
                  $('#customerForm').trigger("reset");
                  $('#modelHeadingEdit').html("Create New Customer");
                  $('#ajaxModel').modal('show');
            });
          
          
    
    /////////////////////////////// EDIT CUSTOMER ///////////////////////////////  
             $('body').on('click', '.editCustomer', function () {
                var user_id = $(this).data('id');
                $.ajax({
    
                    url: "{{ route('customer.index') }}" +'/' + user_id +'/edit', function (data) {
                        $('#modelHeadingEdit').html("Edit Customer");
                    $('#saveBtn').val("edit-customer");
                    $('#ajaxModel').modal('show');
                    $('#user_id').val(data.id);
                    $('#last_name').val(data.last_name);
                    $('#middle_name').val(data.middle_name);
                    $('#first_name').val(data.first_name);
                    $('#birthdate').val(data.birthdate);
                    $('#gender').val(data.gender);
                    $('#street').val(data.street);
                    $('#block_lot').val(data.block_lot);
                    $('#city').val(data.city);
                    $('#zipcode').val(data.zipcode);
                    $('#province').val(data.province);
                    $('#email').val(data.email);
                    $('#is_active').val(data.is_active);
                    $('#phone_number').val(data.phone_number);
                    $('#start_pay').val(data.start_pay);
                    $('#date_joined').val(data.date_joined);
                    }
                });
                $.get("{{ route('customer.index') }}" +'/' + user_id +'/edit', function (data) {
                    $('#modelHeadingEdit').html("Edit Customer");
                    $('#saveBtn').val("edit-customer");
                    $('#ajaxModel').modal('show');
                    $('#user_id').val(data.id);
                    $('#last_name').val(data.last_name);
                    $('#middle_name').val(data.middle_name);
                    $('#first_name').val(data.first_name);
                    $('#birthdate').val(data.birthdate);
                    $('#gender').val(data.gender);
                    $('#street').val(data.street);
                    $('#block_lot').val(data.block_lot);
                    $('#city').val(data.city);
                    $('#zipcode').val(data.zipcode);
                    $('#province').val(data.province);
                    $('#email').val(data.email);
                    $('#is_active').val(data.is_active);
                    $('#phone_number').val(data.phone_number);
                    $('#start_pay').val(data.start_pay);
                    $('#date_joined').val(data.date_joined);
                })
            });
    
    
    /////////////////////////////// VIEW CUSTOMER ///////////////////////////////  
    $('body').on('click', '.viewCustomer', function () {
                var user_ids = $(this).data('id');
                $.ajax({
    
                    url: "{{ route('customer.index') }}" +'/' + user_ids +'/edit', function (data) {
                        $('#modelHeading').html("View Customer");
                  
                    $('#ajaxViewModel').modal('show');
                    $('#user_ids').val(data.id);
                    $('#last_names').val(data.last_name);
                    $('#middle_names').val(data.middle_name);
                    $('#first_names').val(data.first_name);
                    $('#birthdates').val(data.birthdate);
                    $('#genders').val(data.gender);
                    $('#streets').val(data.street);
                    $('#block_lots').val(data.block_lot);
                    $('#citys').val(data.city);
                    $('#zipcodes').val(data.zipcode);
                    $('#provinces').val(data.province);
                    $('#emails').val(data.email);
                    $('#is_actives').val(data.is_active);
                    $('#phone_numbers').val(data.phone_number);
                    $('#start_pays').val(data.start_pay);
                    $('#date_joineds').val(data.date_joined);
                    }
                });
                $.get("{{ route('customer.index') }}" +'/' + user_ids +'/edit', function (data) {
                    $('#modelHeading').html("View Customer");
                    $('#ajaxViewModel').modal('show');
                    $('#user_ids').val(data.id);
                    $('#last_names').val(data.last_name);
                    $('#middle_names').val(data.middle_name);
                    $('#first_names').val(data.first_name);
                    $('#birthdates').val(data.birthdate);
                    $('#genders').val(data.gender);
                    $('#streets').val(data.street);
                    $('#block_lots').val(data.block_lot);
                    $('#citys').val(data.city);
                    $('#zipcodes').val(data.zipcode);
                    $('#provinces').val(data.province);
                    $('#emails').val(data.email);
                    $('#is_actives').val(data.is_active);
                    $('#phone_numbers').val(data.phone_number);
                    $('#start_pays').val(data.start_pay);
                    $('#date_joineds').val(data.date_joined);
                })
            });
    
    
          
    /////////////////////////////// SAVE CUSTOMER ///////////////////////////////  
            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Save');
            
                $.ajax({
                    data: $('#customerForm').serialize(),
                    url: "{{ route('customer.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        toastr.info('The Customer was saved sucessfully.', 'Saved Customer', {timeOut:3000});
                        $('#customerForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                    
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });
          
    
        /////////////////////////////// DELETE CUSTOMER ///////////////////////////////    
              $('body').on('click', '.deleteCustomer', function () {
                var user_id = $(this).data('id');
                $('#deleteCustomer').modal('show')
                $('#ok_button').click(function(){
                      $.ajax({
                          type: "DELETE",
                          url: "{{ route('customer.store') }}"+'/'+user_id,
                          success:function (data) {
                              table.draw();
    
                              toastr.warning('The Customer was deleted succesfully.', 'Delete success', {timeOut:3000});
                              
                              setTimeout(function(){
                              $('#deleteCustomer').modal('hide');
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