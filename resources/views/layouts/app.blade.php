<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord | Mon École</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icônes Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background-color: #007bff; /* الأزرق المتوسط */
            color: #ffffff; /* النص باللون الأبيض */
            padding-top: 10px;
            position: fixed;
            width: 220px;
        }

        .sidebar a {
            color: #ffffff; /* النص باللون الأبيض */
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #0056b3; /* الأزرق الداكن عند التحويم */
        }

        .main {
            margin-left: 220px;
            padding-top: 5px;
        }

        .navbar {
            position: fixed;
            width: 100%;
            z-index: 1000;
            background-color: #007bff; /* الأزرق المتوسط */
            border-bottom: 1px solid #dee2e6;
            padding-top: 10px;
        }

        .navbar .navbar-brand {
            color: #ffffff; /* النص داخل الشريط العلوي بالأبيض */
        }

        .navbar .navbar-brand:hover {
            color: #e6f7ff; /* تغيير اللون عند التحويم */
        }

        .content {
            margin-top: 70px;
            padding: 20px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    {{-- Barre de navigation supérieure --}}
    <nav class="navbar navbar-expand-lg bg-primary shadow-sm">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">🎓 Système de gestion scolaire</span>
        </div>
    </nav>

    {{-- Barre latérale bleue --}}
    <div class="sidebar">
        <h5 class="text-center mb-4">Menu principal</h5>
        <a href="{{route('dashboard')}}"><i class="bi bi-house-door-fill me-2"></i>Dashboard</a>
        <a href="enseignant"><i class="bi bi-person-fill me-2"></i> Enseignants</a>
        <a href="{{ route('eleves.index') }}"><i class="bi bi-people-fill me-2"></i> Élèves</a>
        <a href="{{ route('niveaux.index') }}"><i class="bi bi-graph-up-arrow me-2"></i> Niveaux</a>
        <a href="{{ route('salles.index') }}"><i class="bi bi-door-open me-2"></i> Salles</a>
        <a href="{{ route('matieres.index') }}"><i class="bi bi-journal-bookmark-fill me-2"></i> Matières</a>
        <a href="{{ route('scolaires.index') }}"><i class="bi bi-calendar-week me-2"></i> Années Scolaires</a>
        <a href="{{route('classe.index')}}"><i class="bi bi-building me-2"></i> Classes</a>
        <a href="{{route('evaluations.index')}}"><i class="bi bi-calendar-week me-2"></i> Evaluations</a>
        <a href="route('notes')"><i class="bi bi-calendar-week me-2"></i> Notes</a>
        <a href="#"><i class="bi bi-calendar-week me-2"></i> Enseignant Matière</a>
        <a href="{{ route('users.index') }}"><i class="bi bi-people-fill me-2"></i> Users</a>




        <form action="{{route('auth.logout')}}" method='POST'>
            @csrf
            <button type="submit" class="btn btn-light w-100 mt-3 text-dark">
                <i class="bi bi-box-arrow-right me-4"></i> Déconnexion
            </button>
        </form>
    </div>

    {{-- Contenu principal --}}
    <div class="main">
    @if(session('account_not_activated'))
    @include('partials.account-not-activated')
  @endif
        <div class="content">
            @yield('content')
        </div>
    </div>

</body>
</html>
