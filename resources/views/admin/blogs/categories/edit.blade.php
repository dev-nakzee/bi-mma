@extends('admin.layouts.dash', ['title' => 'Edit Category', 'module' => "Blogs"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="serviceAddForm" method="POST" action="{{route('blogs.category.update')}}">
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
                            <button class="btn btn-primary btn-sm ml-1" type="submit">Update</button>
                        </div>
                    </div>
                    <div class="d-flex row">
                        @if($category)
                        @foreach($category as $cat)
                        <input hidden type="text" id="cat_id" name="cat_id" value="{{ $cat->id }}">
                        <div class="form-group col-md-12">
                            <label for="page-name">Category</label>
                            <input type="text" class="form-control" id="category" name="name" value="{{ $cat->name }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="page-name">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $cat->slug }}">
                        </div>
                        @endforeach
                        @endif
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

@endsection
