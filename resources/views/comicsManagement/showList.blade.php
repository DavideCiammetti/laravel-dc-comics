@extends('layout.layout')

@section('main')
    <main id="main">
        {{-- inserimento cards che mostrano descrizione, foto, titolo, data, prezzo --}}
        <div class=" d-flex flex-wrap justify-content-center gap-3 mt-5 mb-5"> 
            @foreach ($comics as $comic)
            <div class="box-shad-g card" style="width: 12rem;">
                <img src="{{ $comic->thumb }}" class="card-img-top" alt="img">
                <div class="card-body">
                    <h5 class="card-title">{{$comic->title}}</h5>
                    <div>
                        <p>description:</p>
                        <p class="font-s overflow-auto card-text">{{$comic->description}}</p>
                    </div>
                    <p>price: {{$comic->price}} $</p>
                    <p>date: {{$comic->sale_date}}</p>
                   <div class="d-flex flex-column">
                        <span class="border p-1 mb-2"><a href="{{route('comics.show', $comic->id)}}">vedi dettagli</a></span>
                        <span class="border p-1"><a href="{{route('comics.edit', $comic->id)}}">modifica</a></span>
                   </div>
                </div>
            </div>
            @endforeach
      </div>
    </main>
@endsection