@extends('dashboard')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Modifier un Compte Organisateur</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Modifier Compte Organisateur</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('compteOrganisateurs.update', $compteOrganisateurs->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Nom">Nom<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="Nom" name="Nom" value="{{ old('Nom', $compteOrganisateurs->Nom) }}" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Prenom">Prénom<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="Prenom" name="Prenom" value="{{ old('Prenom', $compteOrganisateurs->Prenom) }}" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Email">Email<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="email" id="Email" name="Email" value="{{ old('Email', $compteOrganisateurs->Email) }}" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="mot_de_passe">Mot de Passe<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control">
                                    <small>Si vous ne souhaitez pas modifier le mot de passe, laissez ce champ vide.</small>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Poste">Poste<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="Poste" name="Poste" value="{{ old('Poste', $compteOrganisateurs->Poste) }}" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
