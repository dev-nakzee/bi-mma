@extends('admin.layouts.dash', ['title' => 'All Categories', 'module' => "Categories"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex row mb-1">
                    <div class="col-md-8">
                    @if(session('messages'))
                        @foreach(session('messages') as $message)
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endforeach
                    @endif
                    </div>
                    <div class="d-flex justify-content-end col-md-4">
                        <a class="btn btn-primary btn-sm" href="{{ route('category.create')}}">New category</a>
                    </div>
                </div>
                
                <div class="d-flex flex-column">
                    <table id="categoryDatatable" class="table table-bordered table-hover table-sm">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Tags</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables/datatables.min.css') }}" type="text/css" />
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/datatables/datatables.min.js')}}"></script>
    <!-- form wizard --> 
    <script>
        $(document).ready(function() {
            loadDataTable();
        });
        function loadDataTable() {
            var table = $('#categoryDatatable').DataTable({
                paging: true,
                retrieve: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('category.table') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'category', name: 'category'},
                    {data: 'description', name: 'description'},
                    {data: 'tags', name: 'tags'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        }
    </script>
@endsection