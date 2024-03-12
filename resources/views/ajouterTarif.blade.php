

@extends('admin._appBar')
@section('titre','Liste des clients')

@section('content')

<div class="contaimer text-center">
        <div class="row col-8 offset-2 mt-5">
            <div class=" card bg-light col s12 ">
                <h1>Ajouter Un Chauffeur <h1>
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
<form action="{{ route('ajoutTraitementTarif') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="" class="form-label">Date:</label>
            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Date_paiement">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Distance:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Distance">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Montant_Tarif:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Montant_Tarif">
        </div>
        <div class="mb-3">
           <label for="" class="form-label">Moyen_paiement:</label>
              <select class="form-control" name="Moyen_paiement">
                     <option value="cartes bancaires">cartes bancaires</option>
                    <option value="monnaie électronique">monnaie électronique</option>
                    <option value="virements">virements</option>
             </select>
        </div>
        <div class="mb-3">
            <label for="Locations_id" class="form-label">Location:</label>
            <select name="Locations_id" id="Locations_id" class="form-control">
            <option value="0">Faites un choix</option>
            @foreach($locations as $location)
               <option value="{{ $location->id }}">{{  $location->id}}</option>
            @endforeach
            </select>
        </div>
        <!-- <div class="mb-3">
            <label for="" class="form-label">Facture:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Facture_paiement">
        </div> -->
        

        <button type="submit" class="btn btn-info">Enregistrer</button>
        <button type="submit" class="btn btn-danger">Annuler</button>
</form>
</div>

@endsection