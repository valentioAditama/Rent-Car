@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row d-flex justify-content-between">
    <form class="form-inline" action="{{route('index.admin.search')}}" method="get">
      @csrf
      <div class="form-group mx-sm-3 mb-2">
        <input type="text" class="form-control w-100" name="search" id="search" placeholder="Search Model">
      </div>
      <button type="submit" class="btn btn-primary mb-2">Search</button>
      <a href="{{ route('index.admin.show-cars') }}" class="btn btn-secondary mb-2 ml-2">Reset Data</a>
    </form>
    <div>
      <a href="{{ route('index.admin.create') }}" class="btn btn-success">Add Data</a>
    </div>
  </div>
  <div class="row mt-4">
    @foreach($data as $datas)
    <div class="col-md-4">
      <div class="card">
        <img src="{{ asset('storage/owner-cars/' . $datas->pitcure1) }}" class="image-cars" alt="...">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <h5 class="card-title">{{$datas->merk}}</h5>
            <h5 class="card-title">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                        {{$datas->passenger}} Seat</h5>
            </h5>
          </div>
          <p class="card-text">{{$datas->detail}}</p>
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-detail{{$datas->id}}">
            <i class="fa-solid fa-eye"></i>
          </button>
          <a href="{{route('index.admin.edit', $datas->id)}}" class="btn btn-primary">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete{{$datas->id}}">
            <i class="fa-solid fa-trash"></i>
          </button>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@include('components.modal.delete');
@include('components.modal.detail-cars');
@include('components.notifications.index')

@endsection