@extends('layouts.app')
@section('content')
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="fw-bold text-black"> 👨‍🏫 Liste des utilisateurs</h1>
            <button type="button" class="btn btn-primary rounded-3" data-bs-toggle="modal" data-bs-target="#createUserModal">
                <i class="bi bi-plus-circle me-1"></i> Ajouter un utilisateur
            </button>
        </div>
        <div class="card shadow rounded-4 border-0">
            <div class="card-body p-4">
                <table
                    class="table table-hover align-middle text-center table-bordered table-striped rounded-4 overflow-hidden">
                    <thead class="table-primary">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->nom }}</td>
                                <td>{{ $user->prenom }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @switch($user->role)
                                        @case('admin')
                                            <span class="badge bg-danger">Admin</span>
                                        @break

                                        @case('enseignant')
                                            <span class="badge bg-success">Enseignant</span>
                                        @break

                                        @case('eleve')
                                            <span class="badge bg-info">Élève</span>
                                        @break

                                        @default
                                            <span class="badge bg-secondary">Utilisateur</span>
                                    @endswitch
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#editUserModal{{ $user->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteUserModal{{ $user->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        <i class="bi bi-info-circle text-primary fs-4"></i><br>
                                        Aucun utilisateur enregistré.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('users.create')

        @foreach ($users as $user)
            @include('users.edit', ['user' => $user])
            @include('users.delete', ['user' => $user])
        @endforeach
    @endsection