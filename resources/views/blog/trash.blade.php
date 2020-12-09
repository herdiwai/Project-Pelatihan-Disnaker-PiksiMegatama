@extends('admin.master')
@section('title', 'Blog')
@section('content')

<div class="row">
    <div class="col-md">
      <div class="card">
        <div class="card-body pb-2 float-right">
          <a href="{{ url('blog/restore') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-trash-restore-alt"></i> Restore All</a>
          <a href="{{ url('blog') }}" class="btn btn-icon icon-left btn-secondary float-right"><i class="fas fa-undo"></i> Back</a>
        </div>
        <div class="card-body">
            {{-- Alert --}}
            @if (session('status'))
              <div class="alert alert-light alert-has-icon">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    {{ session('status') }}
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
              @if($blog->count() > 0)
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
                      {{-- <a href="{{ route('blog.edit', $item->id) }}" class="btn btn-icon btn-info"><i class="far fa-edit"></i></a> --}}
                      {{-- <a href="{{ url('blog/restore/'. $item->id) }}" class="btn btn-icon btn-info"><i class="far fa-edit">Restore</i></a> --}}
                      {{-- <a href="{{ url('blog/delete/'. $item->id) }}" class="btn btn-icon btn-danger">Delete Permanent</a> --}}
                      <form action="{{ url('blog/delete/'. $item->id) }}" id="delete{{ $item->id }}" method="POST">
                        <a href="{{ url('blog/restore/'. $item->id) }}" class="btn btn-icon btn-info"><i class="fas fa-trash-restore"></i> Restore</a>
                        <a href="#" data-id="{{ $item->id }}" class="btn btn-icon btn-danger swal-confirm">
                          @csrf
                          @method('DELETE')
                          {{-- <li class="ion-trash-b" data-pack="default" data-tags="delete, remove, dump">delete</li> --}}
                          <i class="fas fa-trash"> Delete</i>
                        </a>
                        
                        </form>
                      </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="6" class="text-center text-danger"><h4>Tidak Ada Data</h4></td>
                </tr>
              @endif
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