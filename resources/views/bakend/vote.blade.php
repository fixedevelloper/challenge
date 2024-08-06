@extends('bakend.layout')
@section('content')
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Votes</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped responsive-table">
                        <thead>
                        <tr>
                            <th>Candidat</th>
                            <th>Rubrique</th>
                            <th>Votes</th>
                            <th>Montant (FCFA)</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>
                           {{ $item->rubrique_candidat->candidat->name }}
                            </td>
                            <td class="coin-name">
                                {{ $item->rubrique_candidat->rubrique->name }}
                            </td>
                            <td>{{ $item->quantity }}</td>
                            <td class="text-danger">{{ $item->quantity*100 }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$items->links()}}
            </div>
        </div>
    </div>


@endsection
