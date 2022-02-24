@extends('layouts.base')

@section('documentTitle')
    {{ $comic->title }}
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
        <form action="{{ route('comics.update',$comic) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{$comic->title}}">
        </div>
        <div class="mb-3">
          <label for="number" class="form-label">Number</label>
          <input type="text" class="form-control" id="number" name="number" value="{{$comic->number}}">
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="number" class="form-control" id="price" name="price" value="{{$comic->price}}">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input type="text" class="form-control" id="description" name="description" value="{{$comic->description}}">
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <input type="text" class="form-control" id="author" name="author" value="{{$comic->author}}">
        </div>

        <input class="btn btn-warning" type="submit" value="Invia">
      </form>
    </div>
  </div>
</div>
@endsection