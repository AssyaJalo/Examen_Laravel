@extends('admin._appBar')
@section('titre','Liste des clients')

@section('content')
<div class="contaimer text-center">
        <div class="row">
            <div class="col-12  mt-2">
                <div class="card bg-light text-dark ">
                <h2>Listes Des locations</h2>
                </div>
                <div class="col-md-6 mt-3 float-end">
                <form method="GET">
                    <input type="text" name ="query" placeholder="Rechercher">
                    <button type="submit" class=" btn btn-info ">Rechercher</button>
                  </form>
                </div>
                @if (session('status'))
                    <div class="alert alert.success">
                        {{session('status') }}
                    </div>

               @endif
               
               <table class="table table-striped  table-hover mt-5">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Lieu de depart:</th>
                            <th>Lieu d'arrivee:</th>
                            <th>Date de location:</th>
                            <th>Heur de depart:</th>
                            <th>Heur d'arriver:</th>
                            <th>Client:</th>
                            <th>Vehicule:</th>
                            <th>Actions:</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $location  as $CL)
                        <tr>
                            <td>{{   $CL-> id }}  </td>
                            <td>{{   $CL-> LieuDepart }}  </td>
                            <td>{{   $CL-> LieuArriver }} </td>
                            <td>{{   $CL-> Date }} </td>
                            <td>{{   $CL-> HeurDepart }} </td>
                            <td>{{   $CL-> HeurArriver  }} </td>
                            <td>{{ $CL-> clients_id}}</td>
                            <td>{{   $CL-> vehicules_id }} </td>

                            <td>
                                <a href="{{ route('modifierLocation', ['id' =>$CL-> id ]) }}" class="btn btn-warning">Update</a>
                                <a href="{{ route('supprimerLocation', ['id' =>$CL-> id ]) }}" class="btn btn-info mt-2">Delete</a>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
                <a href="{{ route('ajouterLocation') }}" class="btn btn-danger float-start">Ajouter</a>
               
                
                

          </div>

        </div>

    </div>
@endsection
