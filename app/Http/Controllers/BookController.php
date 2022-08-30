<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

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
    ]);
  }

  public function store(Request $request)
  {
    $validateData = $request->validate([
      'name' => 'required|unique:books',
      'author' => 'required|unique:books',
      'category_id' => 'required'
    ]);

    Book::create($validateData);

    return redirect('/book')->with('success', 'Book has been added!');
  }

  public function edit($id)
  {
    $book = Book::findOrFail($id);
    return view('edit', [
      'book' => $book,
      'title' => 'Update Book',
      'categories' => Category::all(),
    ]);
  }

  public function update(Request $request, $id)
  {
    $validateData = $request->validate([
      'name' => 'required|unique:books',
      'author' => 'required|unique:books',
      'category_id' => 'required'
    ]);

    Book::where('id', $id)->update($validateData);

    return redirect(route('book.index'))->with('success', 'Book has been updated!');
  }

  public function delete($id)
  {
    Book::where('id', $id)->delete();

    return redirect(route('book.index'))->with('success', 'Book has been deleted!');
  }
}
