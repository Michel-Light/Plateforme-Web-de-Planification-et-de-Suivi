@extends('dashboard')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Modifier la Direction</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Modifier la Direction <small>Informations</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <form action="{{ route('directions.update', $direction->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="code_direction">Code Direction</label>
                                <input type="text" id="code_direction" name="Code_direction" class="form-control" value="{{ old('Code_direction', $direction->Code_direction) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="nom_direction">Nom Direction</label>
                                <input type="text" id="nom_direction" name="Nom_direction" class="form-control" value="{{ old('Nom_direction', $direction->Nom_direction) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="institution_id">Institution Associée</label>
                                <select id="institution_id" name="institution_id" class="form-control">
                                    <option value="">Sélectionner une Institution</option>
                                    @foreach($institutions as $institution)
                                        <option value="{{ $institution->id }}" {{ $direction->institution_id == $institution->id ? 'selected' : '' }}>
                                            {{ $institution->Nom_institution }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <a href="{{ route('directions.index') }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
