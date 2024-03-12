@extends('admin._appBar')
@section('titre','Liste des clients')

@section('content')
<div class="contaimer text-center">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="card bg-light text-dark ">
                <h2>Listes Des Clients</h2>
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
                            <th>Telephone:</th>
                            <th>Actions:</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $client   as $Ct)
                        <tr>
                            <td>{{   $Ct->id }}  </td>
                            <td>{{   $Ct->nomClient }}  </td>
                            <td>{{   $Ct->prenomClient }} </td>
                            <td>{{   $Ct->emailClient }} </td>
                            <td>{{   $Ct->telephoneClient }} </td>

                            <td>
                                <a href="" class="btn btn-warning">Update</a>
                                <a href="{{ route('supprimerClient', ['id' =>$Ct-> id ]) }}" class="btn btn-info">Delete</a>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
                <a href="{{ route('ajouterClient') }}" class="btn btn-danger float-start">Ajouter</a>
               

          </div>

        </div>

    </div>

@endsection