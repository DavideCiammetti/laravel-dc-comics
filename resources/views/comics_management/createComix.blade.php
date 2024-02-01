<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>insert comics</title>
    @vite('resources/js/app.js')
</head>
<body>
    <h1>ciao</h1>
    <form class="g-3" action="{{route('comics_management.store')}}" method="POST">
        @csrf
        <div class="col-md-6">
          <label for="nputTitle" class="form-label">Title</label>
          <input type="text" class="form-control" name="title" id="inputTitle">
        </div>
        <div class="col-md-6">
          <label for="inputPrice" class="form-label">Price</label>
          <input type="number" class="form-control" name="price" id="inputPrice">
        </div>
        <div class="col-md-6">
            <label for="inputSeries" class="form-label">Series</label>
            <input type="text" class="form-control" name="series" id="inputSeries">
        </div>
        <div class="col-md-6">
            <label for="inputArt" class="form-label">Artists</label>
            <input type="text" class="form-control" name="artists" id="inputArt">
        </div>
        <div class="col-md-6">
            <label for="inputImg" class="form-label">Thumb</label>
            <input type="text" class="form-control" name="thumb" id="inputImg">
        </div>
        <div class="col-md-6">
            <label for="inputdesc" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="inputdesc">
          </div>
          <div class="col-md-6">
              <label for="inputtype" class="form-label">Type</label>
              <input type="text" class="form-control" name="type" id="inputtype">
          </div>
          <div class="col-md-6">
              <label for="inputArt" class="form-label">writers</label>
              <input type="text" class="form-control" name="writers" id="inputArt">
          </div>
          <div class="col-md-6">
              <label for="inputdate" class="form-label">Sale date</label>
              <input type="text" class="form-control" name="sale_date" id="inputdate">
          </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </form>
</body>
</html>