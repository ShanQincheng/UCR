<!-- Modal for Registration -->
<form action="{{route('ending-lease.manager')}}" method="POST">
    @csrf
    <div class="modal fade" id="endingLeaseModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationFormLabel">Confirm Return</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input id="lease-id" type="hidden" name="lease-id" value="{{$renting->lease_id}}">

                    <div class="input-group mb-3">
                        <select class="form-select" aria-label="Default select example" name="damage">
                            <option value="no damage" selected>No Damage</option>
                            <option value="minor damage">Minor Damage</option>
                            <option value="major damage">Major Damage</option>
                        </select>

                        <label class="input-group-text" for="penalty $" class="form-label">Penalty $</label>
                        <input id="penalty" name="penalty" type="text" class="form-control"
                               aria-label="Amount (to the nearest dollar)" value="0">
                    </div>

                    <div class="mb-3">
                        <label for="comment" class="form-label">Comments</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</form>
