@extends('bakend.layout')
@section('content')
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Candidats</h4>
                <button
                    type="button"
                    class="btn btn-primary float-end"
                    data-toggle="modal"
                    data-target="#addcandidat"
                >
                    Add candidat
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped responsive-table">
                        <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Dossard</th>
                            <th>Pseudo</th>
                            <th>Rubriques</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>
                            <img width="80" src="{{ asset('storage/'.$item->photo) }}">
                            </td>
                            <td class="coin-name">
                                <i class="cc BTC"></i> {{ $item->name }}
                            </td>
                            <td>{{ $item->numero }}</td>
                            <td>{{ $item->name_artist }}</td>
                            <td class="text-danger">
                                @foreach($item->rubriques as $rubrique)
                                    <span class="badge bg-black">{{ $rubrique->name }}</span>
                                @endforeach
                              </td>
                            <td>
                                <a rel="modal:open" href="{{ route('candidat_edit',['id'=>$item->id]) }}" class="btn btn-outline-success"><i class="icofont icofont-edit"></i></a>
                                <a rel="modal:open" href="{{ route('candidat_delete',['id'=>$item->id]) }}" class="btn btn-outline-danger"><i class="icofont icofont-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{$items->links('vendor.pagination.bootstrap-5')}}
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
<div class="modal fade" id="addcandidat">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un candidat</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <form  class="identity-upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label class="form-label">Name*</label>
                                <input name="name" type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">Artist name</label>
                                <input name="artist_name" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">Dossard</label>
                                <input name="numero" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">Phone</label>
                                <input name="phone" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">Rubriques</label>
                                <select multiple name="rubriques[]" type="text" class="form-control">
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
</div>
