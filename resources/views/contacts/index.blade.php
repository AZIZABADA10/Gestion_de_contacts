@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-people-fill me-2"></i>Liste des Contacts
        </h2>

        <a href="{{ route('contacts.create') }}" class="btn btn-success shadow-sm"> <i class="bi bi-person-plus-fill me-2"></i>Ajouter un contact</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('contacts.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text" name="search" class="form-control" placeholder="Rechercher par nom ou téléphone" value="{{ request('search') }}">
        </div>

    </form>

    <div class="table-responsive shadow-sm">
        <table class="table table-hover align-middle bg-white border rounded">
            <thead class="table-light">
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>
                            @if($contact->photo_profile)
                                <img src="{{ asset('images/' . $contact->photo_profile) }}" width="50" height="50" class="rounded-circle">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $contact->nom }}</td>
                        <td>{{ $contact->prenom }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->telephone }}</td>
                        <td>{{ $contact->adresse }}</td>
                        <td>
                            <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-sm btn-outline-primary me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $contact->id }}">
                                <i class="bi bi-trash"></i>
                            </button>
                            <div class="modal fade" id="deleteModal-{{ $contact->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $contact->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-danger">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="deleteModalLabel-{{ $contact->id }}">
                                        Supprimer le contact
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                </div>
                                <div class="modal-body">
                                    Êtes-vous sûr de vouloir supprimer <strong>{{ $contact->nom }} {{ $contact->prenom }}</strong> ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted">Aucun contact trouvé.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $contacts->links() }}
    </div>
</div>
@endsection
