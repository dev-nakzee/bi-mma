@extends('admin.layouts.dash', ['title' => 'New Product', 'module' => "Products"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="productAddForm">
                    <div class="row d-flex">
                        <div class="col-md-6" id="addProductError">

                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <a class="btn btn-danger btn-sm" href="{{url()->previous()}}">Cancel</a>
                            <button class="btn btn-primary btn-sm ml-1" id="productSave">Save</button>
                        </div>
                    </div>
                    <div class="d-flex row">
                        <div class="form-group col-md-6">
                            <label for="page-name">Product Name</label>
                            <input type="text" class="form-control" id="product" name="product">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-slug">Product Image</label>
                            <div class="row">
                                <input type="text" class="form-control col-11" id="imgselect" name="imgselect" disabled>
                                <input type="text" class="form-control col-11" id="image" name="image" disabled hidden>
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addMediaModal"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-slug">Image Alt</label>
                            <input type="text" class="form-control" id="alt" name="image_alt">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-slug">Category</label>
                            <select class="form-control" id="category" name="category" multiple>

                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-slug">Services</label>
                            <select class="form-control" id="services" name="services" multiple></select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="page-short">Standards</label>
                            <input type="text" class="form-control" id="standards" name="standards">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="page-short">Description</label>
                            <textarea class="editor-area" id="description" name="description"></textarea>
                        </div>
                        <div class="form-group col-md-12 d-block">
                            <label for="page-short">About product</label>
                            <textarea name="about" id="about" class="editor-area"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="page-short">Standards</label>
                            <input type="text" class="form-control" id="standards" name="standards">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-title">Information List</label>
                            <input type="text" class="form-control col-11 d-inline" id="infoList" disabled>
                            <input type="text" class="form-control col-11" name="infoList" disabled hidden>
                            <a href="#" id="infoListBtn" class="btn btn-primary btn-sm col-1 d-inline" data-toggle="modal" data-target="#addDocsModal"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-title">Guidelines</label>
                            <input type="text" class="form-control col-11 d-inline" id="guidelines" disabled>
                            <input type="text" class="form-control col-11" name="guidelines" disabled hidden>
                            <a href="#" id="guidelinesBtn" class="btn btn-primary btn-sm col-1 d-inline" data-toggle="modal" data-target="#addDocsModal"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="page-title">SEO Title</label>
                            <input type="text" class="form-control" id="seoTitle" name="seoTitle">
                            <p>Pixels: <span id="pxl"></span>(545px) | Character: <span id="char"></span>(190)</p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-description">SEO Description</label>
                            <textarea type="text" class="form-control" id="seoDescription" name="seoDescription"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-keyword">Keywords</label>
                            <textarea type="text" class="form-control" id="seoKeywords" name="seoKeywords"></textarea>
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
<div class="modal fade" id="addDocsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addDocsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDocsModalLabel">Add Documents</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('docs.upload.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="docs-upload">
                    @csrf
                </form>
                <button class="btn btn-primary btn-sm mt-1 w-100" id="loadDocs">Load Documents</button>
                <input type="text" hidden id="docType">
                <div id="doclibrary" class="p-2 content-justify-center mt-2">

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
<script src="{{ asset('tinymce/tinymce.min.js')}}"></script>

<!-- Include Dropzone.js JS-->
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/min/dropzone.min.js"></script> 
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: 'textarea.editor-area',
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion',
                toolbar: "undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl",
            });
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
        function listDocs() {
            $('#doclibrary').empty();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ route('docs.list') }}",
                dataType: 'JSON',
                success: function(response) {
                    response[0].forEach(function(key){
                        $('#doclibrary').append('<button type="button" class="btn lazy docs-btn m-1 p-1" onclick="libraryBtn('+key.id+', `'+key.document+'`)" value="'+key.id+'"><img class="gallery-image lazy" src="http://localhost:8000/{{ asset(`assets/admin/img/pdf.png`)}}"></button>');
                    })
                }
            });
        }
        $('#loadDocs').on('click', function() {
            listDocs();
        });
        $('#infoListBtn').on('click', function(){
            $('#docType').val('infolist');
        });
        $('#guidelinesBtn').on('click', function(){
            $('#docType').val('guideline');
        });
        
        function galleryBtn(imgid, img) {
            $('#image').val(imgid);
            $('#imgselect').val(img);
            console.log(imgid+' img="'+img);
            $('#addMediaModal').modal('hide');
        }
        function libraryBtn(docid, doc) {
            if($('#docType').val() === 'infolist')
            {
                $('input[name="infoList"]').val() = docid;
                $('#infoList').val() = doc;
            }
            if($('#docType').val() === 'guideline')
            {
                $('input[name="guidelines"]').val() = docid;
                $('#guidelines').val() = doc;
            }
        }

        function displayTextWidth(text, font) {
            let canvas = displayTextWidth.canvas || (displayTextWidth.canvas = document.createElement("canvas"));
            let context = canvas.getContext("2d");
            context.font = font;
            let metrics = context.measureText(text);
            return metrics.width;
        }
        $('#product').on('keyup', function() {
            var product = $(this).val();
            $('#slug').val(product.trim().toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]+/g, ''));
        });
        $('#seoTitle').on('keyup', function(){
            var seotitle = $('#seoTitle').val();
            var pxl = Math.round(displayTextWidth(seotitle, "20pt arial, san-serif"));
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
        $('#productAddForm').on('submit', function(e){
            e.preventDefault();
        });
        let queCount = 0;
        let ansCount = 0;
        $('#addFaq').on('click', function(e){
            queCount++;
            ansCount++;
            $('#faq').append('<div class="container col-md-12 row"><div class="col-md-6"><label>Question</label><input type="text" class="form-control" name="question['+queCount+']"></div><div class="col-md-6"><label>Answer</label><input type="text" class="form-control" name="answer['+ansCount+']"></div></div>');
        });
        $("#productSave").on('click', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('products.save') }}",
                data: $('#productAddForm').serialize(),
                dataType: 'JSON',
                success: function(response) {
                    console.log(response);
                    if (response.status =='success') {
                        window.location = "{{ route('products.index')}}";
                    }
                },
                error: function(response){
                    console.log(response);
                    $('#addProductError').html(response.responseJSON.message);
                }
            });
        });
    </script>
@endsection
