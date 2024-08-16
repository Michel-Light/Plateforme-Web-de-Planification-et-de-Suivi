@extends('dashboard')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Créer une séance</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Formulaire de Création</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="seanceForm" action="{{ route('seances.store') }}" method="POST">
                            @csrf
                           <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Titre<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="titre" required />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Description<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea class="form-control" name="description" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Type<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="presentiel" value="presentiel" required>
                                        <label class="form-check-label" for="presentiel">Présentiel</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="en_ligne" value="en_ligne" required>
                                        <label class="form-check-label" for="en_ligne">En ligne</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="mixte" value="mixte" required>
                                        <label class="form-check-label" for="mixte">Mixte (présentiel et en ligne)</label>
                                    </div>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Date<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="date" name="date" required>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Heure de Début<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="time" name="heure_debut" required>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Heure de Fin<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="time" name="heure_fin" required>
                                </div>
                            </div>
                            
                            <div class="field item form-group" id="lieu_field" style="display:none;">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Lieu</label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                       
                                            <select class="form-control" name="lieu_id" id="lieu_select">
                                             @foreach($lieux as $lieu)
                                                <Option value="{{$lieu ->id}}">{{$lieu ->Libelle_lieu}}</Option>
                                            @endforeach
                                            </select>
                                        
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajoutLieuModal">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field item form-group" id="lien_seance_field" style="display:none;">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Lien Seance</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="url" name="lien_seance">
                                </div>
                            </div> 

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour l'ajout d'un nouveau lieu -->
<div class="modal fade" id="ajoutLieuModal" tabindex="-1" role="dialog" aria-labelledby="ajoutLieuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutLieuModalLabel">Ajouter un nouveau lieu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="ajoutLieuForm">
                    <div class="form-group">
                        <label for="Code_lieu">Code Lieu</label>
                        <input type="text" class="form-control" id="Code_lieu" name="Code_lieu" required>
                    </div>
                    <div class="form-group">
                        <label for="Libelle_lieu">Libelle Lieu</label>
                        <input type="text" class="form-control" id="Libelle_lieu" name="Libelle_lieu" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        // Script pour afficher les champs selon le type de séance
        const typeInputs = document.querySelectorAll('input[name="type"]');
        const lieuField = document.getElementById('lieu_field');
        const lienSeanceField = document.getElementById('lien_seance_field');

        function updateFields() {
            lieuField.style.display = 'none';
            lienSeanceField.style.display = 'none';
            if (document.getElementById('presentiel').checked) {
                lieuField.style.display = 'flex';
            } else if (document.getElementById('en_ligne').checked) {
                lienSeanceField.style.display = 'flex';
            } else if (document.getElementById('mixte').checked) {
                lieuField.style.display = 'flex';
                lienSeanceField.style.display = 'flex';
            }
        }

        typeInputs.forEach(input => {
            input.addEventListener('change', updateFields);
        });

        updateFields();
    });

    function sendLieu() {
        var lieu = {
            Code_lieu: $("#Code_lieu").val(),  // Utilisez 'code_lieu' ici
            Libelle_lieu: $("#Libelle_lieu").val(),  
        }

        $('#ajoutLieuModal').modal('hide'); // Fermer le modal

        $.ajax({
            url: '{{ route('lieu.store') }}',
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: JSON.stringify(lieu),
            success: function (data) {
                alert('Lieu ajouté avec succès');
                // Mettre à jour la liste des lieux dans le select
                var newOption = new Option(data.lieu.Libelle_lieu, data.lieu.id, false, false);
                $('#lieu_select').append(newOption).trigger('change');
            },
            error: function (xhr, status, error) {
                alert('Erreur lors de l\'ajout du lieu : ' + error);
            }
        });
    }

    // Attacher l'événement au bouton d'enregistrement du modal
    $('#ajoutLieuForm').on('submit', function (e) {
        e.preventDefault(); // Empêcher le rechargement de la page
        sendLieu();
    });
</script>
@endsection
