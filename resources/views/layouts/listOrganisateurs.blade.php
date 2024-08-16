@extends('dashboard')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Comptes Organisateurs</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <form action="{{ route('compteOrganisateurs.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Rechercher..." value="{{ request()->input('search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Liste des Comptes Organisateurs <small>Comptes Organisateurs</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        Liste des comptes organisateurs enregistrés
                                    </p>
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Email</th>
                                                <th>Poste</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($compteOrganisateurs as $compteOrganisateur)
                                                <tr>
                                                    <td>{{ $compteOrganisateur->Nom }}</td>
                                                    <td>{{ $compteOrganisateur->Prenom }}</td>
                                                    <td>{{ $compteOrganisateur->Email }}</td>
                                                    <td>{{ $compteOrganisateur->Poste }}</td>
                                                    <td>
                                                        <div style="display: flex;">
                                                            <a href="{{ route('compteOrganisateurs.edit', $compteOrganisateur->id) }}" class="btn btn-primary btn-sm mr-2">Modifier</a>
                                                            <form action="{{ route('compteOrganisateurs.destroy', $compteOrganisateur->id) }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte organisateur ?');">Supprimer</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
