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
            <h5 class="card-title">{{$datas->passenger}} Seat</h5>
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