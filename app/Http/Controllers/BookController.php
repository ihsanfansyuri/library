<?php

namespace App\Http\Controllers;

use App\Http\Requests\Validasi;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
  public function index()
  {
    $books = Book::with('category')->get();
    // $books = Book::all();
    return view('book', [
      'title' => 'Book',
      'books' => $books
    ]);
  }

  public function create()
  {
    return view('create', [
      'title' => 'Add Book',
      'categories' => Category::all(),
      'type' => "create"
    ]);
  }

  public function store(Validasi $request)
  {
    // dd($request->all());
    Book::create($request->all());

    return redirect(route('book.index'))->with('success', 'Book has been added!');
  }

  public function edit($id)
  {
    $book = Book::findOrFail($id);
    return view('create', [
      'book' => $book,
      'title' => 'Update Book',
      'categories' => Category::all(),
      'type' => 'edit'
    ]);
  }

  public function update(Validasi $request, $id)
  {
    Book::where('id', $id)->update($request->except(['_method', '_token']));

    return redirect(route('book.index'))->with('success', 'Book has been updated!');
  }

  public function delete($id)
  {
    // Book::where('id', $id)->delete();
    Book::destroy($id);

    return redirect(route('book.index'))->with('success', 'Book has been deleted!');
  }
}
