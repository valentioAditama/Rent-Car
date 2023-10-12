@if(Auth::guest())
@foreach($data as $datas)
<!-- Modal -->
<div class="modal fade" id="modal-booked{{$datas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Booked</h5>
      </div>
      <div class="modal-body">
          <div class="row justify-content-center">
            <h4>Please Login First</h4>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@else
@foreach($data as $datas)
<!-- Modal -->
<div class="modal fade" id="modal-booked{{$datas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Booked</h5>
      </div>
      <div class="modal-body">
        <form action="{{route('index.booked.store')}}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="mb-5">
                <div class="mt-3">
                  <div class="mb-3">
                    <input type="hidden" name="car_id" value="{{$datas->id}}">
                    <label for="nopol" class="form-label">Nopol</label>
                    <input type="text" class="form-control form-control-sm" id="nopol" name="nopol" value="{{$datas->nopol}}" required readonly>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="date_in" class="form-label">Date In</label>
                        <input type="date" class="form-control form-control-sm" name="date_in" required>
                      </div>
                      <div class="col-md-6">
                        <label for="date_out" class="form-label">Date Out</label>
                        <input type="date" class="form-control form-control-sm" name="date_out" required>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="time_in" class="form-label">Time In</label>
                        <input type="time" class="form-control form-control-sm" name="time_in" required>
                      </div>
                      <div class="col-md-6">
                        <label for="time_out" class="form-label">Time Out</label>
                        <input type="time" class="form-control form-control-sm" name="time_out" required>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="car_model" class="form-label">Car Model</label>
                    <input type="text" class="form-control form-control-sm" id="car_model" name="car_model" value="{{$datas->carModel}}" readonly>
                  </div>
                </div>
              </div>
              <div class="mt-3">
                <div class="mb-3">
                  <label for="customer_nic" class="form-label">Customer Nic</label>
                  <input type="number" class="form-control form-control-sm" id="customer_nic" name="customer_nic" required>
                </div>
                <div class="mb-3">
                  <label for="customer_name" class="form-label">Customer Name</label>
                  <input type="text" class="form-control form-control-sm" id="customer_name" name="customer_name" required>
                </div>
                <div class="mb-3">
                  <label for="contact" class="form-label">Contact Number</label>
                  <input type="number" class="form-control form-control-sm" id="contact" name="contact" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control form-control-sm" id="email" name="email">
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Booked now</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endif