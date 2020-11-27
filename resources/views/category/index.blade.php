@extends('admin.master')
@section('title', 'Category')
@section('content')


<div class="row">
    <div class="col-md">
      <div class="card">
        <div class="card-body pb-2">
          <a href="{{ url('/category/create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Create-Category</a>
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

          <table id="table_category" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Category</th>
                <th scope="col">Slug</th>
                <th scope="col">Create At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach($category as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item->parent ? $item->parent->name:'-' }}</td>
                    <td>{{ $item['created_at'] }}</td>
                    <td>
                    <a href="{{ route('category.edit', $item->id) }}" class="btn btn-icon btn-info"><i class="far fa-edit"></i></a>
                    <a href="#" data-id="{{ $item->id }}" class="btn btn-icon btn-danger swal-confirm">
                      <form action="{{ route('category.delete',$item->id) }}" id="delete{{ $item->id }}" method="POST">
                        @csrf
                        @method('delete')
                      </form>
                      <i class="fas fa-times"></i>
                    </a>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{-- {{ $category->links() }} --}}
        </div>
      </div>

@endsection

@push('page-script')

<script src="{{ asset('assets/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>

@endpush

@push('after-script')

<script>
// DataTable
$(document).ready(function() {
    $('#table_category').DataTable();
});


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
</script>

@endpush