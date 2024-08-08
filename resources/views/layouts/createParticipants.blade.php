@extends('dashboard')


@section('content')
<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Creer un Participant</h3>
						</div>

						
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Nouveau Participant <small>different form elements</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="nom">Nom<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="nom" required="required" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="prenom">Prenom <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="prenom" name="last-name" required="required" class="form-control">
											</div>
										</div>
										
										<div class="item form-group">
                                            
										<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email * :</label>
                                        <div class="col-md-6 col-sm-6 ">
										<input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required />
                                        </div>
								
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Poste <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="poste" class="date-picker form-control"  type="text" required="required" type="text" >
                                                	
											</div>
                                            
                                            
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Telephone <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="telephone" class="date-picker form-control"  type="text" required="required" type="text" > 
												
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Mot de Passe <span >*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="telephone" class="date-picker form-control"  type="password"  type="password" > 
												
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-success">Enregistrer</button>
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