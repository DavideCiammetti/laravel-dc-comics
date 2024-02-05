@extends('layout.layout')

@section('main')
  <form class="d-flex flex-column align-items-center g-3" action="{{route('comics.update', $comic->id)}}" method="POST">
      @csrf
      @method('PUT')
      <div class="col-md-4">
        <label for="nputTitle" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="{{old('description', $comic->title)}}">
      </div>
      <div class="col-md-4">
        <label for="inputPrice" class="form-label">Price</label>
        <input type="number" class="form-control" name="price" id="inputPrice" value="{{$comic->price}}">
      </div>
      <div class="col-md-4">
          <label for="inputSeries" class="form-label">Series</label>
          <input type="text" class="form-control" name="series" id="inputSeries" value="{{$comic->series}}">
      </div>
      <div class="col-md-4">
          <label for="inputArt" class="form-label">Artists</label>
          <input type="text" class="form-control" name="artists" id="inputArt" value="{{$comic->artists}}">
      </div>
      <div class="col-md-4">
          <label for="inputImg" class="form-label">Thumb</label>
          <input type="text" class="form-control" name="thumb" id="inputImg" value="{{$comic->thumb}}">
      </div>
      <div class="col-md-4">
          <label for="inputdesc" class="form-label">Description</label>
          <input type="text" class="form-control" name="description" id="inputdesc" value="{{old('description', $comic->description)}}">
        </div>
        <div class="col-md-4">
            <label for="inputtype" class="form-label">Type</label>
            <input type="text" class="form-control" name="type" id="inputtype" value="{{$comic->type}}">
        </div>
        <div class="col-md-4">
            <label for="inputArt" class="form-label">writers</label>
            <input type="text" class="form-control" name="writers" id="inputArt" value="{{$comic->writers}}">
        </div>
        <div class="col-md-4">
            <label for="inputdate" class="form-label">Sale date</label>
            <input type="text" class="form-control" name="sale_date" id="inputdate" value="{{$comic->sale_date}}">
        </div>
      <div class="col-4 mt-2">
        <button type="submit" class="btn btn-primary">Sign in</button>
      </div>
    </form>

@endsection