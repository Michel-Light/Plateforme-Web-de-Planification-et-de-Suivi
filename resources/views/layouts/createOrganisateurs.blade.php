@extends('dashboard')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Créer un Compte Organisateur</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Informations du Compte Organisateur</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('organisateurs.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nom" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Mot de Passe</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Mot de Passe" required>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Confirmer Mot de Passe</label>
                                <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirmer Mot de Passe" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Créer Compte</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
