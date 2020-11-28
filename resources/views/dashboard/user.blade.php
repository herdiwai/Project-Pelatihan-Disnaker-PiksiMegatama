@extends('admin.master')
@section('title', 'Data Users')
@section('content')

<div class="row">
    <div class="col-md">
      <div class="card">
        <div class="card-body pb-2">
          <a href="{{ route('create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Create User</a>
        </div>
        <div class="card-body">
          <table id="table_user" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach($data as $no => $user)
                <tr>
                  <th scope="row">{{ $data->firstItem()+$no }}</th>
                  <td>{{ $user['name'] }}</td>
                  <td>{{ $user['email'] }}</td>
                  <td>
                    @if ($user['image'])
                      <img src="{{ asset('storage/' .$user['image']) }}" width="70px" alt=""></td>
                    @else
                      Belum ada Image    
                    @endif
                  <td>
                    <a href="#" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                    <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          {{ $data->links() }}

        </div>
      </div>
  
@endsection


@push('after-script')

<script>

  $(document).ready(function() {
      $('#table_user').DataTable();
  });

</script>

@endpush