@extends('admin._appBar')
@section('titre','Liste des clients')

@section('content')

<div class="container text-center">
    <div class="row col-8 offset-2 mt-5">
        <div class="card bg-light col s12 ">
            <h1>Ajouter Une Evaluation</h1>
        </div>
    </div>
</div>

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<ul>
    @foreach ($errors->all() as $error)
    <li class="alert alert-danger">{{ $error }}</li>
    @endforeach
</ul>

<div class="col-8 offset-2 mt-8">
    <form action="{{ route('ajoutTraitementevaluation') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="chauffeurs_id" class="form-label">Chauffeur:</label>
            <select name="chauffeurs_id" id="chauffeurs_id" class="form-control">
                <option value="0">Faites un choix</option>
                @foreach( $chauffeurs as $chauffeur)
                <option value="{{ $chauffeur->id }}">{{ $chauffeur->Prenom }} {{ $chauffeur->Nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Note:</label>
            <input type="text" class="form-control" id="note" name="note">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Commentaire:</label>
            <input type="text" class="form-control" id="commentaire" name="commentaire">
        </div>

        <button type="submit" class="btn btn-info">Enregistrer</button>
        <button type="reset" class="btn btn-danger">Annuler</button>
    </form>
</div>

@endsection
