@extends('admin.layouts.dash', ['title' => 'All Notices', 'module' => "Notices"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-2"><a class="btn btn-primary btn-sm" href="{{ route('customize.pages.new')}}">New notice</a></div>
                <div class="d-flex flex-column">
                    <table id="datatable" class="table table-bordered table-hover table-sm">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Notice</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($notices as $notice)
                                <tr>
                                    <td>{{ $notice->id }}</td>
                                    <td>{{ $notice->name }}</td>
                                    <td>{{ $notice->service }}</td>
                                    <td>{{ $notice->date }}</td>
                                    <td class="row">
                                        <div class="mr-1"><a href="{{ route('customize.pages.edit', $blog->id) }}" class="btn btn-primary btn-sm"><i class="fa-light fa-edit"></i></a></div>
                                        <form action="{{ route('customize.pages.destroy', $blog->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-light fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
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
            var table = $('#datatable').DataTable({
                paging: true,
            });
        });
    </script>
@endsection