@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Contacts</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Formulaire de recherche -->
    <form action="{{ route('contacts.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Rechercher par nom ou téléphone" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </div>
    </form>

    <a href="{{ route('contacts.create') }}" class="btn btn-success mb-3">+ Ajouter un contact</a>

    <table class="table table-bordered">
        <thead>
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
                            <img src="{{ asset('images/' . $contact->photo_profile) }}" width="50" height="50" alt="photo">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $contact->nom }}</td>
                    <td>{{ $contact->prenom }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->telephone }}</td>
                    <td>{{ $contact->adresse }}</td>
                    <td>
                        <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-sm btn-primary">Modifier</a>
                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7">Aucun contact trouvé.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $contacts->links() }}
</div>
@endsection
