@extends('layouts.main')

@section('container')

  <h2>Book List</h2>

  @if (session()->has('success'))    
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @can('admin')
    <a href="{{ route('book.create') }}" type="button" class="btn btn-primary mt-3 mb-3">Add Book</a>
  @endcan

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Author</th>
        <th scope="col">Category</th>
        @can('admin')
          <th scope="col">Action</th>
        @endcan
      </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)    
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $book->name }}</td>
          <td>{{ $book->author }}</td>
          <td>{{ $book->category->name }}</td>

          @can('admin')    
            <td>
              <a href="{{ route('book.edit', ['id' => $book->id]) }}" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
              <form action="{{ route('book.delete', ['id' => $book->id]) }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="confirm('Apakah anda yakin?')"><i class="bi bi-x-circle"></i></button>
              </form>
            </td>
          @endcan
          
        </tr>
        @endforeach
      </tbody>
  </table>
@endsection