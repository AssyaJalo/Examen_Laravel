

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
<form action="{{ route('ajoutTraitementChauffeur') }}" method="get" >
    @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nom:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Nom">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Prenom:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Prenom">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Email">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Permis:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Permis" value="{{ $permis  }}" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Emission:</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="Emission">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Expiration:</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="Expiration">
        </div>
        <div class="mb-3">
           <label for="" class="form-label">Categorie:</label>
              <select class="form-control" name="Categorie">
                     <option value="B">B</option>
                    <option value="C1">C1</option>
                    <option value="C1E">C1E</option>
                    <option value="D">D</option>
             </select>
        </div>

        <button type="submit" class="btn btn-info">Enregistrer</button>
        <button type="submit" class="btn btn-danger">Annuler</button>
</form>
</div>

@endsection