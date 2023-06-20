@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <h4>Tripped History</h4>
    <a href="{{ route('admin.tripped-history.add') }}" class="btn btn-success">Add Tripped History</a>
  </div>

  <div class="mt-3">
    <table class="table table-sm table-light table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">ID</th>
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
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection