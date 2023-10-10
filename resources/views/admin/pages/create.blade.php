@extends('admin.layouts.dash', ['title' => 'All Pages', 'module' => "Pages"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-2"><a class="btn btn-primary btn-sm" href="{{ route('customize.pages.new')}}">Save</a></div>
                <div class="d-flex flex-column">
                    <form>
                        <div class="form-group">
                            <label for="page-name">Page</label>
                            <input type="text" class="form-control" id="page-name">
                        </div>
                        <div class="form-group">
                            <label for="page-slug">Slug</label>
                            <input type="text" class="form-control" id="page-slug">
                        </div>
                        <div class="form-group">
                            <label for="page-slug">Content</label>
                            <textarea id="editor-area" name="content">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="page-short">Page Description</label>
                            <textarea class="form-control" id="page-short"></textarea>
                        </div>  
                        <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>                          
                        <div class="form-group">
                            <label for="page-description">Image Alt</label>
                            <textarea class="form-control" id="page-description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="page-title">SEO Title</label>
                            <input type="text" class="form-control" id="page-title">
                        </div>
                        <div class="form-group">
                            <label for="page-description">SEO Description</label>
                            <input type="text" class="form-control" id="page-description">
                        </div>
                        <div class="form-group">
                            <label for="page-meta">Meta Tags</label>
                            <input type="text" class="form-control" id="page-meta">
                        </div>
                        <div class="form-group">
                            <label for="page-keyword">Keywords</label>
                            <input type="text" class="form-control" id="page-keyword">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')

@endsection
@section('scripts')
<script src="{{asset('tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
    <script>
        $(document).ready(function() {
        });
    </script>
@endsection