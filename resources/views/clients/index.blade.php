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
                        <th>#</th>
                        <th>Full_Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone_Number</th>
                        <th>Property</th>

                        {{-- <th>Created at</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $client->full_name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->password }}</td>
                            <td>{{ $client->phone_number }}</td>
                            <td>{{ $client->property }}</td>
                            <td class="d-flex">
                                <a class="mx-1" href="{{ route('clients.active', $client->id) }}"><button
                                        class="btn fa fa-eye text-success"></button></a>
                                <a class="mx-1" href="{{ route('clients.show', $client) }}"><button
                                        class="btn fa fa-eye text-success"></button></a>
                                <a class="mx-1" href="{{ route('clients.edit', $client->id) }}"><button
                                        class="btn fa fa-edit text-primary"></button></a>
                                <form action="{{ route('clients.destroy', $client) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" btn fa fa-trash text-danger"
                                        onclick="return confirm('Are you sure to delete this client?')">delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('js')

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
        <script>
            $(document).ready(function () {
                $('#datatablecrud').DataTable();
            });
        </script>

    @endpush




@endsection
