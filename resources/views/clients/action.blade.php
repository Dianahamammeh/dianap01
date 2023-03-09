<a href="{{ route('clients.edit',$id) }}" data-toggle="tooltip" data-original-title="Edit"  class="btn fa fa-edit text-primary edit">
    Edit
    </a>
    <a href="{{ route('clients.show',$id) }}" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="show"  class="btn fa fa-eye text-success">
        Show
    </a>
    <a href="javascript:void(0)" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
    Delete
    </a>
  
