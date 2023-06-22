@extends('layouts.app-user')

@section('content')
<div class="banner-home d-flex align-items-center justify-content-center" style="background-image: url({{ asset('image/home.jpg') }});">
    <div class="text-center">
        <h2 class="text-light">RENTAL MOBIL TERPERCAYA</h2>
        <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, amet expedita iure sit beatae facere laudantium, <br> sed exercitationem ut sapiente facilis. Ducimus tempora quod nisi. Explicabo delectus id non esse!</small>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row d-flex justify-content-between">
        <form class="form-inline" action="{{route('index.customer.search')}}" method="get">
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control w-100" name="search" id="search" placeholder="Search Model">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
        </form>
    </div>
    <div class="row mt-4 mb-3 ">
        @foreach($data as $datas)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('storage/owner-cars/' . $datas->pitcure1) }}" height="250" alt="...">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">{{$datas->merk}}</h5>
                        <h5 class="card-title">{{$datas->passenger}} Seat</h5>
                    </div>
                    <p class="card-text">{{$datas->detail}}</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-booked{{$datas->id}}">
                        Booked Now
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@include('components.modal.booked')
@endsection