@extends('admin.layouts.dash', ['title' => 'New Service', 'module' => "Services"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="serviceEditForm">
                    @if($service)
                    @foreach($service as $data)
                    <div class="row d-flex">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <a class="btn btn-danger btn-sm" href="{{url()->previous()}}">Cancel</a>
                            <button class="btn btn-primary btn-sm ml-1" id="serviceUpdate">Update</button>
                        </div>
                    </div>
                    <input type="hidden" name="serviceId" value="{{$data->id}}" />
                    <div class="d-flex row">
                        <div class="form-group col-md-6">
                            <label for="page-name">Service Name</label>
                            <input type="text" class="form-control" id="service" name="service" value="{{$data->service}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{$data->slug}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-slug">Service Image</label>
                            <div class="row">
                                <select type="text" class="form-control col-11" id="image" name="image" value="{{$data->image}}">
                                </select>
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addMediaModal"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-slug">Image Alt</label>
                            <input type="text" class="form-control" id="page-slug" name="image_alt" value="{{$data->img_alt}}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="page-short">Page Description</label>
                            <textarea class="form-control" id="description" name="description">
                                {{trim($data->description)}}
                            </textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="page-short">About service</label>
                            <textarea id="about" name="about">
                                {{$data->about}}
                            </textarea>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="page-short">Required Documents</label>
                            <textarea id="documentation" name="documentation">
                                {{$data->documents}}
                            </textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="page-short">Standard Costing &amp Timeline</label>
                            <textarea id="stdCostTime" name="stdCostTime">
                                {{$data->stdcosttime}}
                            </textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="page-short">Registration Process</label>
                            <textarea id="process" name="process">
                                {{$data->process}}
                            </textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="page-title">SEO Title</label>
                            <input type="text" class="form-control" id="seoTitle" name="seoTitle" value="{{$data->seotitle}}">
                            <p>Pixels: <span id="pxl"></span>(545px) | Character: <span id="char"></span>(190)</p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-description">SEO Description</label>
                            <textarea type="text" class="form-control" id="seoDescription" name="seoDescription">
                                {{trim($data->seodescription)}}
                            </textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="page-keyword">Keywords</label>
                            <textarea type="text" class="form-control" id="seoKeywords" name="seoKeywords">
                                {{trim($data->seokeywords)}}
                            </textarea>
                        </div>
                        <div class="form-group col-md-12" id="faq">
                            <label for="page-keyword">FAQ <button class="btn btn-primary btn-sm" id="addFaq"><i class="fa fa-plus"></i> Add</button></label>
                            <div class="container col-md-12 row">
                                @php
                                    $faq = json_decode($data->faq, true);
                                    $i = 0;
                                @endphp
                                @foreach($faq as $que=>$ans)
                                <div class="col-md-6">
                                    <label>Question</label>
                                    <input type="text" class="form-control" name="question[{{$i}}]" value="{{$que}}">
                                </div>
                                <div class="col-md-6">
                                    <label>Answer</label>
                                    <input type="text" class="form-control" name="answer[{{{$i}}}]" value="{{$ans}}">
                                </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </form>
            </div>
        </div>
    </div>
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
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />  
<!-- Include Dropzone.js CSS-->
<link href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/min/dropzone.min.css" rel="stylesheet">
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>  
<script type="text/javascript" src='{{ asset('richtexteditor/plugins/all_plugins.js') }}'></script>  
<!-- Include Dropzone.js JS-->
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/min/dropzone.min.js"></script> 
    <script>
        $(document).ready(function() {
            var editorAbout = new RichTextEditor("#about");
            var editor1Document = new RichTextEditor("#documentation");
            var editor1Costing = new RichTextEditor("#stdCostTime");
            var editor1Process = new RichTextEditor("#process");
            Dropzone.options.fileUpload = {
                maxFiles: 1,
                paramName: "file", // Name of the input field (file upload)
                maxFilesize: 2, // Max file size in MB
                acceptedFiles: ".jpg, .jpeg, .png, .pdf", // Allowed file types
            };
            $('#serviceEditForm').on('submit', function(e){
                e.preventDefault();
            });
            listMedia()
        });
        $('#serviceEditForm').on('submit', function(e){
            e.preventDefault();
        });
        $('#addMediaModal').on('hidden.bs.modal', function () {
            listMedia();
        });
        function listMedia() {
            $('#image').empty();
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
                        $('#image').append('<option value="'+key.id+'"><img style="width:20px;" src="http://localhost:8000'+key.path+'">'+key.media+'</option>');
                    })
                }
            });
        }
        function displayTextWidth(text, font) {
            let canvas = displayTextWidth.canvas || (displayTextWidth.canvas = document.createElement("canvas"));
            let context = canvas.getContext("2d");
            context.font = font;
            let metrics = context.measureText(text);
            return metrics.width;
        }
        $('#service').on('keyup', function() {
            var service = $(this).val();
            $('#slug').val(service.toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]+/g, ''));
        });
        $('#seoTitle').on('keyup', function(){
            var seotitle = $('#seoTitle').val();
            var pxl = Math.round(displayTextWidth(seotitle, "normal 20px Arial"));
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
        
        let queCount = {{count(json_decode($service[0]->faq, true))-1}};
        let ansCount = {{count(json_decode($service[0]->faq, true))-1}};
        $('#addFaq').on('click', function(e){
            e.preventDefault();
            queCount++;
            ansCount++;
            $('#faq').append('<div class="container col-md-12 row"><div class="col-md-6"><label>Question</label><input type="text" class="form-control" name="question['+queCount+']"></div><div class="col-md-6"><label>Answer</label><input type="text" class="form-control" name="answer['+ansCount+']"></div></div>');
        });
        $("#serviceUpdate").on('click', function(){
            console.log($('#serviceEditForm').serialize());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('services.update') }}",
                data: $('#serviceEditForm').serialize(),
                dataType: 'JSON',
                success: function(response) {
                    console.log(response);
                    if (response.status =='success') {
                        //window.location = "{{ route('services.index')}}";
                    }
                },
                error: function(response){
                    console.log(response);
                    $('#editProductError').removeClass('d-none');
                    $('#editProductError').html(response.responseJSON.message);
                }
            });
        });
    </script>
@endsection
