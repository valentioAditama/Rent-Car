@foreach($data as $datas)
<!-- Modal -->
<div class="modal fade" id="modal-update-inquery{{$datas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Customer Booked</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.inquery.update', $datas->id)}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nopol" class="form-label">Nopol</label>
                        <input type="text" class="form-control form-control-sm" id="nopol" name="nopol" value="{{$datas->nopol}}" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control form-control-sm" id="customer_name" name="customer_name" value="{{$datas->customer_name}}" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">contact</label>
                        <input type="text" class="form-control form-control-sm" id="contact" name="contact" value="{{$datas->contact}}" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="text" class="form-control form-control-sm" id="email" name="email" value="{{$datas->email}}" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">status</label>
                        <select class="form-control form-control-sm" name="status" id="status" required>
                            <option selected value="{{$datas->status}}">{{$datas->status}}</option>
                            <option value="Booked">Booked</option>
                            <option value="Cancel">Cancel</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Confirm?</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach