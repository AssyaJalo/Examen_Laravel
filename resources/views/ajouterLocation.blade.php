

@extends('admin._appBar')
@section('titre','Liste des clients')

@section('content')

<div class="contaimer text-center">
        <div class="row col-8 offset-2 mt-5">
            <div class=" card bg-light col s12 ">
                <h1>Ajouter Une Location <h1>
            </div>
        </div>
    </div>
    @if (session('status'))
     <div class="alert alert.success">
        {{session('status') }}
     </div>

    @endif
   <ul>
        @foreach ($errors->all() as $error)
        <li class="alert alert-danger">{{ $error }}  </li>
         @endforeach
   </ul>
<div class="col-8 offset-2 mt-8">
<form action="{{ route('ajoutTraitementLocation') }}" method="get" enctype="multipart/form-data" >
    @csrf
        <div class="mb-3">
            <label for="" class="form-label">Lieu de Depart:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="LieuDepart">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Lieu D'arriver:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="LieuArriver">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Date de Location:</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="Date">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Heur de Depart:</label>
            <input type="time" class="form-control" id="exampleInputPassword1" name="HeurDepart">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Heur D'arriver:</label>
            <input type="time" class="form-control" id="exampleInputPassword1" name="HeurArriver">
        </div>
        <div class="mb-3">
            <label for="vehicules_id" class="form-label">Vehicule:</label>
            <select name="vehicules_id" id="vehicules_id" class="form-control">
            <option value="0">Faites un choix</option>
            @foreach( $vehicules as  $vehicule)
               <option value="{{  $vehicule->id }}">{{   $vehicule->photo}}</option>
            @endforeach
            </select>
            
        </div>
        <div class="mb-3">
            <label for="clients_id" class="form-label">Client:</label>
            <select name="clients_id" id="clients_id" class="form-control">
            <option value="0">Faites un choix</option>
            @foreach( $clients as $client)
               <option value="{{ $client->id }}">{{  $client->prenomClient }} {{ $client->nomClient }}</option>
            @endforeach
            </select>
            
        </div>

        <button type="submit" class="btn btn-info">Enregistrer</button>
        <button type="submit" class="btn btn-danger">Annuler</button>
</form>
</div>

@endsection