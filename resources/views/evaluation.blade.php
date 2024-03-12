@extends('admin._appBar')
@section('titre','Liste des clients')

@section('content')
<div class="contaimer text-center">
        <div class="row">
            <div class="col-12  mt-2">
                <div class="card bg-light text-dark ">
                <h2>Listes Des Evaluations</h2>
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
                            <th>Chauffeur:</th>
                            <th>Client:</th>
                            <th>Note:</th>
                            <th>commentaire:</th>
                            <th>Actions:</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $evaluation  as $CE)
                        <tr>
                            <td>{{   $CE-> id }}  </td>
                            <td>{{   $CE-> chauffeur->Prenom }} {{   $CE-> chauffeur->Nom }}  </td>
                            <td>{{   $CE->client->nomClient  }} {{   $CE->client->prenomClient  }} </td>
                            <td>{{   $CE->note  }} </td>
                            <td>{{   $CE-> commentaire }} </td>

                            <td>
                                <a href="" class="btn btn-warning">Update</a>
                                <a href="" class="btn btn-info mt-2">Delete</a>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
                <a href="{{ route('ajouterEvaluation') }}" class="btn btn-danger float-start">Ajouter</a>
               
                
                

          </div>

        </div>

    </div>
@endsection
