<!-- Modal for Recharge Account -->
<form id="form-recharge-user-account" action="{{route('recharge.user.account')}}" method="POST">
    @csrf
    <div class="modal fade" id="recharge-user-account-modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationFormLabel">TOP UP NOW</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="recharge-amount" class="mb-1">Top Up Amount</label>
                    <input id="recharge-amount" name="recharge-amount" type="text" class="col-sm-12 form-control"
                           value="">

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Recharge</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
