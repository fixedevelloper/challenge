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
                            <th>Votes</th>
                            <th>Montant</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                            <span class="danger-arrow"
                            ><i class="icofont-arrow-down"></i> Sold</span
                            >
                            </td>
                            <td class="coin-name">
                                <i class="cc BTC"></i> Bitcoin
                            </td>
                            <td>Using - Bank *******5264</td>
                            <td class="text-danger">-0.000242 BTC</td>
                            <td>-0.125 USD</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
