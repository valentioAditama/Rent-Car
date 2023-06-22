@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <h4>Add Tripped History</h4>

  <div class="mt-3">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="id">id</label>
            <input type="text" class="form-control form-control-sm" id="id" aria-describedby="id" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="cusomter_contact">Customer Contact</label>
            <input type="text" class="form-control form-control-sm" id="cusomter_contact" aria-describedby="cusomter_contact" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" class="form-control form-control-sm" id="customer_name" name="customer_name" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="customer_nic">Customer NIC</label>
            <input type="text" class="form-control form-control-sm" id="customer_nic">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="time_in">Time In</label>
            <input type="text" class="form-control form-control-sm" name="time_in" id="time_in" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="time_out">Time Out</label>
            <input type="text" class="form-control form-control-sm" name="time_out" id="time_out" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="date_in">Date In</label>
            <input type="date" class="form-control form-control-sm" name="date_in" id="date_in" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="date_out">Date Out</label>
            <input type="date" class="form-control form-control-sm" name="date_out" id="date_out" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="car_model">Car Model</label>
            <select name="carModel" id="carModel" class="form-control form-control-sm" required>
              <option selected>Pilih Car Model</option>
              <option value="Sedan">Sedan</option>
              <option value="Hatchback">Hatchback</option>
              <option value="SUV">SUV</option>
              <option value="MPV">MPV</option>
              <option value="Coupe">Coupe</option>
              <option value="Convertible">Convertible</option>
              <option value="Crossover">Crossover</option>
              <option value="Sports Car">Sports Car</option>
              <option value="Electric Car">Electric Car</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="agent">Agent</label>
            <input type="text" class="form-control form-control-sm" name="agent" id="agent" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="total_amount">Total Amount</label>
            <input type="text" class="form-control form-control-sm" name="total_amount" id="total_amount" required>
          </div>
        </div>
      </div>
      <button class="btn btn-sm btn-success">Save</button>
      <a href="{{route('index.admin.show-cars')}}" class="btn btn-sm btn-secondary">kembali</a>
    </form>
  </div>
</div>
@include('components.notifications.index')

@endsection