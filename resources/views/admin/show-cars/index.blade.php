@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row d-flex justify-content-between">
    <form class="form-inline" action="" method="post">
      <div class="form-group mx-sm-3 mb-2">
        <input type="text" class="form-control w-100" id="inputPassword2" placeholder="Search Model">
      </div>
      <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
    <div>
      <a href="{{ route('index.admin.add') }}" class="btn btn-success">Add Data</a>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-4">
      <div class="card" style="width: 30rem;">
        <img src="https://momobil.id/news/wp-content/uploads/2022/02/koenigsegg-gemera-1024x576.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <h5 class="card-title">NSX</h5>
            <h5 class="card-title">2 seats</h5>
          </div>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Update</a>
          <a href="#" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection