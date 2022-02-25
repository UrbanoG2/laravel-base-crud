@extends('layouts.base')

@section('documentTitle')
    {{ $title }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">

                @if (session('status'))
                    <div class="alert alert-success mt-5">
                        {{ session('status') }}
                    </div>
                @endif

                <h1>Title: {{ $comic->title }}</h1>
                <h4>Number: {{ $comic->number }}</h4>
                <p>Description: {{ $comic->description }} </p>
            </div>
        </div>

        <div class="row">
            <div class="col">
              <div><h2>Author:{{  $comic->author }}</h2></div>
              <div><h2>Price:{{  $comic->price }} €</h2></div>
            </div>
        </div>

    </div>
   
@endsection