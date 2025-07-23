@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-primary fw-bold mb-4"><i class="bi bi-pencil-square me-2"></i>Modifier le Contact</h2>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('contacts.update', $contact) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" value="{{ old('nom', $contact->nom) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Prénom</label>
                        <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $contact->prenom) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $contact->email) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Téléphone</label>
                        <input type="text" name="telephone" class="form-control" value="{{ old('telephone', $contact->telephone) }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Adresse</label>
                        <input type="text" name="adresse" class="form-control" value="{{ old('adresse', $contact->adresse) }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Photo de profil (laisser vide pour ne pas changer)</label>
                        <input type="file" name="photo_profile" class="form-control mb-2">
                        @if($contact->photo_profile)
                            <img src="{{ asset('images/' . $contact->photo_profile) }}" width="80" class="rounded" alt="photo actuelle">
                        @endif
                    </div>

                    <div class="col-12 d-flex justify-content-between mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i>Enregistrer
                        </button>

                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Annuler
                        </a>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
