@extends('bakend.layout')
@section('content')
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Rubriques</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped responsive-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
<div class="modal fade" id="BuyModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une rubrique</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                    <form  class="identity-upload" method="POST">
                        @csrf
                        <div class="">
                            <div class="col-12">
                                <label class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Name">
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
