@extends('admin.master')
@section('title', 'Edit Category')
@section('content')

<div class="row">
    <div class="col-md">
      <div class="card">
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
          <div class="card-header">
            <h4>Edit Category</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Category Name</label>
              <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="form-group">
              <label>Parent Category</label>
              <select name="parent_id" id="parent_id" class="form-control">
                <option value="">None</option>

                    @foreach ($parent as $val)
                        <option value="{{ $val->id }}" {{ $val->id == $category->parent_id ? 'selected':'' }}>{{ $val->name }}</option>
                    @endforeach

            </select>
            </div>
           
          </div>
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

@endsection