

@extends('admin._appBar')
@section('titre','Liste des clients')

@section('content')

<div class="contaimer text-center">
        <div class="row col-8 offset-2 mt-5">
            <div class=" card bg-light col s12 ">
                <h1>Ajouter Un Client <h1>
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
<form action="{{ route('ajoutTraitementClient') }}" method="get" >
    @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nom:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nomClient">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Prenom:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="prenomClient">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="emailClient">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Telephone:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="telephoneClient">
        </div>

        <button type="submit" class="btn btn-info">Enregistrer</button>
        <button type="submit" class="btn btn-danger">Annuler</button>
</form>
</div>

@endsection