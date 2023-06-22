@foreach($data as $datas)
<!-- Modal -->
<div class="modal fade" id="modal-detail{{$datas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Car</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="nopol">Nopol</label>
              <input type="text" class="form-control form-control-sm" value="{{$datas->nopol}}" readonly>
            </div>
            <div class="mb-3">
              <label for="merk">Merk</label>
              <input type="text" class="form-control form-control-sm" value="{{$datas->merk}}" readonly>
            </div>
            <div class="mb-3">
              <label for="carModel">Car Model</label>
              <input type="text" class="form-control form-control-sm" value="{{$datas->carModel}}" readonly>
            </div>
            <div class="mb-3">
              <label for="kilometerAwal">Kilometer Awal</label>
              <input type="text" class="form-control form-control-sm" value="{{$datas->kilometerAwal}}" readonly>
            </div>
            <div class="mb-3">
              <label for="warna">Warna</label>
              <input type="text" class="form-control form-control-sm" value="{{$datas->warna}}" readonly>
            </div>
            <div class="mb-3">
              <label for="passenger">Passenger</label>
              <input type="text" class="form-control form-control-sm" value="{{$datas->passenger}}" readonly>
            </div>
            <div class="mb-3">
              <label for="detail">Detail</label>
              <input type="text" class="form-control form-control-sm" value="{{$datas->detail}}" readonly>
            </div>
            <div class="mb-3">
              <label for="status">Status</label>
              <input type="text" class="form-control form-control-sm" value="{{$datas->status}}" readonly>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="row">
              <div class="col-md-12">
                <img src="{{ asset('storage/owner-cars/' . $datas->pitcure1) }}" class="img-fluid w-100" alt="...">
              </div>
              <div class="col-md-12">
                <img src="{{ asset('storage/owner-cars/' . $datas->pitcure2) }}" class="img-fluid w-100" alt="...">
              </div>
              <div class="col-md-12">
                <img src="{{ asset('storage/owner-cars/' . $datas->pitcure3) }}" class="img-fluid w-100" alt="...">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach