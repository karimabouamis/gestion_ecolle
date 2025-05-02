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
            background-color: #0d6efd;
            color: white;
            padding-top: 10px;
            position: fixed;
            width: 220px;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #0b5ed7;
        }

        .main {
            margin-left: 220px;
            padding-top: 5px;
        }

        .navbar {
            position: fixed;
            width: 100%;
            z-index: 1000;
            background-color: white;
            border-bottom: 1px solid #dee2e6;
            padding-top: 10px;
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
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">🎓 Système de gestion scolaire</span>
        </div>
    </nav>

    {{-- Barre latérale --}}
    <div class="sidebar">
        <h5 class="text-center mb-4">Menu principal</h5>
        <a href="{{route('dashboard')}}"><i class="bi bi-house-door-fill me-2"></i></i>Dashboard</a>
        <a href="enseignant"><i class="bi bi-person-fill me-2"></i> Enseignants</a>
        <a href="{{ route('eleve.index') }}"><i class="bi bi-people-fill me-2"></i> Élèves</a>
        <a href="{{ route('niveaux.index') }}"><i class="bi bi-graph-up-arrow me-2"></i>Niveaux</a>
        <a href="{{ route('salles.index') }}"><i class="bi bi-door-open me-2"></i>Salles</a>
        <a href="{{ route('matieres.index') }}"><i class="bi bi-journal-bookmark-fill me-2"></i> Matieres</a>
        <a href="{{ route('scolaires.index') }}"><i class="bi bi-calendar-week me-2"></i> Annee Scolaires</a>
        <a href="{{route('classe.index')}}"><i class="bi bi-building me-2"></i> Classes</a>
        <a href="{{route('evaluations.index')}}"><i class="bi bi-calendar-week me-2"></i>Evaluations</a>
        <a href=""><i class="bi bi-calendar-week me-2"></i>Notes</a>
        <a href=""><i class="bi bi-calendar-week me-2"></i> Enseignant Matiere</a>
         <form action="{{route('authlogout')}}"method='POST'>
            @csrf
            <button type="submit">Deconnexion</button>
         </form>



    </div>

    {{-- Contenu principal --}}
    <div class="main">
        <div class="content">
            @yield('content')
        </div>
    </div>

</body>
</html>
