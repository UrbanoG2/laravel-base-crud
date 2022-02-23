@extends('layouts.base')

@section('documentTitle')
    {{ $title }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                 <h1>{{ $comic->title }}</h1>
                 <h4>{{ $comic->number }}</h4>
                 <p> {{ $comic->description }} </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
              <div><h2>{{  $comic->author }}</h2></div>
              <div><h2>{{  $comic->price }} €</h2></div>
            </div>
        </div>
    </div>
   
@endsection