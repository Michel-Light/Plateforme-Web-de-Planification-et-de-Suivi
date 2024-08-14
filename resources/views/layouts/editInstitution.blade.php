<!-- resources/views/institutions/edit.blade.php -->

@extends('dashboard')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Modifier l'Institution</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Modifier l'Institution</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <form action="{{ route('institutions.update', $institution->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="Code_institution">Code</label>
                                <input type="text" class="form-control" id="Code_institution" name="Code_institution" value="{{ old('Code_institution', $institution->Code_institution) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Nom_institution">Nom</label>
                                <input type="text" class="form-control" id="Nom_institution" name="Nom_institution" value="{{ old('Nom_institution', $institution->Nom_institution) }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <a href="{{ route('institutions.index') }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
