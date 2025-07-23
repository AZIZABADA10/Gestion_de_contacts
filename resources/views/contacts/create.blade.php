@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-success mb-4 fw-bold">
    <i class="bi bi-person-plus-fill me-2"></i>Ajouter un Contact
</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Prénom</label>
                        <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Téléphone</label>
                        <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Adresse</label>
                        <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Photo de profil (optionnel)</label>
                        <input type="file" name="photo_profile" class="form-control">
                    </div>

                    <div class="col-12 d-flex justify-content-between mt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-plus-circle me-1"></i>Ajouter
                        </button>

                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Retour
                        </a>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
