@extends('admin._appBar')
@section('titre','Liste des clients')

@section('content')
<!-- <div class="contaimer text-center"> -->
<div class="contaimer text-center">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="card bg-light text-dark ">
                <h2>Suivi de Contrôles</h2>
                </div>
                
                @if (session('status'))
                    <div class="alert alert.success">
                        {{session('status') }}
                    </div>

               @endif
    <div class="row">
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-header bg-primary text-dark">En service ({{ $vehiclesEnService->count() }})</div>
                <div class="card-body">
                    <ul>
                        @foreach ($vehiclesEnService as $vehicle)
                        <li>{{ $vehicle->Marque }}</li> 
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-header bg-primary text-dark">Hors service ({{ $vehiclesHorsService->count() }})</div>
                <div class="card-body">
                    <ul>
                        @foreach ( $vehiclesHorsService as $vehicle)
                        <li>{{ $vehicle->Marque }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-5 ">
            <div class="card">
                <div class="card-header bg-primary text-dark">En réparation ({{ $vehiclesEnReparation->count() }})</div>
                <div class="card-body">
                    <ul>
                        @foreach ($vehiclesEnReparation as $vehicle)
                        <li>{{ $vehicle->Marque }}</li> 
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection