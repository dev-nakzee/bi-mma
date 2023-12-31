@extends('admin.layouts.dash', ['title' => 'New Category', 'module' => "Categories"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="categoryAddForm" method="POST" action="{{route('category.save')}}">
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
                            <label for="page-name">Category</label>
                            <input type="text" class="form-control" id="service" name="category" value="{{ old('category') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="page-short">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="page-short">Tags</label>
                            <textarea class="form-control" id="tags" name="tags">{{ old('tags') }}</textarea>
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

@endsection
