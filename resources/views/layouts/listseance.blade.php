@extends('dashboard')

@section('content')

   <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3> Séances</h3>
          </div>

          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <form action="{{ route('seances.list') }}" method="GET">
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
                <h2>Liste des Séances</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                  <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                          <p class="text-muted font-13 m-b-30"></p>
                          <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Heure début</th>
                                <th>Heure fin</th>
                                <th>Statut séance</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($seances as $seance)
                                <tr>
                                    <td>{{ $seance->Titre }}</td>
                                    <td>{{ $seance->Description }}</td>
                                    <td>{{ $seance->Date }}</td>
                                    <td>{{ $seance->Heure_debut }}</td>
                                    <td>{{ $seance->Heure_fin }}</td>
                                    <td>{{ $seance->Statut_seance }}</td>
                                    <td>
                                       <a href="{{ route('seances.show', $seance->id) }}" class="btn btn-info">Historique</a>
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
