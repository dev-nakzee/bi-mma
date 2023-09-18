@extends('admin.layouts.dash', ['title' => 'All Images', 'module' => "Media"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-2">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addMediaModal">
                        <i class="fa fa-plus"></i> Add Media
                    </button>                      
                </div>
                <div class="modal fade" id="addMediaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addMediaModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addMediaModalLabel">Add media</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('media.upload.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="file-upload">
                                    @csrf
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
                                    
                <div class="d-flex flex-column">
                    <table id="mediaDataTable" class="table table-bordered table-hover table-sm" style="font-size: smaller;">
                        <thead>
                          <tr>
                            <th>#Sr</th>
                            <th>Media</th>
                            <th>Type</th>
                            <th>Size (MB)</th>
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
    <link rel="stylesheet" href="{{ asset('assets/DataTables/css/dataTables.bootstrap4.min.css') }}" type="text/css" />
    <!-- Include Dropzone.js CSS-->
    <link href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/min/dropzone.min.css" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('assets/DataTables/js/jquery.dataTables.min.js')}}"></script> 
    <script src="{{ asset('assets/DataTables/js/dataTables.bootstrap5.min.js')}}"></script>
    <!-- Include Dropzone.js JS-->
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/min/dropzone.min.js"></script> 
    <script>
        $(document).ready(function() {
            loadDataTable();
            Dropzone.options.fileUpload = {
                maxFiles: 1,
                paramName: "file", // Name of the input field (file upload)
                maxFilesize: 2, // Max file size in MB
                acceptedFiles: ".jpg, .jpeg, .png, .pdf", // Allowed file types
            };
            
        });
        $('#addMediaModal').on('hidden.bs.modal', function () {
            $('#mediaDataTable').DataTable().ajax.reload()
        });
        function loadDataTable() {
            var table = $('#mediaDataTable').DataTable({
                paging: true,
                retrieve: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('media.table') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'media', name: 'media'},
                    {data: 'type', name: 'type'},
                    {data: 'size', name: 'size'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        }
        function delMedia(id) {
            if(confirm('Are you sure you want to delete?') == true) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('media.remove') }}",
                    data: {'id': id},
                    dataType: 'JSON',
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload();
                    }
                });
            }
        }
    </script>
@endsection