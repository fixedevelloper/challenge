<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Edition</h5>
            <a class="btn-close"
                data-dismiss="modal"
                aria-label="Close" rel="modal:close"></a>
        </div>
        <div class="modal-body">
            <div class="auth-form">
                <form  class="identity-upload" method="POST" action="{!! route('back.add_wallet',['id'=>$crypto->id]) !!}">
                    @csrf
                    <div class="identity-content">
                        <div class="col-12">
                            <label class="form-label">Address</label>

                            <input name="address" type="text" class="form-control" placeholder="address">
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
