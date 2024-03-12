@extends('admin._appBar')
@section('titre','Liste des clients')

@section('content')
<div class="contaimer text-center">
        <div class="row">
            <div class="col-12  mt-2">
                <div class="card bg-light text-dark ">
                <h2>Listes Des Chauffeurs</h2>
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
                            <th>Nom:</th>
                            <th>Prenom:</th>
                            <th>Email:</th>
                            <th>Permis:</th>
                            <th>Emission:</th>
                            <th>Expiration</th>
                            <th>Categorie::</th>
                            <th>Actions:</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $chauffeur   as $Ch)
                        <tr>
                            <td>{{   $Ch->id }}  </td>
                            <td>{{   $Ch->Nom }}  </td>
                            <td>{{   $Ch->Prenom }} </td>
                            <td>{{   $Ch->Email }} </td>
                            <td>{{   $Ch->Permis }} </td>
                            <td>{{   $Ch->Emission }} </td>
                            <td>{{   $Ch->Expiration }} </td>
                            <td>{{   $Ch->Categorie }} </td>

                            <td>
                                <a href="" class="btn btn-warning">Update</a>
                                <a href="{{ route('supprimerChauffeur', ['id' =>$Ch-> id ]) }}" class="btn btn-info mt-2">Delete</a>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
                <a href="{{ route('ajouterChauffeur') }}" class="btn btn-danger float-start">Ajouter</a>
               

          </div>

        </div>

    </div>
@endsection
