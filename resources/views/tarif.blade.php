@extends('admin._appBar')
@section('titre','Liste des clients')

@section('content')
<div class="contaimer text-center">
        <div class="row">
            <div class="col-12  mt-2">
                <div class="card bg-light text-dark ">
                <h2>Listes Des Tarifs</h2>
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
                            <th>Montant:</th>
                            <th>Date:</th>
                            <th>Paiement:</th>
                            <th>Facture:</th>
                            <th>Distance:</th>
                            <th>Location:</th>
                            <th>Actions:</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach(  $tarif  as  $tarifs)
                        <tr>
                            <td>{{   $tarifs->id  }}  </td>
                            <td>{{   $tarifs->Montant_Tarif }} </td>
                            <td>{{  $tarifs->Date_paiement   }}  </td>
                            <td>{{  $tarifs->Moyen_paiement   }} </td>
                            <td>{{  $tarifs->Facture_paiement   }} </td>
                            <td>{{   $tarifs->Distance }} </td>
                            <td>{{ $tarifs->Locations_id }}</td>

                            <td>
                                <a href="" class="btn btn-warning">Update</a>
                                <a href="" class="btn btn-info">Delete</a>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
               
               
                
                <a href="{{ route('ajouterTarif') }}" class="btn btn-danger float-start">Ajouter</a>
               

          </div>

        </div>

    </div>

    
@endsection
