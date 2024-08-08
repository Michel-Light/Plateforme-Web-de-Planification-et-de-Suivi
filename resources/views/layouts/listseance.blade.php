@extends('dashboard')

@section('content')

   <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Default Example <small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Titre</th>
                          <th>Description</th>
                          <th>Date</th>
                          <th>Heure début</th>
                          <th>Heure fin</th>
                          <th>Statut_seance</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
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

                        
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>



@endsection