@extends('back.app')

@section('title', 'Dashboard - Ajout d\'auteur')

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">Ajouter auteur</h3>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('author.store') }}" method="POST">
                @csrf
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nom</label>
                            <input
                                class="form-control"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
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
                                value="{{ old('email') }}"
                            />
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit ml-2">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
@endsection
