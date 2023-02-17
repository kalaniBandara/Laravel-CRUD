<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookCRUDController extends Controller
{
    //
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $data['books'] = book::orderBy('id','desc')->paginate(5);
    return view('books.index', $data);
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('books.create');
    }


    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
    $request->validate([
    'title' => 'required',
    'author' => 'required',
    'language' => 'required'
    ]);
    $book = new book;
    $book->title = $request->title;
    $book->author = $request->author;
    $book->language = $request->language;
    $book->save();
    return redirect()->route('books.index')
    ->with('success','Book has been created successfully.');
    }


    /**
    * Display the specified resource.
    *
    * @param  \App\book  $book
    * @return \Illuminate\Http\Response
    */
    public function show(Book $book)
    {
    return view('books.show',compact('book'));
    } 


    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Book  $book
    * @return \Illuminate\Http\Response
    */
    public function edit(Book $book)
    {
    return view('books.edit',compact('book'));
    }


    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\book  $book
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    $request->validate([
    'title' => 'required',
    'author' => 'required',
    'language' => 'required',
    ]);
    $book = book::find($id);
    $book->title = $request->title;
    $book->author = $request->author;
    $book->language = $request->language;
    $book->save();
    return redirect()->route('books.index')
    ->with('success','Book Has Been updated successfully');
    }


    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Book  $book
    * @return \Illuminate\Http\Response
    */
    public function destroy(Book $book)
    {
    $book->delete();
    return redirect()->route('books.index')
    ->with('success','Book has been deleted successfully');
    }

}
