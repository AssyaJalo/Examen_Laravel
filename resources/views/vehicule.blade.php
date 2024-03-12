@extends('admin._appBar')
@section('titre','Liste des clients')

@section('content')
<div class="contaimer text-center">
        <div class="row">
            <div class="col-12  mt-2">
                <div class="card bg-light text-dark ">
                <h2>Listes Des Vehicules</h2>
                </div>
                <div class="col-md-6 mt-3 float-end">
                    <form id="searchForm" method="GET">
                        <input type="text" id="searchInput" name="query" placeholder="Rechercher">
                        <button type="submit" class="btn btn-info">Rechercher</button>
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
                            <th>Date D'achat:</th>
                            <th>Nb_Kilometre:</th>
                            <th>Matricule:</th>
                            <th>Type:</th>
                            <th>Statut:</th>
                            <th>Chauffeur:</th>
                            <th>Marque:</th>
                            <th>Photo:</th>
                            <th>Actions:</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $vehicule  as $Cv)
                        <tr>
                            <td>{{   $Cv->id }}  </td>
                            <td>{{   $Cv->Achat }}  </td>
                            <td>{{   $Cv->Kilometre }} </td>
                            <td>{{   $Cv->Matricule }} </td>
                            <td>{{   $Cv->type_vehicules_id }} </td>
                            <td>{{   $Cv->Statut}} </td>
                            <td>{{   $Cv->chauffeurs->Prenom}} {{ $Cv->chauffeurs->Nom}} </td>
                            <td>{{   $Cv->Marque }} </td>
                            <td>
                                <img src="{{ asset('images/vehicules/' . $Cv->photo) }}" alt="Img"  style="width: 80px; height: 80px;"/>
                                 
                            </td>
                            

                            <td>
                                <a href="{{ route('modifierVehicule', ['id' =>$Cv->id ]) }}" class="btn btn-warning">Update</a>
                                <a href="{{ route('supprimerVehicule', ['id' =>$Cv->id ]) }}" class="btn btn-info mt-2">Delete</a>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
                <a href="{{ route('ajouterVehicule') }}" class="btn btn-danger float-start">Ajouter</a>
               

          </div>

        </div>

    </div>

    
@endsection
