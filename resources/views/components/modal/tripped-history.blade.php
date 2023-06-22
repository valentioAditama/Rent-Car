@foreach($data as $datas)
<!-- Modal -->
<div class="modal fade" id="modal-update-trippedHistory{{$datas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tripped History</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.tripped-history.update', $datas->id)}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-3">
                                <div class="mb-3">
                                    <label for="nopol" class="form-label">Nopol</label>
                                    <input type="text" class="form-control form-control-sm" id="nopol" name="nopol" value="{{$datas->nopol}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="date_in" class="form-label">Date In</label>
                                            <input type="date" class="form-control form-control-sm" name="date_in" value="{{$datas->date_in}}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="date_out" class="form-label">Date Out</label>
                                            <input type="date" class="form-control form-control-sm" name="date_out" value="{{$datas->date_out}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="time_in" class="form-label">Time In</label>
                                            <input type="time" class="form-control form-control-sm" name="time_in" value="{{$datas->time_in}}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="time_out" class="form-label">Time Out</label>
                                            <input type="time" class="form-control form-control-sm" name="time_out" value="{{$datas->time_out}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="car_model" class="form-label">Car Model</label>
                                    <input type="text" class="form-control form-control-sm" id="car_model" name="car_model" value="{{$datas->car_model}}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="customer_nic" class="form-label">Customer Nic</label>
                                <input type="number" class="form-control form-control-sm" id="customer_nic" name="customer_nic" value="{{$datas->customer_nic}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="customer_name" class="form-label">Customer Name</label>
                                <input type="text" class="form-control form-control-sm" id="customer_name" name="customer_name" value="{{$datas->customer_name}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="number" class="form-control form-control-sm" id="contact" name="contact" value="{{$datas->contact}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="agent" class="form-label">Agent</label>
                                <input type="text" class="form-control form-control-sm" id="agent" name="agent" value="{{$datas->agent}}">
                            </div>
                            <div class="mb-3">
                                <label for="total_amount" class="form-label">Total Amount</label>
                                <input type="number" class="form-control form-control-sm" id="total_amount" name="total_amount" value="{{$datas->total_amount}}">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach