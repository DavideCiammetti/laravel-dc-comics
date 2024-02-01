@extends('layout.layout')

@section('main')
   <div class="d-flex">
        <div class="box-shad-g card mt-4 ms-4" style="width: 20rem;">
            <div class="card-body">
                <p>title: {{$comic->title}}</p>
                <p class="card-text">Writers: {{$comic->writers}}</p>
                <p class="card-text">Artists: {{$comic->artists}}</p>
                <p>price: {{$comic->price}} $</p>
                <span><a href="{{ route('comics_management.index') }}">Torna alla lista dei fumetti</a></span>
            </div>
        </div>

        <div class="img-details ms-4 mt-4">
            <img src="{{ $comic->thumb }}" class="card-img-top" alt="img">
        </div>
   </div>
@endsection