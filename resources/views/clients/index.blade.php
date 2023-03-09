@extends('layouts.index')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Client List</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('clients.create') }}"> Create Client</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered" id="datatablecrud">

                <thead>
                    <tr>
                        {{-- <th>#</th> --}}
                        <th>Full_Name</th>
                        <th>Email</th>
                        {{-- <th>Password</th> --}}
                        <th>Phone_Number</th>
                        <th>Property</th>

                        <th>active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>

    @push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
   
    

<script type="text/javascript">
    $(document).ready( function () {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('#datatablecrud').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ url('clientindex') }}",
    columns: [
{ data: 'full_name', name: 'full_name' },
{ data: 'email', name: 'email' },
{ data: 'phone_number', name: 'phone_number' },

{ data: 'property', name: 'property' },
// { data: 'created_at', name: 'created_at' },
{data: 'active', name: 'active', orderable: false},
    {data: 'action', name: 'action', orderable: false},
    ],
    order: [[0, 'desc']]
    });
    
    // $('body').on('click', '.delete', function () {
    // if (confirm("Delete Record?") == true) {
    // var id = $(this).data('id');
    // // ajax
    // $.ajax({
    // type:"POST",
    // url: "{{ url('destroypro') }}",
    // data: { id: id},
    // dataType: 'json',
    // success: function(res){
    // var oTable = $('#datatable-crud').dataTable();
    // oTable.fnDraw(false);
    // }
    // });
    // }
    // });
    
    $('body').on('click', '.delete', function (event) {
        //  $('.show_confirm').click(function(event) {
    
              var form =  $(this).closest("form");
    
              var name = $(this).data("name");
    
              event.preventDefault();
    
              swal({
    
                  title: `Are you sure you want to delete this record?`,
    
                  text: "If you delete this, it will be gone forever.",
    
                  icon: "warning",
    
                  buttons: true,
    
                  dangerMode: true,
                  
    
              })
    
              .then((willDelete) => {
    
                if (willDelete) {
    
                  form.submit();
                var id = $(this).data('id');
                    // ajax
                    $.ajax({
                    type:"POST",
                    url: "{{ url('destroyclient') }}",
                    data: { id: id},
                    dataType: 'json',
                    success: function(res){
                       
                    var oTable = $('#datatablecrud').dataTable();
                    oTable.fnDraw(false);
                    table.clear().draw();
                   
                    }
                    
                    });
    
    
                }
    
              });
    
          });
    
    
    
    
    
    $('body').on('click', '.edit', function () {
    // if (confirm("Edit Record?") == true)
    //  {
    var id = $(this).data('id');
    
    // ajax
    $.ajax({
    type:"POST",
    url: "{{ url('edit_client') }}",
    data: { id: id},
    
    dataType: 'json',
    success: function(res){
    var oTable = $('#datatablecrud').dataTable();
    oTable.fnDraw(false);
    }
    });
    // }
    });
        
    $('body').on('click', '.show', function () {
    // if (confirm("Edit Record?") == true)
    //  {
    var id = $(this).data('id');
    
    // ajax
    $.ajax({
    type:"POST",
    url: "{{ url('show_client') }}",
    data: { id: id},
    
    dataType: 'json',
    success: function(res){
    var oTable = $('#datatablecrud').dataTable();
    oTable.fnDraw(false);
    }
    });
    // }
    });
    
    });
    
    </script>

        <script src="{{ url('backend') }}/plugins/jquery/jquery.min.js"></script>

        <script src="{{ url('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="{{ url('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ url('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ url('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ url('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{ url('backend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{ url('backend') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{ url('backend') }}/plugins/jszip/jszip.min.js"></script>
        <script src="{{ url('backend') }}/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{ url('backend') }}/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{ url('backend') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{ url('backend') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{ url('backend') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        

    @endpush




@endsection
