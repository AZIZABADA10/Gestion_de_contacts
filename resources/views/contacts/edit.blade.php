@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier le Contact</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('contacts.update', $contact) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $contact->nom) }}">
        </div>

        <div class="mb-3">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $contact->prenom) }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $contact->email) }}">
        </div>

        <div class="mb-3">
            <label>Téléphone</label>
            <input type="text" name="telephone" class="form-control" value="{{ old('telephone', $contact->telephone) }}">
        </div>

        <div class="mb-3">
            <label>Adresse</label>
            <input type="text" name="adresse" class="form-control" value="{{ old('adresse', $contact->adresse) }}">
        </div>

        <div class="mb-3">
            <label>Photo de profil (laisser vide pour ne pas changer)</label>
            <input type="file" name="photo_profile" class="form-control">
            @if($contact->photo_profile)
                <br>
                <img src="{{ asset('images/' . $contact->photo_profile) }}" width="80" alt="photo actuelle">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
