@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un Contact</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
        </div>

        <div class="mb-3">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label>Téléphone</label>
            <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}">
        </div>

        <div class="mb-3">
            <label>Adresse</label>
            <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}">
        </div>

        <div class="mb-3">
            <label>Photo de profil (optionnel)</label>
            <input type="file" name="photo_profile" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
