@extends('admin.layouts.dash', ['title' => 'All Blog Categories', 'module' => "Blogs"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-2"><a class="btn btn-primary btn-sm" href="{{ route('blogs.category.create')}}">New category</a></div>
                <div class="d-flex flex-column">
                    <table id="BlogCatDatatable" class="table table-bordered table-hover table-sm">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Slug</th>
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
            var table = $('#BlogCatDatatable').DataTable({
                paging: true,
                retrieve: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('blogs.category.table') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        }
    </script>
@endsection