@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <h4>Inquery</h4>
  </div>

  <div class="mt-3">
    <table class="table table-sm table-light table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nopol</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Email</th>
          <th scope="col">Contact</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php $no=1; @endphp
        @foreach($data as $datas)
        <tr>
          <th scope="row">{{$no++}}</th>
          <td>{{$datas->nopol}}</td>
          <td>{{$datas->customer_name}}</td>
          <td>{{$datas->contact}}</td>
          <td>{{$datas->email}}</td>
          <td>{{$datas->status}}</td>
          <td>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-update-inquery{{$datas->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Status">
              <i class="fa-solid fa-pen-nib"></i>
            </button>
            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-inquery{{$datas->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Data">
              <i class="fa-solid fa-trash"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@include('components.modal.inquery')
@include('components.modal.delete')

@endsection