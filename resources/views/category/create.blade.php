@extends('admin.master')
@section('title', 'Create Category')
@section('content')

<div class="row">
    <div class="col-md">
      <div class="card">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
          <div class="card-header">
            <h4>Create Category</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Category Name</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required="">

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
                        <option value="{{  $val->id }}">{{ $val->name }}</option>
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