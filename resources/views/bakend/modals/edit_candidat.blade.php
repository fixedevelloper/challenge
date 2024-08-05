<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit candidat</h5>
            <a class="btn-close"
                data-dismiss="modal"
                aria-label="Close" rel="modal:close"></a>
        </div>
        <div class="modal-body">
            <div class="auth-form">
                <form  class="identity-upload" method="POST" action="{!! route('candidat_edit',['id'=>$candidat->id]) !!}">
                    @csrf
                    <div class="row">
                        <div class="col-12 mt-3">
                            <label class="form-label">Name*</label>
                            <input name="name" type="text" value="{{ $candidat->name }}" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-6 mt-3">
                            <label class="form-label">Artist name</label>
                            <input value="{{ $candidat->name_artist }}" name="artist_name" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-6 mt-3">
                            <label class="form-label">Dossard</label>
                            <input value="{{ $candidat->numero }}" name="numero" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-12 mt-3">
                            <label class="form-label">Phone</label>
                            <input value="{{ $candidat->phone }}" name="phone" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-12 mt-3">
                            <label class="form-label">Rubriques</label>
                            <select multiple name="rubriques[]" type="text" class="form-control" style="height: 120px">
                                @foreach($rubriques as $rubrique)
                                    <option value="{{ $rubrique->id }}">{{ $rubrique->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <label class="form-label">Photo</label>
                            <input name="photo" type="file" class="form-control form-file" placeholder="">
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
