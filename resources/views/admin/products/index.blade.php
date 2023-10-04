@extends('admin.layouts.dash', ['title' => 'All Services', 'module' => "Serices"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-2"><a class="btn btn-primary btn-sm" href="{{ route('products.create')}}">New Product</a></div>
                <div class="d-flex flex-column">
                    <table id="productDatatable" class="table table-bordered table-hover table-sm">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Products</th>
                            <th>Category</th>
                            <th>Serivces</th>
                            <th>Compliances</th>
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
            var table = $('#productDatatable').DataTable({
                paging: true,
                retrieve: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('products.table') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'product', name: 'product'},
                    {data: 'category', name: 'category'},
                    {data: 'services', name: 'services'},
                    {data: 'compliances', name: 'compliances'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        }
    </script>
@endsection