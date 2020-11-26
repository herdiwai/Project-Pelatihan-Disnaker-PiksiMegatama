@extends('admin.master')
@section('title', 'Create Blog')
@section('content')

<div class="row">
    <div class="col-md">
      <div class="card">
        <form action="{{ route('blog.store') }}" method="POST">
            @csrf
          <div class="card-header">
            <h4>Create Blog</h4>
          </div>
          <div class="card-body">

            <div class="form-group">
              <label>Title Name</label>
              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required="">

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            </div>

            <div class="form-group">
                <label for="description">Textarea</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description')}}" required autocomplete="description" autofocus></textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="form group">
                <label for="">Upload Image</label>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" value="{{ old('image') }}" id="image">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
              </div>
            
            
          </div>
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

@endsection