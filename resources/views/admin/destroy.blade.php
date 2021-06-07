<form action="{{route('post.destroy', $post->post_id )}}" method="DELETE" id="submit">
    @csrf  
    @method('DELETE')

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
        <a href="javascript:$('#submit').submit();" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text">Delete</span>
        </a>
    </div>
</form>