@extends('admin.master')
@section('title', 'Data Users')
@section('content')

<div class="row">
    <div class="col-md">
      <div class="card">
        <div class="card-header">
          <h4>Form Users</h4>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp

              @foreach($data as $user)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>
                  <a href="#" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                  <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
  
@endsection