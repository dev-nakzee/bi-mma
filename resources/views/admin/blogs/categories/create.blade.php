@extends('admin.layouts.dash', ['title' => 'New Category', 'module' => "Blogs Category"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="serviceAddForm" method="POST" action="{{route('blogs.category.save')}}">
                    @csrf
                    <div class="row d-flex">
                        <div class="col-md-6">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-sm">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <a class="btn btn-danger btn-sm" href="{{url()->previous()}}">Cancel</a>
                            <button class="btn btn-primary btn-sm ml-1" type="submit">Save</button>
                        </div>
                    </div>
                    <div class="d-flex row">
                        <div class="form-group col-md-12">
                            <label for="page-name">Blog category</label>
                            <input type="text" class="form-control" id="blogCategory" name="name" value="{{ old('category') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="page-name">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('category') }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')

@endsection
@section('scripts')
<script>
    $('#blogCategory').on('keyup', function() {
        var product = $(this).val();
        $('#slug').val(product.trim().toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]+/g, ''));
    });
</script>
@endsection
