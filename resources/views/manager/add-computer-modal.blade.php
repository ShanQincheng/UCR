<!-- Modal for Add Computer -->
<form id="form-add-computer" action="{{ route('add.computers.manager') }}" method="POST">
    @csrf
    <div class="modal fade" id="add-pc-modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationFormLabel">Add a new computer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <label for="pc-name" class="mb-1">Computer Name</label>
                    <input id="pc-name" name="pc-name" type="text" class="col-sm-12 form-control" required>

                    <label for="device-type" class="mb-1">Device Type</label>
                    <input id="device-type" name="device-type" type="text" class="col-sm-12 form-control" value="computer" required>

                    <label for="brand" class="mb-1">Brand</label>
                    <input id="brand" name="brand" type="text" class="col-sm-12 form-control" required>

                    <label for="picture" class="mb-1">Picture URL</label>
                    <input id="picture" name="picture" type="text" class="col-sm-12 form-control" required>

                    <label for="os" class="mb-1">OS</label>
                    <input id="os" name="os" type="text" class="col-sm-12 form-control" required>

                    <label for="disp-size" class="mb-1">Display Size</label>
                    <input id="disp-size" name="disp-size" type="text" class="col-sm-12 form-control" required>

                    <label for="ram" class="mb-1">RAM( GB )</label>
                    <input id="ram" name="ram" type="text" class="col-sm-12 form-control" required>

                    <label for="usb-port-number" class="mb-1">USB Port Number</label>
                    <input id="usb-port-number" name="usb-port-number" type="text" class="col-sm-12 form-control" required>

                    <label for="hdmi-port-number" class="mb-1">HDMI Port Number</label>
                    <input id="hdmi-port-number" name="hdmi-port-number" type="text" class="col-sm-12 form-control" required>

                    <label for="rent" class="mb-1">Rent Per Hour</label>
                    <input id="rent" name="rent" type="text" class="col-sm-12 form-control" required>

                    <label for="stocks" class="mb-1">Stocks</label>
                    <input id="stocks" name="stocks" type="text" class="col-sm-12 form-control" required>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
