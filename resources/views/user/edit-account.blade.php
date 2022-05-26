<!-- Modal for Edit User Information -->
<form id="form-edit-user-account" action="{{route('edit.user.account')}}" method="POST">
    @csrf
    <div class="modal fade" id="edit-user-account-modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationFormLabel">Edit Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="first-name" class="mb-1">First Name</label>
                    <input id="first-name" name="first-name" type="text" class="col-sm-12 form-control"
                           value="{{$userInfo->first_name}}">

                    <label for="last-name" class="mb-1">Last Name</label>
                    <input id="last-name" name="last-name" type="text" class="col-sm-12 form-control"
                           value="{{$userInfo->last_name}}">

                    <label for="email" class="mb-1">Email</label>
                    <input id="email" name="email" type="text" class="col-sm-12 form-control"
                           value="{{$userInfo->email}}">

                    <label for="mobile" class="mb-1">Mobile</label>
                    <input id="mobile" name="mobile" type="text" class="col-sm-12 form-control"
                           value="{{$userInfo->mobile}}">

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
