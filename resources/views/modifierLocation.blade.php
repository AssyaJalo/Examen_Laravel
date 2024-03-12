

@extends('admin._appBar')
@section('titre','Liste des clients')

@section('content')

<div class="contaimer text-center">
        <div class="row col-8 offset-2 mt-5">
            <div class=" card bg-light col s12 ">
                <h1>Modifier Un Chauffeur <h1>
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
<form action="{{ route('modifierTraitementLocation') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $location->id  }}"> 
        <div class="mb-3">
            <label for="" class="form-label">Depart:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="LieuDepart" value="{{$location->LieuDepart }}">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Arrivee:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="LieuArriver" value="{{ $location->LieuArriver }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Date:</label>
            <input type="date" class="form-control" id="" name="Date" value="{{ $location->Date }}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Heure Depart:</label>
            <input type="time" class="form-control" id="exampleInputPassword1" name="HeurDepart" value="{{ $location->HeurDepart }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Heure D'arriver:</label>
            <input type="time" class="form-control" id="exampleInputPassword1" name="HeurArriver" value="{{ $location->HeurArriver }}">
        </div>
        <div class="mb-3">
        <label for="vehicules_id" class="form-label">Vehicule:</label>
        <select name="vehicules_id" id="vehicules_id" class="form-control">
        <option value="0">Faites un choix</option>
        @foreach( $vehicules as  $vehicule)
            @if( $vehicule->id == $location->vehicules_id)
                <option value="{{  $vehicule->id }}" selected>{{  $vehicule->Marque}}</option>
            @else
                <option value="{{  $vehicule->id }}">{{  $vehicule->Marque }}</option>
            @endif
        @endforeach
    </select>
   </div>
   <div class="mb-3">
    <label for="clients_id" class="form-label">Client:</label>
    <select name="clients_id" id="clients_id" class="form-control">
        <option value="0">Faites un choix</option>
        @foreach( $clients  as  $client)
            @if($client->id == $location->clients_id)
                <option value="{{ $client->id }}" selected>{{ $client->nomClient }} {{ $client->prenomClient }}</option>
            @else
                <option value="{{ $client->id }}">{{ $client->nomClient }} {{ $client->prenomClient }}</option>
            @endif
        @endforeach
    </select>
</div>


        <button type="submit" class="btn btn-info">Enregistrer</button>
        <button type="submit" class="btn btn-danger">Annuler</button>
</form>
</div>

@endsection