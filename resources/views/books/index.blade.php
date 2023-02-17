<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laravel CRUD Book</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Laravel CRUD  Book</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('books.create') }}"> Create Book</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>Book Title</th>
<th>Book Author</th>
<th>Book Language</th>
<th width="280px">Action</th>
</tr>
@foreach ($books as $book)
<tr>
<td>{{ $book->id }}</td>
<td>{{ $book->title }}</td>
<td>{{ $book->author }}</td>
<td>{{ $book->language }}</td>
<td>
<form action="{{ route('books.destroy',$book->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $books->links() !!}
</body>
</html>