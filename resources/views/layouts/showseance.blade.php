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
                            @if($seance->Type == ' En ligne')
                                <p><strong>Lien de Séance :</strong> <a href="{{ $seance->Lien_seance }}">{{ $seance->Lien_seance }}</a></p>
                            @endif
                            @if($seance->Type == 'presentiel')
                                <p><strong>Lieu :</strong> <a href="{{ $seance->lieu }}">{{ $seance->lieu }}</a></p>
                            @endif
                            @if($seance->Type == 'mixte')
                                <p><strong>Lieu :</strong> <a href="{{ $seance->lieu }}">{{ $seance->lieu }}</a></p
                                <p><strong>Lien de Seance :</strong> <a href="{{ $seance->Lien_seance }}">{{ $seance->Lien_seance }}</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tableau des participants -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Liste des Participants</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form id="participantsForm" action="{{ route('seance.add_participants', $seance->id) }}" method="POST">
                                @csrf
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Email</th>
                                            <th>Poste</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($participants as $participant)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="participants[]" value="{{ $participant->id }}"
                                                           @if(in_array($participant->id, $participantsAjoutesIds)) checked @endif>
                                                </td>
                                                <td>{{ $participant->Nom_participant }}</td>
                                                <td>{{ $participant->Prenom_participant }}</td>
                                                <td>{{ $participant->Email_participant }}</td>
                                                <td>{{ $participant->Poste_participant }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('participantsForm').addEventListener('submit', function(e) {
            // Vérifie si au moins une case à cocher est sélectionnée
            var checkboxes = document.querySelectorAll('input[name="participants[]"]');
            var checked = Array.from(checkboxes).some(checkbox => checkbox.checked);

            if (!checked) {
                // Empêche la soumission du formulaire
                e.preventDefault();
                alert('Veuillez sélectionner au moins un participant.');
            }
        });
    </script>
    @endpush
@endsection
