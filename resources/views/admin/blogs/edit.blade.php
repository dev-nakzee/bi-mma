@extends('admin.layouts.dash', ['title' => 'Edit Blogs', 'module' => "Blogs"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="blogEditForm" method="POST" action="{{route('blogs.save')}}">
                    @csrf
                    <div class="row d-flex">
                        <div class="col-md-6" id="EditBlogError">
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <a class="btn btn-danger btn-sm" href="{{url()->previous()}}">Cancel</a>
                            <button class="btn btn-primary btn-sm ml-1" id="blogEditSave">Save</button>
                        </div>
                    </div>
                    @if($blogs)
                    @php $blog = $blogs[0]; @endphp
                    <input type="hidden" name="blogId" value="{{ $blog->id }}">
                    <div class="d-flex row">
                        <div class="form-group col-md-6">
                            <label for="page-name">Title</label>
                            <input type="text" class="form-control" id="blogTitle" name="name" value="{{ $blog->name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-name">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $blog->slug }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-slug">Blog Image</label>
                            <div class="row">
                                <input type="text" class="form-control col-11" id="imgselect" name="imgselect" disabled value="{{ $blog->image}}">
                                <input type="text" class="form-control col-11" id="image" name="image" disabled hidden>
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addMediaModal"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="blog-img-alt">Image Alt</label>
                            <input type="text" class="form-control" id="alt" name="image_alt" value="{{ $blog->img_alt }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="blog-category">Blog category</label>
                            <select class="form-control" id="category_id" name="category_id" value="{{ $blog->category_id }}">

                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="blog-category">Content</label>
                            <textarea class="editor-area" id="content" name="content">{{ $blog->content}}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="page-title">SEO Title</label>
                            <input type="text" class="form-control" id="seoTitle" name="seoTitle" value="{{ $blog->meta_title}}">
                            <p>Pixels: <span id="pxl"></span>(545px) | Character: <span id="char"></span>(190)</p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-description">SEO Description</label>
                            <textarea type="text" class="form-control" id="seoDescription" name="seoDescription" value="">{{ $blog->meta_description}}</textarea>
                            <p>Character: <span id="desChar"></span></p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-keyword">Keywords</label>
                            <textarea type="text" class="form-control" id="seoKeywords" name="seoKeywords" value=''>{{ $blog->meta_keywords}}</textarea>
                            <p>Count: <span id="keywordCount"></span></p>
                        </div>
                    </div>
                    @endif
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
            loadCategory();
        });
        function loadCategory() {
            $('#category_id').empty();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ route('blogs.category.list') }}",
                dataType: 'JSON',
                success: function(response) {
                    response[0].forEach(function(key){
                        $('#category_id').append('<option value="'+key.id+'">'+key.name+'</option>');
                    })
                }
            });
        }
        function uploadMedia(){
            Dropzone.options.fileUpload = {
                maxFiles: 1,
                paramName: "file", // Name of the input field (file upload)
                maxFilesize: 2, // Max file size in MB
                uploadMultiple: false,
                acceptedFiles: ".jpg, .jpeg, .png", // Allowed file types
            };
        }
        $(window).on('shown.bs.modal', function() { 
            uploadMedia();
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
        function displayTextWidth(text, font) {
            let canvas = displayTextWidth.canvas || (displayTextWidth.canvas = document.createElement("canvas"));
            let context = canvas.getContext("2d");
            context.font = font;
            let metrics = context.measureText(text);
            return metrics.width;
        }
        $('#blogTitle').on('keyup', function() {
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
        $('#seoDescription').on('keyup', function(){
            var seodescription = $(this).val().length;
            $('#desChar').text(seodescription);
        });
        $('#seoKeywords').on('keyup', function(){
            var string = $(this).val();
            var array = string.split(',');
            console.log(array.length);
        });
        $('#blogEditForm').on('submit', function(e){
            e.preventDefault();
        });
        $("#blogEditSave").on('click', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('blogs.update') }}",
                data: $('#blogEditForm').serialize(),
                dataType: 'JSON',
                success: function(response) {
                    console.log(response);
                    if (response.status =='success') {
                        window.location = "{{ route('blogs.index')}}";
                    }
                },
                error: function(response){
                    console.log(response);
                    $('#EditBlogError').html(response.responseJSON.message);
                }
            });
        });
    </script>
@endsection