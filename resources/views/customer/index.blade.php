@extends('layouts.app-user')

@section('content')
<div class="banner-home d-flex align-items-center justify-content-center" style="background-image: url('https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');">
    <div class="text-center">
        <h2 class="text-light">RENTAL MOBIL TERPERCAYA {{Auth::user()}}</h2>
        <h3 class="teks-desc">Jasa rental mobil terpercaya di Indonesia, nomor #1 berdasarkan survey automotif Indonesia.</h3>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row d-flex justify-content-start">
        <form class="form-inline" action="{{route('index.customer.search')}}" method="get">
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control w-100" name="search" id="search" placeholder="Search Model">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
        </form>
        <a href="{{ route('index.customer') }}">
            <button class="btn btn-secondary mb-2 ml-2">Reset Data</button>
        </a>
    </div>
    <div class="row mt-4 mb-3 ">
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-booked{{$datas->id}}">
                        Booked Now
                    </button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-detail{{$datas->id}}">
                        More Detail
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@include('components.modal.booked')
@include('components.modal.detail-cars')
@include('components.notifications.index')

@endsection