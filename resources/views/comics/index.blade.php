@extends('layouts.base')

@section('documentTitle')
    {{ $title }}
@endsection

@section('content')
    <div class="container">

        <div class="row mt-4 text-center">
            <h1 class="h1">Welcome to Some Comics</h1>
        </div>

        <div class="row">
            <div class="col mt-3 mb-5 text-center">
                <a href="{{ route('comics.create') }}" class="btn btn-warning">Add new comic</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                {{-- messaggio richiamato nel controller qualora avessimo un errore --}}
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col">
                 <table class="table table-warning">
                    <thead>
                        <tr class="table-warning">
                            <th>Title</th>
                            <th>Number</th>
                            <th>Comic Price</th>
                            <th>Description</th>
                            <th>Author</th>
                            <th>See more</th>
                            <th>Edit comic</th>
                            <th>Delete comic</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($comics as $comic)
                        <tr>
                            <td>{{ $comic->title }}</td>
                            <td>{{ $comic->number }}</td>
                            <td>{{ $comic->price }} €</td>
                            <td>{{ $comic->description }} </td>
                            <td>{{ $comic->author }} </td>
                            <td><a class="btn btn-warning" href="{{ route('comics.show', $comic) }}">View</a></td>
                            <td><a class="btn btn-primary" href="{{ route('comics.edit', $comic) }}">Edit</a></td>
                            <td>
                                <form action="{{ route('comics.destroy', $comic->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col ">
                {{ $comics->links() }}
            </div>
        </div>
    </div>
   
@endsection