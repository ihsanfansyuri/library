@extends('layouts.main')

@section('container')
  <div class="col-md-8">
    <form action="{{ $type == "create" ? route('book.store') : route('book.update', $book->id) }}" method="post">
      @csrf
      @if ($type != "create")
        @method('PUT')
      @endif

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" autofocus value="{{ old('name') ?? $book->name ?? '' }}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="author" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') ?? $book->author ?? '' }}">
        @error('author')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label" for="category">Category</label>
        <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id" aria-label="Default select example">
          <option selected hidden value="">Select Category</option>
          @foreach ($categories as $category)
            @if (old('category_id') ?? $book->category_id ?? '' == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
        @error('category_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="/book" class="btn btn-warning">Back</a>
    </form>
  </div>
@endsection