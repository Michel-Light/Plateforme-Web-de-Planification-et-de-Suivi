@extends('dashboard')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
        <div class="row">
            <div class="col-md-12">
              <a href="{{ route('seances.show', $seance->id) }}" class="btn btn-primary">
                  <i class="fas fa-arrow-left"></i>
              </a>
            </div>
        </div>
            <div class="title_left">
                <h3>Détails de la Séance</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Détails de la Séance</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- Affichage des détails de la séance -->
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Titre : {{ $seance->Titre }}</h4>
                                <p><strong>Date :</strong> {{ $seance->Date }}</p>
                                <p><strong>Heure Début :</strong> {{ $seance->Heure_debut }}</p>
                                <p><strong>Heure Fin :</strong> {{ $seance->Heure_fin }}</p>
                            </div>
                        </div>

                        <!-- Affichage des participants ajoutés -->
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Participants Ajoutés</h4>
                                <div class="card-box table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Email</th>
                                                <th>Poste</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($participantsAjoutes as $participant)
                                            <tr>
                                                <td>{{ $participant->Nom_participant }}</td>
                                                <td>{{$participant->Prenom_participant }}</td>
                                                <td>{{ $participant->Email_participant }}</td>
                                                <td>{{ $participant->Poste_participant }}</td>

                                                <td>
                                                    <!-- Formulaire pour retirer le participant -->
                                                    <form action="{{ route('seance.remove_participant', [$seance->id, $participant->id]) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Retirer</button>
                                                    </form>
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
