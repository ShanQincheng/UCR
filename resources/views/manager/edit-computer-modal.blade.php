<!-- Modal for Edit Computer -->
<form id="form-edit-computer" action="" method="POST">
    @csrf
    <div class="modal fade" id="edit-pc-modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationFormLabel">Edit computer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <label for="name-pc-modal" class="form-label">Computer Name</label>
                    <input id="name-pc-modal" name="name-pc-modal" type="text" class="col-sm-12 form-control" required>

                    <label for="type-pc-modal" class="form-label">Device Type</label>
                    <input id="type-pc-modal" name="type-pc-modal" type="text" class="col-sm-12 form-control" value="computer" required>

                    <label for="brand-pc-modal" class="form-label">Brand</label>
                    <input id="brand-pc-modal" name="brand-pc-modal" type="text" class="col-sm-12 form-control" required>

                    <label for="pic-pc-modal" class="form-label">Picture URL</label>
                    <input id="pic-pc-modal" name="pic-pc-modal" type="text" class="col-sm-12 form-control" required>

                    <label for="os-pc-modal" class="form-label">OS</label>
                    <input id="os-pc-modal" name="os-pc-modal" type="text" class="col-sm-12 form-control" required>

                    <label for="disp-size-pc-modal" class="form-label">Display Size</label>
                    <input id="disp-size-pc-modal" name="disp-size-pc-modal" type="text" class="col-sm-12 form-control" required>

                    <label for="ram-pc-modal" class="form-label">RAM( GB )</label>
                    <input id="ram-pc-modal" name="ram-pc-modal" type="text" class="col-sm-12 form-control" required>

                    <label for="usb-port-num-pc-modal" class="form-label">USB Port Number</label>
                    <input id="usb-port-num-pc-modal" name="usb-port-num-pc-modal" type="text" class="col-sm-12 form-control" required>

                    <label for="hdmi-port-num-pc-modal" class="form-label">HDMI Port Number</label>
                    <input id="hdmi-port-num-pc-modal" name="hdmi-port-num-pc-modal" type="text" class="col-sm-12 form-control" required>

                    <label for="rent-pc-modal" class="form-label">Rent Per Hour</label>
                    <input id="rent-pc-modal" name="rent-pc-modal" type="text" class="col-sm-12 form-control" required>

                    <label for="stocks-pc-modal" class="form-label">Stocks</label>
                    <input id="stocks-pc-modal" name="stocks-pc-modal" type="text" class="col-sm-12 form-control" required>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
