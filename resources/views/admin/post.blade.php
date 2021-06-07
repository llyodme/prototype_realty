@extends('layout.layouts')
@section('content')  
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Post Tables</h1>
    <p class="mb-4">We use DataTables a third party plugin that is used to generate the table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> 
            <a class="btn btn-primary btn-icon-split" href="javascript:void(0)" id="createNewPost">
                <span class="icon text-white-50">
                    <i class="fas fa-camera"></i>
                </span>
                <span class="text">add post</span>
            </a>
           
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered data-table" id="user_table" width="100%" cellspacing="1">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th >Description</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th style="width: 13%">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody> 
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th style="width: 13%">Action</th>
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
                        <form id="postViewForm" name="postViewForm" class="form-horizontal">
                            <input type="hidden" name="post_ids" id="post_ids">

                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <label>Title</label>
                                    <input readonly type="text" class="form-control" id="titles" name="titles" placeholder="Title" value="">
                                    
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <label>Price</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">₱</span>
                                        </div>
                                        <input readonly type="text" class="form-control" value="" id="prices" name="prices" placeholder="Price" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                    
                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <label>Description</label>
                                    <textarea readonly type="text" class="form-control" value="" id="descriptions" name="descriptions" rows="6"></textarea>
                                   
                                </div>
                            </div>
                    
                            <div class="form-row mt-2">
                                <div class="col-md-6">
                                    <label>Date posted</label>
                                    <input readonly  type="text" value="" id="dates" name="dates" class="form-control">
                                    
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
                        <form id="postForm" name="postForm" class="form-horizontal">
                            <input type="hidden" name="post_id" id="post_id">

                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <label>Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="" required="">
                                    
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <label>Price</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">₱</span>
                                        </div>
                                        <input type="text" class="form-control" required="" value="" id="price" name="price" placeholder="Price" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                    
                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <label>Description</label>
                                    <textarea type="text" class="form-control" required="" value="" id="description" name="description" rows="6"></textarea>
                                   
                                </div>
                            </div>
                    
                            <div class="form-row mt-2">
                                <div class="col-md-6">
                                    <label>Date posted</label>
                                    <input type="date" required="" value="" id="date" name="date" class="form-control">
                                    
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
        <div class="modal fade" id="deletePost"  role="dialog" >
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
                        <p>Do you want to delete these post? This process cannot be undone.</p>
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
              ajax: "{{ route('post.index') }}",
              columns: [
                  
                  {data: 'title', name: 'title'},
                  {data: 'description', name: 'description'},
                  {data: 'price', name: 'price'},
                  {data: 'date', name: 'date'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
        });
    
/////////////////////////////// CREATE NEW POST ///////////////////////////////  
        $('#createNewPost').click(function () {
              $('#saveBtn').val("create-post");
              $('#post_id').val('');
              $('#postForm').trigger("reset");
              $('#modelHeadingEdit').html("Create New Post");
              $('#ajaxModel').modal('show');
        });
      
      

/////////////////////////////// EDIT POST ///////////////////////////////  
         $('body').on('click', '.editPost', function () {
            var post_id = $(this).data('id');
            $.ajax({

                url: "{{ route('post.index') }}" +'/' + post_id +'/edit', function (data) {
                    $('#modelHeadingEdit').html("Edit Post");
                $('#saveBtn').val("edit-post");
                $('#ajaxModel').modal('show');
                $('#post_id').val(data.id);
                $('#title').val(data.title);
                $('#description').val(data.description);
                $('#price').val(data.price);
                $('#date').val(data.date);
                }
            });
            $.get("{{ route('post.index') }}" +'/' + post_id +'/edit', function (data) {
                $('#modelHeadingEdit').html("Edit Post");
                $('#saveBtn').val("edit-post");
                $('#ajaxModel').modal('show');
                $('#post_id').val(data.id);
                $('#title').val(data.title);
                $('#description').val(data.description);
                $('#price').val(data.price);
                $('#date').val(data.date);
            })
        });


/////////////////////////////// VIEW POST ///////////////////////////////  
$('body').on('click', '.viewPost', function () {
            var post_ids = $(this).data('id');
            $.ajax({

                url: "{{ route('post.index') }}" +'/' + post_ids +'/edit', function (data) {
                    $('#modelHeading').html("View Post");
              
                $('#ajaxViewModel').modal('show');
                $('#post_ids').val(data.id);
                $('#titles').val(data.title);
                $('#descriptions').val(data.description);
                $('#prices').val(data.price);
                $('#dates').val(data.date);
                }
            });
            $.get("{{ route('post.index') }}" +'/' + post_ids +'/edit', function (data) {
                $('#modelHeading').html("View Post");
                $('#ajaxViewModel').modal('show');
                $('#post_ids').val(data.id);
                $('#titles').val(data.title);
                $('#descriptions').val(data.description);
                $('#prices').val(data.price);
                $('#dates').val(data.date);
            })
        });


      
/////////////////////////////// SAVE POST ///////////////////////////////  
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Save');
        
            $.ajax({
                data: $('#postForm').serialize(),
                url: "{{ route('post.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    toastr.info('The Post was saved sucessfully.', 'Saved Post', {timeOut:3000});
                    $('#postForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });
      

    /////////////////////////////// DELETE POST ///////////////////////////////    
          $('body').on('click', '.deletePost', function () {
            var post_id = $(this).data('id');
            $('#deletePost').modal('show')
            $('#ok_button').click(function(){
                  $.ajax({
                      type: "DELETE",
                      url: "{{ route('post.store') }}"+'/'+post_id,
                      success:function (data) {
                          table.draw();

                          toastr.warning('The Post was deleted succesfully.', 'Delete success', {timeOut:3000});
                          
                          setTimeout(function(){
                          $('#deletePost').modal('hide');
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

