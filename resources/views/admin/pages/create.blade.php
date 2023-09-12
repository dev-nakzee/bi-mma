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
                        <textarea id="inp_editor1" >
                            &lt;p&gt;Initial Document Content&lt;/p&gt; 
                        </textarea>  
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
<link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />  
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>  
<script type="text/javascript" src='{{ asset('richtexteditor/plugins/all_plugins.js') }}'></script>  
    <script>
        $(document).ready(function() {
            var editor1 = new RichTextEditor("#inp_editor1");
        });
    </script>
@endsection