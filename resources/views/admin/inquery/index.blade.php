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
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">No.Telp</th>
          <th scope="col">Pesan</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>@mdo</td>
          <td>@mdo</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection