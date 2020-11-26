@extends('admin.master')
@section('title', 'Add User')
@section('content')

<div class="row">
    <div class="col-md">
      <div class="card">
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            {{-- Alert --}}
          @if (session('success'))
          <div class="alert alert-light alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
                {{ session('success') }}
            </div>
          </div>
        @endif
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required="">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            </div>

            <div class="form-group">
              <label>Email Adress</label>
              <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required="">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" id="exampleInputPassword1">
                  @error('password')
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