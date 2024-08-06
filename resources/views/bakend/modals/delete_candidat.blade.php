<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Delete candidat <span class="text-danger">{{ $candidat->name }}</span></h5>
            <a class="btn-close"
                data-dismiss="modal"
                aria-label="Close" rel="modal:close"></a>
        </div>
        <div class="modal-body">
            <div class="auth-form">
                <form  class="identity-upload" method="POST" action="{!! route('candidat_delete',['id'=>$candidat->id]) !!}">
                    @csrf
                    <div class="row">
                        <p>Voulez vous supprimez definivement ce candidat?</p>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-block">Delete</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
