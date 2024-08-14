@extends('dashboard')


@section('content')
<div class="right_col" role="main">
    <div class="">
       <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 >Bienvenue Sur la Plateforme </h1>
              <h2>Rechercher une Seance</h2>
              <div class="mid_center">
                <h3>Search</h3>
                <form>
                  <div class="  form-group pull-right top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Rechercher...">
                      <span class="input-group-btn">
                              <button class="btn btn-secondary" type="button">Search</button>
                          </span>
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


