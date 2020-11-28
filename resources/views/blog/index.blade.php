@extends('admin.master')
@section('title', 'Blog')
@section('content')

<div class="row">
    <div class="col-md">
      <div class="card">
        <div class="card-body pb-2">
          <a href="{{ route('blog.create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Create-Blog</a>
        </div>
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

          <table id="table_blog" class="table table-hover" style="border: 1px solid lightgrey">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Create At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach($blog as $item)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                      @if ($item['image'])
                        <img src="{{ asset('storage/' .$item['image']) }}" width="70px" alt=""></td>
                      @else
                        No Image    
                      @endif
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item['created_at'] }}</td>
                    <td>
                    <a href="{{ route('blog.edit', $item->id) }}" class="btn btn-icon btn-info"><i class="far fa-edit"></i></a>
                    <a href="#" data-id="{{ $item->id }}" class="btn btn-icon btn-danger swal-confirm">
                      <form action="{{ route('blog.destroy',$item->id) }}" id="delete{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                      </form>
                      <i class="fas fa-times"></i>
                    </a>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{-- {{ $blog->links() }} --}}
        </div>
      </div>

@endsection

@push('page-script')

<script src="{{ asset('assets/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>

@endpush

@push('after-script')

<script>

$(document).ready(function() {
  $('#table_blog').DataTable();

  $(".swal-confirm").click(function(e) {
    id = e.target.dataset.id;
    swal({
      title: 'Yakin yeuh dek dihapus?',
      text: 'Data moal bisa balik deui!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if(willDelete) {
        // swal('Poof! Your imaginary file has beed deleted!', {
        //   icon: 'success',
        // });
        $(`#delete${id}`).submit();
      } else {
        // swal('Your imaginary file is safe!');
      }
    });
  });
});

  
</script>

@endpush