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
      <a href="{{ route('index.admin.create') }}" class="btn btn-success">Add Data</a>
    </div>
  </div>
  <div class="row mt-4">
    @foreach($data as $datas)
    <div class="col-md-4">
      <div class="card" style="width: 25rem;">
        <img src="{{ asset('storage/owner-cars/' . $datas->pitcure1) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <h5 class="card-title">{{$datas->merk}}</h5>
            <h5 class="card-title">{{$datas->passenger}}</h5>
          </div>
          <p class="card-text">{{$datas->detail}}</p>
          <a href="#" class="btn btn-primary">Update</a>
          <a href="#" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection