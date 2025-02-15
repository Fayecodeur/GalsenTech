@extends('back.app')

@section('title', isset($author) ? 'Modifier un auteur' : 'Ajouter un auteur')

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">{{ isset($author) ? "Modifier" : "Ajouter" }} un auteur</h3>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ isset($author) ? route('author.update', $author) : route('author.store') }}" method="POST">
                @csrf
                @if (isset($author))  <!-- Vérifie si on est en mode modification -->
                @method('PUT')
                @endif

                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nom</label>
                            <input
                                class="form-control"
                                type="text"
                                name="name"
                                value="{{ old('name', isset($author) ? $author->name : '') }}"
                            />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input
                                class="form-control"
                                type="email"
                                name="email"
                                value="{{ old('email', isset($author) ? $author->email : '') }}"
                            />
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary buttonedit ml-2">
                    {{ isset($author) ? "Mettre à jour" : "Enregistrer" }}
                </button>
            </form>
        </div>
    </div>
@endsection
