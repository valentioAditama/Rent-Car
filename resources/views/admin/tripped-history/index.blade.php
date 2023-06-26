@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <h4>Tripped History</h4>
    <form class="form-inline" action="{{route('index.admin.tripped-history-search')}}" method="get">
      <div class="form-group mx-sm-3 mb-2">
        <input type="text" class="form-control w-100" name="search" id="search" placeholder="Search Tripped History">
      </div>
      <button type="submit" class="btn btn-primary mb-2">Search</button>
      <a href="{{ route('index.admin.tripped-history') }}" class="btn btn-secondary  mb-2 ml-2">Reset Data</a>
    </form>
  </div>

  <div class="mt-3">
    <table class="table table-sm table-light table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Customer Contact</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Customer NIC</th>
          <th scope="col">Time In</th>
          <th scope="col">Time Out</th>
          <th scope="col">Date In</th>
          <th scope="col">Date Out</th>
          <th scope="col">Car Model</th>
          <th scope="col">Agent</th>
          <th scope="col">Total Amount</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $no=1; @endphp
        @foreach($data as $datas)
        <tr>
          <th scope="row">{{$no++}}</th>
          <td>{{$datas->contact}}</td>
          <td>{{$datas->customer_name}}</td>
          <td>{{$datas->customer_nic}}</td>
          <td>{{$datas->time_in}}</td>
          <td>{{$datas->time_out}}</td>
          <td>{{$datas->date_in}}</td>
          <td>{{$datas->date_out}}</td>
          <td>{{$datas->car_model}}</td>
          <td>{{$datas->agent}}</td>
          <td>{{$datas->total_amount}}</td>
          <td>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-update-trippedHistory{{$datas->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Status">
              <i class="fa-solid fa-pen-nib"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@include('components.modal.tripped-history')
@include('components.notifications.index')

@endsection