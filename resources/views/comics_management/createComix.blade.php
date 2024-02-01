@extends('layout.layout')

@section('main')
  <form class="d-flex flex-column align-items-center g-3" action="{{route('comics_management.store')}}" method="POST">
      @csrf
      <div class="col-md-4">
        <label for="nputTitle" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="inputTitle">
      </div>
      <div class="col-md-4">
        <label for="inputPrice" class="form-label">Price</label>
        <input type="number" class="form-control" name="price" id="inputPrice">
      </div>
      <div class="col-md-4">
          <label for="inputSeries" class="form-label">Series</label>
          <input type="text" class="form-control" name="series" id="inputSeries">
      </div>
      <div class="col-md-4">
          <label for="inputArt" class="form-label">Artists</label>
          <input type="text" class="form-control" name="artists" id="inputArt">
      </div>
      <div class="col-md-4">
          <label for="inputImg" class="form-label">Thumb</label>
          <input type="text" class="form-control" name="thumb" id="inputImg">
      </div>
      <div class="col-md-4">
          <label for="inputdesc" class="form-label">Description</label>
          <input type="text" class="form-control" name="description" id="inputdesc">
        </div>
        <div class="col-md-4">
            <label for="inputtype" class="form-label">Type</label>
            <input type="text" class="form-control" name="type" id="inputtype">
        </div>
        <div class="col-md-4">
            <label for="inputArt" class="form-label">writers</label>
            <input type="text" class="form-control" name="writers" id="inputArt">
        </div>
        <div class="col-md-4">
            <label for="inputdate" class="form-label">Sale date</label>
            <input type="text" class="form-control" name="sale_date" id="inputdate">
        </div>
      <div class="col-4 mt-2">
        <button type="submit" class="btn btn-primary">Sign in</button>
      </div>
    </form>

@endsection