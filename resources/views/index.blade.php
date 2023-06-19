<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from crm-admin-dashboard-template.multipurposethemes.com/university/vertical/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 11:38:38 GMT -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="images/Omega-logo.png">
	<title>Omega</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="src/css/vendors_css.css">

	<!-- Style-->
	<link rel="stylesheet" href="src/css/style.css">
	<link rel="stylesheet" href="src/css/skin_color.css">
	<link rel="stylesheet" href="{{asset('ijaboCropTool-master/ijaboCropTool.min.css')}}">


</head>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

	<div class="wrapper">
		<!-- <div id="loader"></div> -->



		@include("include.header")
		@include("include.aside")
	</div>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<div class="container-full">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="d-flex align-items-center">
					<div class="me-auto">

					</div>

				</div>
			</div>

			<!-- Main content -->
			<section class="content">
				<!-- Step wizard -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title light-logo fs-36 fw-700"><strong class="text-center">{{$preins->design_preins}} CANDIDAT</strong></h3>
					</div>
					<!-- Modal -->
					@if($data != true)
					<div class="modal center-modal fade" id="modal-center" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Mon BAC</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>

								<div class="modal-body">

									<div>
										<div id="error"></div>
										<div id="success"></div>

										<form action="" method="POST" id="periode_bac">
											@csrf
											<select name="type_bac" id="type_bac" class="form-control" required aria-required="Selectionner">
												<option value="">Type de BAC</option>
												<option value="1">BAC national</option>
												<option value="2">BAC Etranger</option>
											</select> <br>
											<div id="an">
												<label for=""> Année d'Obtention</label>
												<select name="annee" id="annee" class="form-control">
													<option value=''>Sélectionner l'année</option>
													<script>
														let an = "<option value=''>Sélectionner l'année</option>";
														for (var i = 1960; i <= 2023; i++) {
															an += '<option value=' + i + '>' + i + '</option>';
														}
														document.getElementById('annee').innerHTML = an;
													</script>




												</select>


											</div> <br>
											<div id="nine">
												<label for="">Nin</label>
												<input type="text" id="nin_bac" class="form-control" placeholder="Inserer votre nin conforme à votre relevet du bac ou attestation du bac" name="nin_bac">
											</div>
									</div>
								</div>
								<div class="modal-footer modal-footer-uniform">
									<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Quitter</button>
									<button type="submit" class="btn btn-success float-end">Enregistrer</button>
								</div>
								</form>
							</div>
						</div>
					</div>
					@endif
					<!-- /.modal -->
					<!-- /.box-header -->
					<div class="box-body wizard-content">
						<div class="tab-wizard wizard-circle">
							<!-- Step 1 -->
							<h6>Informations candidat</h6>
							<section id="xd" sec="222">
								@isset($messages)
								<div class="alert alert-danger">{{ $messages }}</div>
								@endisset
								@isset($data)
								@if ($data->statut==1 || $data->statut==2 || $data->statut==3 || $data->statut==4 || $data->statut==5 )
								<div class="container" id="info-data">
									<div class="row">
										<div class="col-md-6">
											<img src="photo/{{$data->photo}}" class="rounded mr-6" width="150px" height="150px" alt="">

										</div>
										<div class="col-md-6">
										</div>
									</div><br>
									<div class="row">
										<div class="col-md-6">
											<h6>Nin : <strong>{{ $data->nin}}</strong></h6>
										</div>
										<div class="col-md-6">
											<h5>Type de préinscription: <strong>{{ $recu->nom_type}}</strong></h5>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<h6>Nom: <strong>{{ $data->nom}}</strong></h6>
										</div>
										<div class="col-md-6">
											<h5>Prénom: <strong>{{ $data->prenom}}</strong></h5>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<h5>Lieu naissance: <strong>{{ $data->lieu_naiss}} </strong></h5>
										</div>
										<div class="col-md-6">
											<h5>Date naissance: <strong> {{ $data->date_naiss}} </strong></h5>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<h5>Adresse : <strong>{{ $data->adresse_cand}} </strong></h5>
										</div>
										<div class="col-md-6">
											<h5>Sexe: <strong> {{ $data->sexe}} </strong></h5>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<h5>Téléphone : <strong>{{ $data->tel_mobile}} </strong></h5>
										</div>
										<div class="col-md-6">
											<h5>Pays: <strong> {{ $data->pays}} </strong></h5>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<h5>Centre : <strong>{{ $data->centre}} </strong></h5>
										</div>
										<div class="col-md-6">
											<h5>Mention: <strong> {{ $data->mention}} </strong></h5>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<h5>Série : <strong>{{ $data->serie}} </strong></h5>
										</div>
										<div class="col-md-6">
											<h5>Année d'Obtention: <strong> {{ $data->annee}} </strong></h5>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<h5>Numéro attestation : <strong>{{ $data->num_attest}} </strong></h5>
										</div>

									</div>
								</div>

								@elseif($data->statut == NULL && $data->type_bac==1 && $data->nin != NULL)
								<div id="info" sec="1">
									<form action="{{route('accueil')}}" method="POST" enctype="multipart/form-data">
										@csrf
										<div id='erreur'></div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<label for="addressline1" class="form-label">Nin </label>
													<input type="text" class="form-control" id="nin" disabled value='{{$bachelier->NIN}}' required>
												</div>
											</div>
											@if($data->type_preins_id==2 || $data->type_preins_id==3)
											<div class="col-md-6">
												<div class="form-group">
													@error('matricule')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Matricule </label>
													<input type="text" class="form-control" id="matricule" name="matricule" value="{{$data->matricule}}" disabled required>
												</div>
											</div>
											@endif
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('type_preinscription')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="firstName5" class="form-label">Types de {{$preins->design_preins}} <span class="text-danger">*</span></label>
													<select class="form-control select2" data-validation-required-message="Ce champ est obligatoire" name="type_preinscription" id="type_preinscription" style="width: 100%;" required>
														<option value="">Sélectionner</option>
														@foreach ($type_recu as $recu )
														<option value="{{$recu->id_type}}">{{$recu->nom_type}}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('image')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="lastName1" class="form-label">Image <span class="text-danger">*</span></label>
													<input type="file" class="form-control" id="image" name="image" data-validation-required-message="Ce champ est obligatoire" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="firstName5" class="form-label">Nom </label>
													<input type="text" class="form-control" id="nom" name="nom" value="{{$bachelier->Nom}}" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="lastName1" class="form-label">Prénom </label>
													<input type="text" class="form-control" id="prenom" name="prenom" value="{{$bachelier->Prenom}}" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="emailAddress1" class="form-label">Date de naissance </label>
													<input type="text" class="form-control" id="date_naissance" name="date_naissance" disabled value="{{$bachelier->Date_nais}}" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="phoneNumber1" class="form-label">Lieu de naissance </label>
													<input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" disabled value="{{$bachelier->Lieu_nais}}" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('sexe')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline2" class="form-label">Sexe <span class="text-danger">*</span> </label>
													<select name="sexe" data-validation-required-message="Ce champ est obligatoire" id="sexe" class="form-control" required>
														<option value="">Sélectionner le sexe</option>
														<option value="M">M</option>
														<option value="F">F</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('adresse')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" data-validation-required-message="Ce champ est obligatoire" class="form-label">Adresse <span class="text-danger">*</span></label>
													<input type="text" class="form-control" name="adresse" id="adresse" value="{{old('adresse')}}" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('pays')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Pays <span class="text-danger">*</span></label>
													<select name="pays" id="pays" data-validation-required-message="Ce champ est obligatoire" class="form-control" required>
														<option value="">Sélectionner le pays</option>
														@foreach ($pays as $pay )
														<option value="{{$pay->nom_fr_fr}}">{{$pay->nom_fr_fr}}</option>

														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('telephone')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline2" class="form-label">Téléphone <span class="text-danger">*</span></label>
													<input type="text" class="form-control" data-validation-required-message="Ce champ est obligatoire" value="{{old('telephone')}}" name="telephone" id="telephone" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="addressline1" class="form-label">Série </label>
													<input type="text" class="form-control" id="serie" name="serie" value="{{$bachelier->Serie}}" disabled required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="addressline2" class="form-label">Mention </label>
													<input type="text" class="form-control" id="mention" name="mention" value="{{$bachelier->Mention}}" disabled required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="addressline1" class="form-label">Centre </label>
													<input type="text" class="form-control" id="centre" name="centre" value="{{$bachelier->Centre}}" disabled required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="addressline2" class="form-label">Année d'obtention </label>
													<input type="text" class="form-control" id="annee" name="annee" disabled value="{{$bachelier->annee}}" required>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="addressline1" class="form-label">Numéro d'attestation </label>
													<input type="text" class="form-control" id="num_attest" value="{{$bachelier->Num_Attest}}" disabled required>
												</div>
											</div>

										</div>

										<div class="row" id="button">
											<div class="col-md-2">
												<div class="form-group">
													<input type="submit" class="form-control btn-success" id="addressline1" value="Enregistrer">
												</div>
											</div>

										</div>
									</form>
								</div>
								@elseif($data->statut == NULL && $data->type_bac==1 && $data->nin == NULL)
								<div id="info" sec="1">
									<form action="{{route('accueil')}}" method="POST" enctype="multipart/form-data">
										@csrf
										<div id='erreur'></div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('nin')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Nin <span class="text-danger">*</span></label>
													<input type="text" class="form-control" name="nin" id="nin" required data-validation-required-message="Ce champ est obligatoire">
												</div>
											</div>
											@if($data->type_preins_id==2 || $data->type_preins_id==3)
											<div class="col-md-6">
												<div class="form-group">
													@error('matricule')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Matricule </label>
													<input type="text" class="form-control" id="matricule" name="matricule" value="{{$data->matricule}}" disabled required>
												</div>
											</div>
											@endif
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('type_preinscription')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="firstName5" class="form-label">Types de {{$preins->design_preins}} <span class="text-danger">*</span></label>
													<select class="form-control select2" style="width: 100%;" required data-validation-required-message="Ce champ est obligatoire" name="type_preinscription" id="type_preinscription">
														<option value="">Sélectionner</option>
														@foreach ($type_recu as $recu )
														<option value="{{$recu->id_type}}">{{$recu->nom_type}}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('image')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="lastName1" class="form-label">Image <span class="text-danger">*</span></label>
													<input type="file" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="image" name="image" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('nom')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="firstName5" class="form-label">Nom <span class="text-danger">*</span></label>
													<input type="text" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="nom" name="nom" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('prenom')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="lastName1" class="form-label">Prénom <span class="text-danger">*</span></label>
													<input type="text" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="prenom" name="prenom" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('date_naissance')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="emailAddress1" class="form-label">Date de naissance <span class="text-danger">*</span></label>
													<input type="date" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="date_naissance" name="date_naissance" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('lieu_naissance')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="phoneNumber1" class="form-label">Lieu de naissance <span class="text-danger">*</span></label>
													<input type="text" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="lieu_naissance" name="lieu_naissance" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('sexe')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline2" class="form-label">Sexe <span class="text-danger">*</span></label>
													<select name="sexe" id="sexe" data-validation-required-message="Ce champ est obligatoire" class="form-control" required>
														<option value="">Sélectionner le sexe</option>
														<option value="M">M</option>
														<option value="F">F</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('adresse')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Adresse <span class="text-danger">*</span></label>
													<input type="text" data-validation-required-message="Ce champ est obligatoire" class="form-control" name="adresse" id="adresse" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('pays')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Pays <span class="text-danger">*</span></label>
													<select name="pays" id="pays" class="form-control" data-validation-required-message="Ce champ est obligatoire" required>
														<option value="">Sélectionner le pays</option>
														@foreach ($pays as $pay )
														<option value="{{$pay->nom_fr_fr}}">{{$pay->nom_fr_fr}}</option>

														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('telephone')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline2" class="form-label">Téléphone <span class="text-danger">*</span></label>
													<input type="text" class="form-control" data-validation-required-message="Ce champ est obligatoire" name="telephone" id="telephone" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('serie')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Série <span class="text-danger">*</span></label>
													<input type="text" data-validation-required-message="Ce champ est obligatoire" class="form-control" id="serie" name="serie" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('mention')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline2" class="form-label">Mention <span class="text-danger">*</span></label>
													<input type="text" data-validation-required-message="Ce champ est obligatoire" class="form-control" id="mention" name="mention" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('centre')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Centre <span class="text-danger">*</span></label>
													<input type="text" data-validation-required-message="Ce champ est obligatoire" class="form-control" id="centre" name="centre" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('annee')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline2" class="form-label">Année d'obtention</label>
													<input type="text" class="form-control" id="annee" name="annee" value="{{$data->annee}}" disabled required>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('num_attest')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Numéro d'attestation <span class="text-danger">*</span></label>
													<input type="text" data-validation-required-message="Ce champ est obligatoire" class="form-control" name="num_attest" id="num_attest" required>
												</div>
											</div>

										</div>

										<div class="row" id="button">
											<div class="col-md-2">
												<div class="form-group">
													<input type="submit" class="form-control btn-success" id="addressline1" value="Enregistrez">
												</div>
											</div>

										</div>
									</form>
								</div>
								@elseif($data->statut == NULL && $data->type_bac==2)
								<div id="info" sec="1">
									<form action="{{route('accueil')}}" method="POST" enctype="multipart/form-data">
										@csrf
										<div id='erreur'></div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('nin')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Nin <span class="text-danger">*</span></label>
													<input type="text" class="form-control" data-validation-required-message="Ce champ est obligatoire" value="{{old('nin')}}" name="nin" id="nin" required>
												</div>
											</div>
											@if($data->type_preins_id==2 || $data->type_preins_id==3)
											<div class="col-md-6">
												<div class="form-group">
													@error('matricule')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Matricule </label>
													<input type="text" class="form-control" id="matricule" name="matricule" value="{{$data->matricule}}" disabled required>
												</div>
											</div>
											@endif
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('type_preinscription')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="firstName5" class="form-label">Types de {{$preins->design_preins}} <span class="text-danger">*</span></label>
													<select class="form-control select2" data-validation-required-message="Ce champ est obligatoire" style="width: 100%;" name="type_preinscription" id="type_preinscription" required>
														<option value="">Sélectionner</option>
														@foreach ($type_recu as $recu )
														<option value="{{$recu->id_type}}">{{$recu->nom_type}}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('image')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="lastName1" class="form-label">Image <span class="text-danger">*</span> </label>
													<input type="file" data-validation-required-message="Ce champ est obligatoire" class="form-control" id="image" name="image" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('nom')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="firstName5" class="form-label">Nom <span class="text-danger">*</span></label>
													<input type="text" data-validation-required-message="Ce champ est obligatoire" class="form-control" value="{{old('nom')}}" id="nom" name="nom" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('prenom')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="lastName1" class="form-label">Prénom <span class="text-danger">*</span></label>
													<input type="text" data-validation-required-message="Ce champ est obligatoire" class="form-control" value="{{old('prenom')}}" id="prenom" name="prenom" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('date_naissance')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="emailAddress1" class="form-label">Date de naissance <span class="text-danger">*</span></label>
													<input type="date" data-validation-required-message="Ce champ est obligatoire" class="form-control" value="{{old('date_naissance')}}" id="date_naissance" name="date_naissance" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('lieu_naissance')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="phoneNumber1" class="form-label">Lieu de naissance <span class="text-danger">*</span></label>
													<input type="text" data-validation-required-message="Ce champ est obligatoire" class="form-control" value="{{old('lieu_naissance')}}" id="lieu_naissance" name="lieu_naissance" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('sexe')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline2" class="form-label">Sexe <span class="text-danger">*</span></label>
													<select name="sexe" id="sexe" class="form-control" data-validation-required-message="Ce champ est obligatoire" required>
														<option value="">Sélectionner le sexe</option>
														<option value="M">M</option>
														<option value="F">F</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('adresse')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Adresse <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="adresse" value="{{old('adresse')}}" data-validation-required-message="Ce champ est obligatoire" name="adresse" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('pays')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Pays <span class="text-danger">*</span></label>
													<select name="pays" id="pays" class="form-control" required data-validation-required-message="Ce champ est obligatoire">
														<option value="">Sélectionner le pays</option>
														@foreach ($pays as $pay )
														<option value="{{$pay->nom_fr_fr}}">{{$pay->nom_fr_fr}}</option>

														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('telephone')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline2" class="form-label">Téléphone <span class="text-danger">*</span></label>
													<input type="text" class="form-control" data-validation-required-message="Ce champ est obligatoire" value="{{old('telephone')}}" id="telephone" name="telephone" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('serie')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Série <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="serie" data-validation-required-message="Ce champ est obligatoire" value="{{old('serie')}}" name="serie" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													@error('mention')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline2" class="form-label">Mention <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="mention" data-validation-required-message="Ce champ est obligatoire" value="{{old('mention')}}" name="mention" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													@error('centre')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													<label for="addressline1" class="form-label">Centre <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="centre" data-validation-required-message="Ce champ est obligatoire" value="{{old('centre')}}" name="centre" required>
												</div>
											</div>
											<div class="col-md-6">
												@error('annees')
												<div class="alert alert-danger">{{ $message }}</div>
												@enderror
												<div class="form-group">
													<label for="addressline2" class="form-label">Année d'obtention <span class="text-danger">*</span></label>

													<select id="annees" name="annees" class="form-control" data-validation-required-message="Ce champ est obligatoire">
														<option value="">Sélectionner l'année</option>
														<script>
															let ane = '';
															for (var i = 1960; i <= 2023; i++) {
																ane += '<option value=' + i + '>' + i + '</option>';
															}
															document.getElementById('annees').innerHTML = ane;
														</script>




													</select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="addressline1" class="form-label">Numéro d'attestation <span class="text-danger">*</span> </label>
													<input type="text" class="form-control" data-validation-required-message="Ce champ est obligatoire" name="num_attest" id="num_attest" value="{{old('num_attest')}}" required>
												</div>
											</div>

										</div>

										<div class="row" id="button">
											<div class="col-md-2">
												<div class="form-group">
													<input type="submit" class="form-control btn-success" id="addressline1" value="Enregistrez">
												</div>
											</div>

										</div>
									</form>
								</div>
								@else
								<div> Recharger votre page pour préciser les informations</div>
								@endif
								@endisset

							</section>
							<!-- Step 2 -->
							<h6>Choix de filières</h6>
							<section id="c">
								<div id="fili" sec="2">
									<div id="fillie"></div>
									<div id="messagef"></div>
									<form action="" method="POST" id="filiere">
										@csrf
										<div class="row" id="choix1">
											<div class="col-md-3">
												<div class="form-group">
													<label class="form-label">1er Choix <br> <br> Composantes <span class="text-danger">*</span></label>
													<select class="form-control select2" id="composante1" name="composante1" style="width: 100%;">
														

													</select>

												</div>
												<div class="form-group">
													<label class="form-label">Départements <span class="text-danger">*</span></label>
													<select class="form-control select2" id="departement1" name="departement1" style="width: 100%;">
														<option value="">Sélectionner</option>
													</select>
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group">
													<label class="form-label">2ème choix <br> <br> Composantes <span class="text-danger">*</span></label>
													<select class="form-control select2" id="composante2" name="composante2" style="width: 100%;">
														<option>Sélectionner</option>

													</select>
												</div>
												<div class="form-group">
													<label class="form-label">Départements <span class="text-danger">*</span></label>
													<select class="form-control select2" id="departement2" name="departement2" style="width: 100%;">
														<option value="">Sélectionner</option>
													</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="form-label">3ème choix <br> <br> Composantes <span class="text-danger">*</span></label>
													<select class="form-control select2" style="width: 100%;" id="composante3" name="composante3">
														<option>Sélectionner</option>

													</select>
												</div>
												<div class="form-group">
													<label class="form-label">Départements <span class="text-danger">*</span></label>
													<select class="form-control select2" id="departement3" name="departement3" style="width: 100%;">
														<option value="">Sélectionner</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row" id="choix2">
											<div class="col-md-3">
												<div class="form-group">
													<label class="form-label">1er choix <br> <br> Composantes <span class="text-danger">*</span></label>
													<select class="form-control select2" style="width: 100%;" id="composante" name="composante">
														<option>Sélectionner</option>


													</select>
												</div>
												<div class="form-group">
													<label class="form-label">Départements <span class="text-danger">*</span></label>
													<select class="form-control select2" style="width: 100%;" name="departement" id="departement">
														<option value="">Sélectionner</option>

													</select>
												</div>
											</div>
										</div>

										<div class="row" id="buttonf">
											<div class="col-md-2">
												<div class="form-group">
													<input type="submit" class="form-control btn-success" value="Enregistrer">
												</div>
											</div>

										</div>

									</form>
								</div>
							</section>
							<!-- Step 3 -->
							<h6>Documents</h6>
							<section id="3">
								<div id="dossier" sec="3">
									<div id="messaged"></div>docu
									<form action="" method="post" id="document">
										@csrf
										<div class="row">

											<div id="docs"></div>
											<div class="col-lg-6 col-12" id="doc">
												<label for="formFile" class="form-label">Mes dossiers</label>
												<input class="form-control" type="file" id="document" name="document" required> <br>

												<input type="submit" id="buttond" class="form-control btn-sm btn-success" value="Enregistrez">
											</div>


											<div class="col-lg-6 col-12" id="do">
												<div class="box">
													<div class="box-header with-border">
														<h1 class="box-title"><strong>Nota Bene </strong></h1>
													</div>
													<!-- /.box-header -->

													<div class="box-body" id="licence">

														<!-- <hr class="my-15"> -->
														<p>- Le candidat désirant s'inscrire à un concours doit choisir un seul et unique département parmi les départements exigeant un concours d'entrée</p>
														<p>- Les 2 autres choix porteront sur des départements de facultés.</p>
														<h6><strong> Vous êtes prié(e)s de joindre vos documents dans un seul fichier pdf en suivant cet ordre. </strong></h6>
														<div class="row">
															<ul>
																<li>Copie certifiée du Relevé des notes au BAC.</li>
																<li>Copies certifiées des bulletins de notes du 3ème trimestre des classes de 2nde ,1ère et Terminale.</li>
																<li>Copie certifiée de l’Attestation de réussite au Bac.</li>
																<li>Pour la 2ème ou 3ème année universitaire, les copies certifiées de l’Attestation de Diplôme et du relevé des notes justifiant l’inscription.</li>
																<li>L’extrait de naissance ou Fiche individuelle d’Etat civil de moins de 3 mois.</li>
																<li>Copie certifiée du titre de séjour pour les étrangers.</li>

															</ul>
														</div>
													</div>
													<div class="box-body" id="master">

														<!-- <hr class="my-15"> -->
														<h6><strong> Vous êtes prié(e)s de joindre vos documents dans un seul fichier pdf en suivant cet ordre. </strong></h6>
														<div class="row">
															<ul>
																<li>Copie certfiée du BAC pour les primo entrants.</li>
																<li>Copie certifiée du diplôme universitaire, de l′attestation de réussite à la Licence ou au Master 1.</li>
																<li>Copies certifiées conformes des Relevés des notes de 3éme année de Licence ou du Master .</li>
																<li>Extrait de naissance pour les primo entrants.</li>

																<li>Attestation de séjour en cours de validité et couvrant l′année pour les candidats étrangers</li>
															</ul>
														</div>
													</div>
													<div class="box-body" id="transfert">

														<!-- <hr class="my-15"> -->
														<h6><strong> Vous êtes prié(e)s de joindre vos documents dans un seul fichier pdf en suivant cet ordre. </strong></h6>
														<div class="row">
															<ul>
																<li>- Photocopie du relevet des notes annuelles justifiant le niveau d'études acquis</li>

															</ul>
														</div>
													</div>
													<div class="box-body" id="reprise">

														<!-- <hr class="my-15"> -->
														<h6><strong> Vous êtes prié(e)s de joindre vos documents dans un seul fichier pdf en suivant cet ordre. </strong></h6>
														<div class="row">
															<ul>
																<li>- Photocopie du relevet des notes annuelles justifiant le niveau d'études acquis</li>
														</div>
													</div>

									</form>
								</div>
								<!-- /.box -->
						</div>
					</div>


				</div>
			</section>
			<!-- Step 4 -->
			<h6>Paiement</h6>
			<section sec="4" id="4">

				<div id="fil" sec="4">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="box" id="infoP">

							</div>
							<!-- /.box -->
						</div>

						<div class="col-lg-6 col-12">
							<div class="box" id="choixf">
								<div class="box-header with-border">
									<h4 class="box-title">Mes choix de filières</h4>
								</div>

							</div>
							<!-- /.box -->
						</div>
					</div>
				</div>
				<div class="col-md-4" id="paye">
					<form method="post" action="{{url('https://26900.tagpay.fr/online/online.php')}}">
						@csrf
						<input type="hidden" name="sessionid" value="{{$sessionId}}">
						<input type="hidden" name="merchantid" value="2274832632922162">
						<input type="hidden" name="amount" value="5000">
						<input type="hidden" name="currency" value="174">
						<input type="hidden" name="purchaseref" value="{{$data->user_candidat_id}}">
						<input type="hidden" name="accepturl" value="http://omega-xd.univ-comores.km/accepturl">
						<input type="hidden" name="cancelurl" value="http://omega-xd.univ-comores.km/cancelurl">
						<input type="hidden" name="declineurl" value="http://omega-xd.univ-comores.km/declineurl">
						<input type="submit" class="btn btn-sm btn-success" name="ok" value="Payer via Holo">

					</form>
				</div>


			</section>
		</div>
	</div>
	<!-- /.box-body -->
	</div>
	<!-- /.box -->



	</section>
	<!-- /.content -->
	</div>
	</div>
	<!-- /.content-wrapper -->





	<!-- Page Content overlay -->

	<script src="//code.jquery.com/jquery.js"></script>
	<script src="src/js/jquery.min.js"></script>

	<!-- Vendor JS -->
	<script src="src/js/vendors.min.js"></script>
	<script src="src/js/pages/chat-popup.js"></script>
	<script src="assets/icons/feather-icons/feather.min.js"></script>
	<script src="assets/vendor_components/jquery-steps-master/build/jquery.steps.js"></script>
	<script src="assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
	<script src="assets/vendor_components/sweetalert/sweetalert.min.js"></script>
	<!-- CRMi App -->
	<script src="src/js/template.js"></script>

	<script src="src/js/pages/steps.js"></script>

	<script>
		$(document).ready(function() {

			// $("#infoP").remove();
			// $("#choixf").hide();
			$("#paye").hide();

			$("#choix1").hide();
			$("#choix2").hide();

			$("#licence").hide();
			$("#master").hide();

			$("#transfert").hide();
			$("#reprise").hide();

			$('section').click(function(event) {
				event.stopPropagation();
				var id = event.target.id.substr(4);
				console.log(id);
				if (id == 1) {
					$.ajax({
						_token: '{{csrf_token()}}',
						type: "GET",
						// url:"{{url('getCorps')}}?country_id="+countryID,
						url: "{{route('filiere')}}",
						data: id,
						dataType: 'json',

						success: function(data) {
							if (data) {
								// $("#sec_filiere").html();
								// alert(data);
								jQuery.each([data], function(i, val, fa, x) {
									console.log(data.faculte);
									if (data.data.statut == null) {

										$("#buttonf").hide();
										$("#fillie").empty();
										$("#fillie").append("<div id='rubrique'> Veuillez d'abord enregistrer  la rubrique précédente</div>");
									} else if (data.data.statut == 1) {

										if (data.data.id_type == 1) {

											// $("#choix1").append("<p>choix1</p>");
											$("#composante1").empty();
											$("#composante2").empty();
											$("#composante3").empty();
											$("#composante1").append("<option>Sélectionner</option>");
											$("#composante2").append("<option>Sélectionner</option>");
											$("#composante3").append("<option>Sélectionner</option>");

											$("#choix1").show();
											$("#rubrique").remove();
											$("#buttonf").show();
											$.each(data.faculte, function(x, da) {
												$("#composante1").append("<option value=" + da.code_facult + ">" + da.design_facult + "</option>");
												$("#composante2").append("<option value=" + da.code_facult + ">" + da.design_facult + "</option>");
												// $("#composante3").append("<option value=" + da.code_facult + ">" + da.design_facult + "</option>");


											});
											$.each(data.facultes, function(x, das) {
												$("#composante3").append("<option value=" + das.code_facult + ">" + das.design_facult + "</option>");

											});

											$("#composante1").change(function() {
												var composante1 = $(this).val();

												$.ajax({
													type: "POST",
													// url:"{{url('getCorps')}}?country_id="+countryID,
													url: "{{route('getDepartement1')}}",
													data: {
														composante1: composante1,
														_token: '{{csrf_token()}}'
													},
													// data: composante1,
													dataType: 'json',
													// _token: '{{csrf_token()}}',

													success: function(res) {

														$("#departement1").empty();

														if (res) {
															$.each(res, function(key, value) {
																$("#departement1").append('<option value="' + key + '">' + value + '</option>');
															});
															// $("#departement1").append("<option></option>");
															// $.each(res, function(key, value) {
															// 	$("#info").append('<div>Insertion reussi</div>');
															// });

														} else {
															$("#departement1").append("<option>Departement indisponible</option>");
														}
													}
												});
											})

											$("#composante2").change(function() {
												var composante2 = $(this).val();

												$.ajax({
													type: "POST",
													// url:"{{url('getCorps')}}?country_id="+countryID,
													url: "{{route('getDepartement2')}}",
													data: {
														composante2: composante2,
														_token: '{{csrf_token()}}'
													},
													// data: composante1,
													dataType: 'json',
													// _token: '{{csrf_token()}}',

													success: function(res) {

														$("#departement2").empty();

														if (res) {
															$.each(res, function(key, value) {
																$("#departement2").append('<option value="' + key + '">' + value + '</option>');
															});
															// $("#departement1").append("<option></option>");
															// $.each(res, function(key, value) {
															// 	$("#info").append('<div>Insertion reussi</div>');
															// });

														} else {
															$("#departement2").append("<option>Departement indisponible</option>");
														}
													}
												});
											});

											$("#composante3").change(function() {
												var composante3 = $(this).val();

												$.ajax({
													type: "POST",
													// url:"{{url('getCorps')}}?country_id="+countryID,
													url: "{{route('getDepartement3')}}",
													data: {
														composante3: composante3,
														_token: '{{csrf_token()}}'
													},
													// data: composante1,
													dataType: 'json',
													// _token: '{{csrf_token()}}',

													success: function(res) {

														$("#departement3").empty();

														if (res) {
															$.each(res, function(key, value) {
																$("#departement3").append('<option value="' + key + '">' + value + '</option>');
															});
															// $("#departement1").append("<option></option>");
															// $.each(res, function(key, value) {
															// 	$("#info").append('<div>Insertion reussi</div>');
															// });

														} else {
															$("#departement3").append("<option>Departement indisponible</option>");
														}
													}
												});
											});



										} else {

											$("#composante").empty();
											$("#choix2").show();
											$("#rubrique").remove();
											$("#buttonf").show();
											$.each(data.facultes, function(x, da) {
												console.log(data.facultes);
												$("#composante").append("<option value=" + da.code_facult + ">" + da.design_facult + "</option>");

											});

											$("#composante").change(function() {
												var composante = $(this).val();

												$.ajax({
													type: "POST",
													// url:"{{url('getCorps')}}?country_id="+countryID,
													url: "{{route('getDepartement')}}",
													data: {
														composante: composante,
														_token: '{{csrf_token()}}'
													},
													// data: composante1,
													dataType: 'json',
													// _token: '{{csrf_token()}}',

													success: function(res) {

														$("#departement").empty();

														if (res) {
															$.each(res, function(key, value) {
																$("#departement").append('<option value="' + key + '">' + value + '</option>');
															});
															// $("#departement1").append("<option></option>");
															// $.each(res, function(key, value) {
															// 	$("#info").append('<div>Insertion reussi</div>');
															// });

														} else {
															$("#departement").append("<option>Departement indisponible</option>");
														}
													}
												});
											});





										}
									} else if (data.data.statut == 2 || data.data.statut == 3 || data.data.statut == 4 || data.data.statut == 5) {
										$.ajax({
											_token: '{{csrf_token()}}',
											type: "GET",
											// url:"{{url('getCorps')}}?country_id="+countryID,
											url: "{{route('info_fili')}}",
											data: id,
											dataType: 'json',

											success: function(data) {
												if (data) {
													// $("#sec_filiere").html();
													// alert(data);
													jQuery.each(data, function(i, val) {
														console.log(data.data.id_type);
														$("#buttonf").empty();
														$("#fili").empty();
														if (data.data.id_type == 1) {
															$("#fili").append("<div class='box-body'><h6>Choix 1 :</h6><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : <strong>" + data.departement1.design_facult + " </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département : <strong> " + data.departement1.design_depart + " </strong></label><label class='form-label'></label></div></div></div><h6>Choix 2: </h6><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : <strong>" + data.departement2.design_facult + "</strong> </label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département : <strong> " + data.departement2.design_depart + " </strong></label><label class='form-label'></label></div></div></div><h6>Choix 3: </h6><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : <strong> " + data.departement3.design_facult + " </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département : <strong> " + data.departement3.design_depart + "</strong></label><label class='form-label'></label></div></div></div></div>")

														} else {
															$("#fili").append("<div class='box-body'><h6>Choix 1 :</h6><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : <strong>" + data.departement.design_facult + " </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département : <strong> " + data.departement.design_depart + " </strong></label><label class='form-label'></label></div></div></div><div class='row'><div class='col-md-6'></div></div></div></div>")
														}
													});


												} else {
													console.log("nope");
												}
											}
										});
									}


								});


							} else {
								console.log("nope");
							}
						}
					});
				} else if (id == 2) {
					$.ajax({
						_token: '{{csrf_token()}}',
						type: "GET",
						// url:"{{url('getCorps')}}?country_id="+countryID,
						url: "{{route('showDoc')}}",
						data: id,
						dataType: 'json',

						success: function(data) {
							if (data) {
								jQuery.each([data], function(i, val, fa, x) {
									if (data.statut == null) {
										// console.log(data.statut);
										$("#docs").empty();
										$("#doc").hide();
										$("#do").hide();
										$("#buttond").hide();
										$("#docs").append("Veuillez remplir les rubrique précédentes");
									} else if (data.statut == 1) {

										// console.log(data.statut);
										console.log(data.id_type);
										$("#docs").empty();
										$("#doc").hide();
										$("#do").hide();
										$("#buttond").hide();
										$("#docs").append("Veuillez remplir la rubrique choix des filières");

									} else if (data.statut == 2) {

										// console.log(data.statut);
										console.log(data.id_type);
										$("#dossier").show();
										$("#doc").show();
										$("#do").show();
										$("#buttond").show();
										$("#docs").empty();
										if (data.id_type == 1 || data.id_type == 2 || data.id_type == 3) {
											$("#licence").show();
										} else if (data.id_type == 41 || data.id_type == 42 || data.id_type == 43) {
											$("#transfert").show();
										} else if (data.id_type == 51 || data.id_type == 52 || data.id_type == 53 || data.id_type == 56 || data.id_type == 57) {
											$("#reprise").show();
										} else if (data.id_type == 6 || data.id_type == 7) {
											$("#master").show();

										}
									} else if (data.statut == 3 || data.statut == 4 || data.statut == 5) {

										$("#doc").empty();
										$("#do").empty();
										$("#docs").empty();

										// $("#docs").append("Votre document est bien chargé");
										$("#docs").append("<embed  src='document/" + data.document + "' width=800 height=500 type='application/pdf' /><br><br><p class=><a href={{route('dossier',$data->user_candidat_id) }} target='_blank'>Voir plus</a></p>");
										// $("#docs").hide();


									}

								});
							}
						}
					})
				} else if (id == 3) {
					$.ajax({
						_token: '{{csrf_token()}}',
						type: "GET",
						// url:"{{url('getCorps')}}?country_id="+countryID,
						url: "{{route('getInfo')}}",
						data: id,
						dataType: 'json',

						success: function(data) {

							jQuery.each([data], function(i, val, fa, x) {
								// console.log(data.departement.design_facult)
								if (data.candidat.statut == 3 || data.candidat.statut == 4 || data.candidat.statut == 5) {
									if (data.candidat.id_type == 1) {
										$("#infoP").empty();
										$("#choixf").empty();
										$("#infoP").append("<div class='box-header with-border'><h4 class='box-title'>Mes informations personnelles </h4></div><form class='form' ><div class='box-body'><h4 class='box-title text-success mb-0'><i class='ti-user me-15'></i> Info</h4><hr class='my-15'><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Nom : <strong> " + data.candidat.nom + " </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Prénom : <strong> " + data.candidat.prenom + " </strong></label><label class='form-label'></label></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Date de naissance : <strong> " + data.candidat.date_naiss + " </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Lieu de naissance: <strong>" + data.candidat.lieu_naiss + " </strong></label><label class='form-label'></label></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Mention : <strong>" + data.candidat.mention + " </strong> </label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Série : <strong> " + data.candidat.serie + " </strong></label><label class='form-label'></label></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Adresse : <strong> " + data.candidat.adresse_cand + " </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Téléphone : <strong> " + data.candidat.tel_mobile + " </strong></label><label class='form-label'></label></div></div></div><div class='form-group'></div></div></form>");
										$("#choixf").append("<form class='form'><div class='box-body'><h4 class='box-title text-dark mb-0'>Type de préinscription : <strong> " + data.recu.nom_type + " </strong></h4> <br> <h6>Choix 1 :</h6><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : " + data.departement1.design_facult + "</label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département : " + data.departement1.design_depart + "</label><label class='form-label'></label></div></div></div><h6>Choix 2: </h6><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : " + data.departement2.design_facult + "</label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département : " + data.departement2.design_depart + "</label><label class='form-label'></label></div></div></div><h6>Choix 3: </h6><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : " + data.departement3.design_facult + "</label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département : " + data.departement3.design_depart + "</label><label class='form-label'></label></div></div></div></div></form>")
										if (data.candidat.statut == 4 || data.candidat.statut == 5) {
											$("#paye").hide();

										} else {
											$("#paye").show();

										}

									} else {
										$("#infoP").empty();
										$("#choixf").empty();
										$("#infoP").append("<div class='box-header with-border'><h4 class='box-title'>Mes informations personnelles </h4></div><form class='form' ><div class='box-body'><h4 class='box-title text-success mb-0'><i class='ti-user me-15'></i> Info</h4><hr class='my-15'><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Nom : <strong> " + data.candidat.nom + " </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Prénom : <strong> " + data.candidat.prenom + " </strong></label><label class='form-label'></label></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Date de naissance : <strong> " + data.candidat.date_naiss + " </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Lieu de naissance: <strong>" + data.candidat.lieu_naiss + " </strong></label><label class='form-label'></label></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Mention : <strong>" + data.candidat.mention + " </strong> </label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Série : <strong> " + data.candidat.serie + " </strong></label><label class='form-label'></label></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Adresse : <strong> " + data.candidat.adresse_cand + " </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Téléphone : <strong> " + data.candidat.tel_mobile + " </strong></label><label class='form-label'></label></div></div></div><div class='form-group'></div></div></form>");
										$("#choixf").append("<form class='form'><div class='box-body'><h4 class='box-title text-dark mb-0'>Type de préinscription : <strong> " + data.recu.nom_type + " </strong> </h4> <br><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : <strong>" + data.departement.design_facult + " </strong> </label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département :<strong> " + data.departement.design_depart + " </strong></label><label class='form-label'></label></div></div></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'></label></div></div></div></div></div></div></div></form>")
										if (data.candidat.statut == 4 || data.candidat.statut == 5) {
											$("#paye").hide();

										} else {
											$("#paye").show();

										}
										// $("#infoP").show();
										// $("#paye").show();



									}
								}


							})
						}
					});
					// $("#infoP").hide();
					// $("#choixf").hide();
					// $("#paye").hide();
				}



			});

			$("#information").submit(function(event) {
				event.preventDefault();
				var info = $("#information").serializeArray();
				var photo = $("#image").val();
				var formData = new FormData(this);


				// let name=$("input[name=name]")
				console.log(info);
				console.log(formData);

				$.ajax({
					_token: '{{csrf_token()}}',
					type: "POST",
					// url:"{{url('getCorps')}}?country_id="+countryID,
					url: "{{route('accueil')}}",
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success: function(res) {

						if (res) {
							$("#button").empty();
							$("#message").empty();
							$("#message").append("<div class='alert alert-success' role='alert'>Enregistrement réussi</div>");
							// $.each(res, function(key, value) {
							// 	$("#info").append('<div>Insertion reussi</div>');
							// });

						} else {
							$("#info-data").empty();
						}
					},
					error: function(jqXHR, status, error) {
						jsonValue = jQuery.parseJSON(jqXHR.responseText);
						console.log(jqXHR.responseJSON.errors);
						$("#message").empty();
						$("#message").append("<div class='alert alert-warning' role='alert'>L'image doit être du type JPG,PNG,JPEG</div>");
						// $("#erreur").append("<div class='alert alert-warning'>"+jqXHR.responseJSON.errors+"</div>");
						// alert(jsonValue.errors);
					}
				});
			});
			$("#filiere").submit(function(e) {
				e.preventDefault();
				var form = $("#filiere").serializeArray();
				console.log(form);

				$.ajax({
					type: "POST",
					// url:"{{url('getCorps')}}?country_id="+countryID,
					url: "{{route('add_fili')}}",
					data: form,
					dataType: 'json',
					_token: '{{csrf_token()}}',

					success: function(res) {

						if (res) {
							$("#buttonf").empty();
							$("#messagef").empty();
							$("#messagef").append("<div class='alert alert-success'>Enregistrement réussi</div>");
							// $.each(res, function(key, value) {
							// 	$("#info").append('<div>Insertion reussi</div>');
							// });

						} else {
							$("#info-data").empty();
						}
					},
					error: function(jqXHR, status, error) {
						jsonValue = jQuery.parseJSON(jqXHR.responseText);
						console.log(jqXHR.responseJSON);
						// $("#messagef").append("<div class='text-warning'>"+jsonValue.errors.document[0]+"</div>")
						$("#messagef").empty();
						$("#messagef").append("<div class='alert alert-warning'>Tous les champs sont obligatoires</div>")

					}
				});
			});

			$("#document").submit(function(event) {
				event.preventDefault();
				var doc = $("#document").serializeArray();

				var formData = new FormData(this);


				// let name=$("input[name=name]")

				console.log(formData);

				$.ajax({
					_token: '{{csrf_token()}}',
					type: "POST",
					// url:"{{url('getCorps')}}?country_id="+countryID,
					url: "{{route('add_doc')}}",
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success: function(res) {

						if (res) {
							$("#buttond").remove();
							$("#messaged").empty();
							$("#messaged").append("<div class='alert alert-success'>Enregistrement réussi</div>");
							// $.each(res, function(key, value) {
							// 	$("#info").append('<div>Insertion reussi</div>');
							// });

						} else {
							$.each(res, function(f, a) {

								console.log(res)
							});
							$("#messaged").append("<div class='text-danger'>Vous avez déjà un document</div>");
						}
					},

					error: function(jqXHR, status, error) {
						jsonValue = jQuery.parseJSON(jqXHR.responseText);
						console.log(jsonValue);

						$("#messaged").empty();
						$("#messaged").append("<div class='alert alert-warning'>Le document doit être de type pdf et de taille inférieure ou égale à 2Mo </div>")
						// $("#messaged").append("<div class='alert alert-warning'>"+jsonValue.errors.document[0]+"</div>")

					}
				});
			});

			$("#an").hide();
			$("#nine").hide();
			$("#type_bac").change(function() {

				var type_bac = $(this).val();


				if (type_bac == 1) {
					$("#an").show();

					$("#annee").change(function() {
						var anne = $("#annee").val()


						if (anne >= 2010) {

							$("#nine").show();

							$("#periode_bac").submit(function(event) {
								event.preventDefault();
								var periode_bac = $("#periode_bac").serializeArray();

								console.log(periode_bac);

								$.ajax({
									type: "POST",
									// url:"{{url('getCorps')}}?country_id="+countryID,
									url: "{{route('candidat.store')}}",
									data: periode_bac,
									dataType: 'json',
									_token: '{{csrf_token()}}',

									success: function(res) {

										if (res) {
											location.reload();
											$("#button").empty();
											// $("#message").append("<div class='btn btn-danger'>Insertion reussie</div>");
											$("#success").append("<div class='text-success'>Insertion reussi</div>");

											// $.each(res, function(key, value) {
											// 	$("#info").append('<div>Insertion reussi</div>');
											// });

										} else {
											$("#error").append("<div class='text-danger'>Nin incorrecte veuillez saisir le nin conforme à votre relevet du bac ou attestation</div>");

										}
									},

									error: function() {

										$("#error").append("<div class='text-danger'>Nin incorrecte veuillez saisir le nin conforme à votre relevet du bac ou attestation</div>");

									}
								});


							});

						} else if (anne < 2010) {

							$("#periode_bac").submit(function(event) {
								event.preventDefault();
								var periode_bac = $("#periode_bac").serializeArray();

								console.log(periode_bac);

								$.ajax({
									type: "POST",
									// url:"{{url('getCorps')}}?country_id="+countryID,
									url: "{{route('candidat.store')}}",
									data: periode_bac,
									dataType: 'json',
									_token: '{{csrf_token()}}',

									success: function(res) {

										if (res) {
											location.reload();
											$("#button").empty();
											// $("#message").append("<div class='btn btn-danger'>Insertion reussie</div>");
											$("#success").append("<div class='text-success'>Insertion reussi</div>");

											// $.each(res, function(key, value) {
											// 	$("#info").append('<div>Insertion reussi</div>');
											// });

										} else {
											$("#error").append("<div class='text-danger'>Nin incorrecte veuillez saisir le nin conforme à votre relevet du bac ou attestation</div>");

										}
									},

									error: function() {

										$("#error").append("<div class='text-danger'>Nin incorrecte veuillez saisir le nin conforme à votre relevet du bac ou attestation</div>");

									}
								});


							});
						} else {

							$("#periode_bac").submit(function(event) {
								event.preventDefault();
								var periode_bac = $("#periode_bac").serializeArray();

								console.log(periode_bac);

								$.ajax({
									type: "POST",
									// url:"{{url('getCorps')}}?country_id="+countryID,
									url: "{{route('candidat.store')}}",
									data: periode_bac,
									dataType: 'json',
									_token: '{{csrf_token()}}',

									success: function(res) {

										if (res) {
											location.reload();
											$("#button").empty();
											// $("#message").append("<div class='btn btn-danger'>Insertion reussie</div>");
											$("#success").append("<div class='text-success'>Insertion reussi</div>");

											// $.each(res, function(key, value) {
											// 	$("#info").append('<div>Insertion reussi</div>');
											// });

										} else {
											$("#error").append("<div class='text-danger'>Nin incorrecte veuillez saisir le nin conforme à votre relevet du bac ou attestation</div>");

										}
									},

									error: function() {

										$("#error").append("<div class='text-danger'>Nin incorrecte veuillez saisir le nin conforme à votre relevet du bac ou attestation</div>");

									}
								});


							});
						}




					})
				} else if (type_bac == 2) {

					$("#an").hide();
					$("#nine").hide();

					$("#periode_bac").submit(function(event) {
						event.preventDefault();
						var periode_bac = $("#periode_bac").serializeArray();

						console.log(periode_bac);

						$.ajax({
							type: "POST",
							// url:"{{url('getCorps')}}?country_id="+countryID,
							url: "{{route('candidat.store')}}",
							data: periode_bac,
							dataType: 'json',
							_token: '{{csrf_token()}}',

							success: function(res) {

								if (res) {
									location.reload();
									$("#button").empty();
									// $("#message").append("<div class='btn btn-danger'>Insertion reussie</div>");
									$("#success").append("<div class='text-success'>Insertion reussi</div>");

									// $.each(res, function(key, value) {
									// 	$("#info").append('<div>Insertion reussi</div>');
									// });

								} else {
									$("#error").append("<div class='text-danger'>Nin incorrecte veuillez saisir le nin conforme à votre relevet du bac ou attestation</div>");

								}
							},

							error: function() {

								$("#error").append("<div class='text-danger'>Nin incorrecte veuillez saisir le nin conforme à votre relevet du bac ou attestation</div>");

							}
						});


					});
				}
			});
			// $('#modal-center').modal('show');

			var text = "<option>Sélectionner l'année</option>";
			for (var i = 1960; i <= 2023; i++) {
				text += '<option value=' + i + '>' + i + '</option>';
				text.html();
			}

			$("#filiere").submit(function(e) {
				e.preventDefault();
				var form = $("#filiere").serializeArray();
				console.log(form);

				$.ajax({
					type: "POST",
					// url:"{{url('getCorps')}}?country_id="+countryID,
					url: "{{route('add_fili')}}",
					data: form,
					dataType: 'json',
					_token: '{{csrf_token()}}',

					success: function(res) {

						if (res) {
							$("#buttonf").empty();
							$("#message").append("<div class='btn btn-danger'>Insertion reussie</div>");
							// $.each(res, function(key, value) {
							// 	$("#info").append('<div>Insertion reussi</div>');
							// });

						} else {
							$("#info-data").empty();
						}
					}
				});
			});
		});
	</script>

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
	<!-- <script src="{{asset('ijaboCropTool-master/ijaboCropTool.min.js')}}"></script>

	
	<script>
    $('#image').ijaboCropTool({
      preview: '.image-previewer',
      setRatio: 1,
      allowedExtensions: ['jpg', 'jpeg', 'png'],
      buttonsText: ['VALIDER', 'QUITTER'],
      buttonsColor: ['#30bf7d', '#ee5155', -15],
      processUrl: '',
      withCSRF: ['_token', '{{csrf_token()}}'],
      onSuccess: function(message, element, status) {
        alert(message);
      },
      onError: function(message, element, status) {
        alert(message);
      }
    });
  </script> -->
</body>

<!-- Mirrored from crm-admin-dashboard-template.multipurposethemes.com/university/vertical/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 11:39:38 GMT -->

</html>