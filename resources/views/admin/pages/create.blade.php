@extends('admin.layouts.dash', ['title' => 'All Pages', 'module' => "Pages"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="page-form">
                    <div class="row d-flex">
                        <div class="col-md-6" id="addPageError">

                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <a class="btn btn-danger btn-sm" href="{{url()->previous()}}">Cancel</a>
                            <button class="btn btn-primary btn-sm ml-1" id="pageSave">Save</button>
                        </div>
                    </div>
                    @csrf
                    <div class="d-flex row">
                    <div class="form-group col-md-6">
                        <label for="page-name">Page</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="page-slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="page-slug">Blog Image</label>
                        <div class="row">
                            <input type="text" class="form-control col-11" id="imgselect" name="imgselect" disabled>
                            <input type="text" class="form-control col-11" id="image" name="img_id" hidden>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addMediaModal"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="blog-img-alt">Image Alt</label>
                        <input type="text" class="form-control" id="alt" name="image_alt">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="page-slug">Content</label>
                        <textarea id="editor-area" name="content">
                        </textarea>
                    </div> 
                    <div class="form-group col-md-12">
                        <label for="page-title">SEO Title</label>
                        <input type="text" class="form-control" id="seoTitle" name="seoTitle">
                        <p>Pixels: <span id="pxl"></span>(545px) | Character: <span id="char"></span>(190)</p>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="page-description">SEO Description</label>
                        <input type="text" class="form-control" id="page-description" name="seoDescription">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="page-meta">Meta Tags</label>
                        <input type="text" class="form-control" id="page-meta" name="seoMeta">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="page-keyword">Keywords</label>
                        <input type="text" class="form-control" id="page-keyword" name="seoKeyword">
                    </div>
                    </div>
                </form>
              
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addMediaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addMediaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
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
                <button class="btn btn-primary btn-sm mt-1 w-100" id="loadMedia">Load Media</button>
                <div id="gallery" class="p-2 content-justify-center mt-2">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<!-- Include Dropzone.js CSS-->
<link href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/min/dropzone.min.css" rel="stylesheet">
@endsection
@section('scripts')
<script src="{{asset('tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
<!-- Include Dropzone.js JS-->
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/min/dropzone.min.js"></script> 
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea#editor-area',
        height: 500,
        menubar: true,
        plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "2m",
        image_advtab: true,
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
    $('#name').on('keyup', function() {
            var product = $(this).val();
            $('#slug').val(product.trim().toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]+/g, ''));
        });
    $('#seoTitle').on('keyup', function(){
        var seotitle = $('#seoTitle').val();
        var pxl = Math.round(displayTextWidth(seotitle, "20pt arial, san-serif"));
        pxl = pxl - (pxl * (10/100));
        var char = seotitle.length;
        $('#pxl').text(pxl);
        $('#char').text(char);
        if (pxl > 545) {
            $('#pxl').fontcolor = '#ff0000';
        } else {
            $('#pxl').fontcolor = "#000";
        }
        if (char > 190) {
            $('#char').fontcolor = "#ff0000";
        } else {
            $('#char').fontcolor = "#000";
        }
    });
    $(document).ready(function() {
   
            uploadMedia();
            uploadDocs();
        });
        function uploadMedia(){
            Dropzone.options.fileUpload = {
                maxFiles: 1,
                paramName: "file", // Name of the input field (file upload)
                maxFilesize: 2, // Max file size in MB
                uploadMultiple: false,
                acceptedFiles: ".jpg, .jpeg, .png", // Allowed file types
            };
        }
        function uploadDocs(){
            Dropzone.options.docsUpload = {
                maxFiles: 1,
                paramName: "file", // Name of the input field (file upload)
                maxFilesize: 2, // Max file size in MB
                uploadMultiple: false,
                acceptedFiles: ".pdf", // Allowed file types
            };
        }
        $('#loadMedia').on('click', function(){
            listMedia();
        });
        $(window).on('shown.bs.modal', function() { 
            //$('#addMediaModal').modal('show');
            listMedia();
        });
        function listMedia() {
            $('#gallery').empty();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ route('media.list') }}",
                dataType: 'JSON',
                success: function(response) {
                    response[0].forEach(function(key){
                        $('#gallery').append('<button type="button" class="btn lazy gallery-btn m-1 p-1" onclick="galleryBtn('+key.id+', `'+key.name+'`)" value="'+key.id+'"><img class="gallery-image lazy" src="http://localhost:8000'+key.path+'"></button>');
                    })
                }
            });
        }
        function galleryBtn(imgid, img) {
            $('#image').val(imgid);
            $('#imgselect').val(img);
            console.log(imgid+' img="'+img);
            $('#addMediaModal').modal('hide');
        }
        $("#page-form").on('submit', function(e){
            e.preventDefault();
        });
        $("#pageSave").on('click', function() {
            console.log($('#page-form').serialize());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('customize.pages.save') }}",
                data: $('#page-form').serialize(),
                dataType: 'JSON',
                success: function(response) {
                    console.log(response);
                    if (response.status =='success') {
                        window.location = "{{ route('customize.pages.index')}}";
                    }
                },
                error: function(response){
                    console.log(response);
                    $('#addPageError').html(response.responseJSON.message);
                }
            });
        });
</script>
@endsection