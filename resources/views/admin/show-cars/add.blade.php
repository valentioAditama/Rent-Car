@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <h4>Add Cars</h4>

  <div class="mt-3">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="nopol">Nopol</label>
            <input type="text" class="form-control form-control-sm" id="nopol" aria-describedby="nopol" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="merk">merk</label>
            <input type="text" class="form-control form-control-sm" id="merk" aria-describedby="merk" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="Car-model">Car Model</label>
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
            <label for="Kilometer-awal">Kilometer Awal</label>
            <input type="text" class="form-control form-control-sm" id="Kilometer-awal" aria-describedby="Kilometer-awal" placeholder="Kilometer awal">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="pitcure1">Insert Pitcure 1</label>
            <input type="file" class="form-control form-control-sm" name="pitcure1" id="pitcure1" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="pitcure2">Insert Pitcure 2</label>
            <input type="file" class="form-control form-control-sm" name="pitcure2" id="pitcure2" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="pitcure3">Insert Pitcure 3</label>
            <input type="file" class="form-control form-control-sm" name="pitcure3" id="pitcure3" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="warna">Warna</label>
            <input type="color" class="form-control form-control-sm" name="warna" id="warna" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="passenger">Passenger</label>
            <input type="text" class="form-control form-control-sm" name="passenger" id="passenger" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="detail">Detail</label>
            <input type="text" class="form-control form-control-sm" name="detail" id="detail" required>
          </div>
        </div>
      </div>
      <button class="btn btn-sm btn-success">Save</button>
      <a href="{{route('index.admin.show-cars')}}" class="btn btn-sm btn-secondary">kembali</a>
    </form>
  </div>
</div>
@endsection