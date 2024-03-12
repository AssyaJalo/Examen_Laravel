

@extends('admin._appBar')
@section('titre','Liste des clients')

@section('content')

<div class="contaimer text-center">
        <div class="row col-8 offset-2 mt-5">
            <div class=" card bg-light col s12 ">
                <h1>Ajouter Une Vehicule <h1>
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
<form action="{{ route('ajoutTraitementVehicule') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="" class="form-label">Date D'achat:</label>
            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Achat">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nb_Kilometre:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Kilometre">
        </div>
        <!-- <div class="mb-3">
            <label for="" class="form-label">Matricule:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Matricule">
        </div> -->

        <!-- <div class="mb-3">
            <label for="" class="form-label">photo:</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="photo">
        </div> -->
        <div class="mb-3">
            <label for="photo" class="form-label">Photo:</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Marque:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Marque">
        </div>
        <div class="mb-3">
            <label for="type_vehicules_id" class="form-label">Type:</label>
            <select name="type_vehicules_id" id="type_vehicules_id" class="form-control">
            <option value="0">Faites un choix</option>
            @foreach($types as $type)
               <option value="{{ $type->id }}">{{  $type->typeVehicule}}</option>
            @endforeach
            </select>
            
        </div>
        <div class="mb-3">
           <label for="" class="form-label">Statut:</label>
              <select class="form-control" name="Statut">
                     <option value="Hors service">Hors service</option>
                    <option value="En service">En service</option>
                    <option value="En reparation">En reparation</option>
                    
             </select>
        </div>
         <div class="mb-3">
            <label for="chauffeurs_id" class="form-label">Chauffeur:</label>
            <select name="chauffeurs_id" id="chauffeurs_id" class="form-control">
            <option value="0">Faites un choix</option>
            @foreach($chauffeurs as $chauffeur)
               <option value="{{ $chauffeur->id }}">{{  $chauffeur->Prenom}} {{  $chauffeur->Nom }}</option>
            @endforeach
            </select>
            
        </div>

        <button type="submit" class="btn btn-info">Enregistrer</button>
        <button type="submit" class="btn btn-danger">Annuler</button>
</form>
</div>

@endsection