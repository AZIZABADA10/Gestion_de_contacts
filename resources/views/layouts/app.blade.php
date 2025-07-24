<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des Contacts</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="bg-light shadow-sm mb-4">
        <div class="container d-flex align-items-center py-2">
            <img src="{{ asset('favicon.ico') }}" alt="Logo" width="40" height="40" class="me-2">
            <h1 class="h5 m-0">Gestion des Contacts</h1>
        </div>
    </header>

    @yield('content')

     <footer class="bg-dark text-white mt-auto py-3">
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Gestion des Contacts. Tous droits réservés.</p>
            <small>Développé par   Abada Aziz </small>
        </div>
    </footer>
</body>
</html>
