@extends('back.app')

@section('title', 'Ajouter un réseau social')

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">Ajouter un réseau social</h3>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('social.store')}}" method="POST" >
                @csrf
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nom du réseau</label>
                            <input name="name"
                                   value="{{old('name')}}"
                                   class="form-control" type="text" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Lien</label>
                            <input name="link"
                                   value="{{old('link')}}"
                                   class="form-control"
                                   type="text" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Icône</label>
                            <input name="icon"
                                   value="{{old('icon')}}"
                                   class="form-control"
                                   type="text" />
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary buttonedit1">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
@endsection
