@extends('layout.layout')

@section('main')
    <main id="main">
        {{-- inserimento cards che mostrano descrizione, foto, titolo, data, prezzo --}}
        <div class=" d-flex flex-wrap justify-content-center gap-3 mt-5 mb-5"> 
            @foreach ($comics as $key=> $comic)

            <div class="box-shad-g card position-relative" style="width: 12rem;" >
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
                        <span><a href="{{route('comics.show', $comic->id)}}">vedi dettagli</a></span>
                        <span class="mb-1"><a href="{{route('comics.edit', $comic->id)}}">modifica</a></span>
                   </div>
                   <div>
                    <input class="js-delete-{{$key}}" type="submit" value="delete">
                   </div>
                   {{-- form container --}}
                   <div class="delete-form alert alert-danger position-absolute form-container-{{$key}} d-none" role="alert">
                       <p class="f-size-alert"> se vuoi eliminarlo premi Delete altrimenti annulla</p>
                        <div class="d-flex">
                            <form action="{{route('comics.destroy', $comic->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
    
                                <input type="submit" value="Delete">
                            </form>
                            <input class="ms-2 button-annulla-{{$key}}" type="submit" value="Annulla">
                        </div>
                  </div>
                </div>
            </div>
            @endforeach
      </div>
    </main>
@endsection