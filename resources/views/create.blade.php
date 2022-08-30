@extends('layouts.main')

@section('container')
  <form action="{{ route('book.store') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" autofocus value="{{ old('name') }}">
      @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="author" class="form-label">Author</label>
      <input type="author" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}">
      @error('author')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label" for="category">Category</label>
      <select class="form-select @error('category') is-invalid @enderror" id="category" name="category_id" aria-label="Default select example">
        <option selected>Select Category</option>
        @foreach ($categories as $category)
          @if (old('category_id') == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
          @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection