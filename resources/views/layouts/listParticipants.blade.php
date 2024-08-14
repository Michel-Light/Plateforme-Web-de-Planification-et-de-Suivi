@extends('dashboard')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Participants</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <form action="{{ route('participants.list') }}" method="GET">
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
                        <h2>Liste des Participants</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Email</th>
                                                <th>Poste</th>
                                                <th>Téléphone</th>
                                                <th>Direction</th> <!-- Nouvelle colonne -->
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($participants as $participant)
                                                <tr>
                                                    <td>{{ $participant->Nom_participant }}</td>
                                                    <td>{{ $participant->Prenom_participant }}</td>
                                                    <td>{{ $participant->Email_participant }}</td>
                                                    <td>{{ $participant->Poste_participant }}</td>
                                                    <td>{{ $participant->Telephone_participant }}</td>
                                                    <td>{{ $participant->direction ? $participant->direction->Nom_direction : 'N/A' }}</td> <!-- Affichage de la direction -->
                                                    <td>
                                                        <!-- Ajoutez les boutons d'action ici -->
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
