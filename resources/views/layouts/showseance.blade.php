@extends('dashboard')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Détails de la Séance</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ $seance->Titre }}</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <p><strong>Description :</strong> {{ $seance->Description }}</p>
                            <p><strong>Date :</strong> {{ $seance->Date }}</p>
                            <p><strong>Heure de Début :</strong> {{ $seance->Heure_debut }}</p>
                            <p><strong>Heure de Fin :</strong> {{ $seance->Heure_fin }}</p>
                            <p><strong>Type :</strong> {{ $seance->Type }}</p>
                            <p><strong>Lien de Séance :</strong> <a href="{{ $seance->Lien_seance }}">{{ $seance->Lien_seance }}</a></p>
                            <p><strong>Rapport :</strong> {{ $seance->Rapport }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
