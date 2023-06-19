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

</head>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

	<div class="wrapper">
		<!-- <div id="loader"></div> -->



		<header class="main-header">
			<div class="d-flex align-items-center logo-box justify-content-start
					d-md-none d-block">
				<!-- Logo -->
				<a href="{{('accueil')}}" class="logo">
					<!-- logo-->
					<!-- <div class="logo-mini w-30">
						<span class="light-logo"><img src="images/logo-letter.png" alt="logo"></span>
						<span class="dark-logo"><img src="images/logo-letter-white.png" alt="logo"></span>
					</div> -->
					<div class="logo-lg">
						<!-- <span class="light-logo"><img src="../../../images/logo-dark-text.png" alt="logo"></span> -->
						<span class="light-logo fs-36 fw-700"> <strong>Omeg<span class="text-success">a</strong></span></span>
						<span class="dark-logo"><img src="images/" alt="logo"></span>
					</div>
				</a>
			</div>
			<!-- Header Navbar -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<div class="app-menu">
					<ul class="header-megamenu nav">
						<li class="btn-group nav-item">
							<a href="#" class="waves-effect waves-light nav-link push-btn
									btn-primary-light" data-toggle="push-menu" role="button">
								<i class="icon-Menu"><span class="path1"></span><span class="path2"></span></i>
							</a>
						</li>
						<li class="btn-group d-lg-inline-flex d-none">
							<div class="app-menu">
								<div class="search-bx mx-5">

								</div>
							</div>
						</li>
					</ul>
				</div>

				<div class="navbar-custom-menu r-side">
					<ul class="nav navbar-nav">
						<li class="dropdown notifications-menu btn-group nav-item">

							<ul class="dropdown-menu animated bounceIn">
								<li class="header">
									<div class="p-20">
										<div class="flexbox">
											<div>

											</div>
										</div>
								</li>

							</ul>
						</li>






					</ul>
				</div>
			</nav>
		</header>
		<aside class="main-sidebar">
			<!-- sidebar-->
			<section class="sidebar position-relative">
				<div class="d-flex align-items-center logo-box justify-content-start
							d-md-block d-none">
					<!-- Logo -->
					<a href="{{('accueil')}}" class="logo">
						<!-- logo-->
						<!-- &&	 -->
						<div class="logo-lg">
							<span class="light-logo fs-36 fw-700"> <strong> Omeg<span class="text-success">a </strong></span></span>
						</div>
					</a>
				</div>
				<div class="user-profile my-15 px-20 py-10 b-1 rounded10 mx-15">
					<div class="d-flex align-items-center justify-content-between">
						<div class="image d-flex align-items-center">
							<img src="images/avatar/avatar-13.png" class="rounded-0 me-10" alt="User Image">
							<div>
								<h4 class="mb-0 fw-600">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</h4>
								<p class="mb-0">Candidat</p>
							</div>
						</div>
						<div class="info">
							<a class="dropdown-toggle p-15 d-grid" data-bs-toggle="dropdown" href="#"></a>
							<div class="dropdown-menu dropdown-menu-end">


								<a class="dropdown-item" href="{{ route('logout') }}"><i class="ti-lock"></i>
									Déconnexion</a>


							</div>
						</div>
					</div>
				</div>
				
			</section>
		</aside>
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
						<h3 class="box-title light-logo fs-36 fw-700"><strong class="text-center"></strong></h3>
					</div>
					<!-- Modal -->
				
					<div class="modal center-modal fade" id="modal-center" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Type</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>

								<div class="modal-body">

									<div>
										<div id="error"></div>
										<div id="success"></div>

										<form action="{{route('type')}}" method="POST" >
											@csrf
											<select name="type" id="type" class="form-control" required aria-required="Selectionner">
												<option value="">Type</option>
												<option value="1">Préinscription</option>
												<option value="2">Inscription</option>
											</select> <br>
										
											
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
					
					<!-- /.modal -->
					<!-- /.box-header -->
					<div class="box-body wizard-content">
						
					</div>


				</div>
			</section>
			
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
            $('#modal-center').modal('show');

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
									} else if (data.data.statut == 2 ||data.data.statut == 3) {
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
															$("#fili").append("<div class='box-body'><h6>Choix 1 :</h6><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : <strong>" + data.departement1.design_facult + " </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département : <strong> " + data.departement1.design_depart + " </strong></label><label class='form-label'></label></div></div></div><h6>Choix 2: </h6><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : <strong>" + data.departement2.design_facult + " </strong> </label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département : <strong> " + data.departement2.design_depart + " </strong></label><label class='form-label'></label></div></div></div><h6>Choix 3: </h6><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : <strong> " + data.departement3.design_facult + " </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département : <strong> " + data.departement3.design_depart + " </strong></label><label class='form-label'></label></div></div></div></div>")

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
									if(data.statut==null)
									{
										// console.log(data.statut);
										$("#docs").empty();
										$("#doc").hide();
										$("#do").hide();
										$("#buttond").hide();
										$("#docs").append("Veuillez remplir les rubrique précédentes");
									}
									else if (data.statut == 1) {

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
									}
									else if(data.statut==3)
									{
										
										$("#doc").empty();
										$("#do").empty();
										$("#docs").empty();
									
										// $("#docs").append("Votre document est bien chargé");
										$("#docs").append("<embed  src='document/"+data.document+"' width=800 height=500 type='application/pdf' /><br><br><p class=><a href='{{route('dossier')}}' target='_blank'>Voir plus</a></p>");
										// $("#docs").hide();


									}
									
								});
							}
						}
					})
				}
				else if(id==3)
				{
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
								if(data.candidat.statut ==3)
								{
										if(data.candidat.id_type==1)
									{
										$("#infoP").empty();
										$("#choixf").empty();
										$("#infoP").append("<div class='box-header with-border'><h4 class='box-title'>Mes informations personneles</h4></div><form class='form' ><div class='box-body'><h4 class='box-title text-success mb-0'><i class='ti-user me-15'></i> Info</h4><hr class='my-15'><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Nom : <strong> "+data.candidat.nom +" </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Prénom : <strong> "+data.candidat.prenom +" </strong></label><label class='form-label'></label></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Date de naissance : <strong> "+data.candidat.date_naiss +" </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Lieu de naissance: <strong>"+data.candidat.lieu_naiss +" </strong></label><label class='form-label'></label></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Mention : <strong>"+data.candidat.mention +" </strong> </label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Série : <strong> "+data.candidat.serie +" </strong></label><label class='form-label'></label></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Adresse : <strong> "+data.candidat.adresse_cand +" </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Téléphone : <strong> "+data.candidat.tel_mobile +" </strong></label><label class='form-label'></label></div></div></div><div class='form-group'></div></div></form>");
										$("#choixf").append("<form class='form'><div class='box-body'><h4 class='box-title text-dark mb-0'>Type de préinscription : <strong> "+data.recu.nom_type+" </strong></h4> <br> <h6>Choix 1 :</h6><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : "+data.departement1.design_facult+"</label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département : "+data.departement1.design_depart+"</label><label class='form-label'></label></div></div></div><h6>Choix 2: </h6><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : "+data.departement2.design_facult+"</label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département : "+data.departement2.design_depart+"</label><label class='form-label'></label></div></div></div><h6>Choix 3: </h6><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : "+data.departement3.design_facult+"</label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département : "+data.departement3.design_depart+"</label><label class='form-label'></label></div></div></div></div></form>")
										$("#paye").show();

									}
									else
									{
										$("#infoP").empty();
										$("#choixf").empty();
										$("#infoP").append("<div class='box-header with-border'><h4 class='box-title'>Mes informations personneles</h4></div><form class='form' ><div class='box-body'><h4 class='box-title text-success mb-0'><i class='ti-user me-15'></i> Info</h4><hr class='my-15'><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Nom : <strong> "+data.candidat.nom +" </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Prénom : <strong> "+data.candidat.prenom +" </strong></label><label class='form-label'></label></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Date de naissance : <strong> "+data.candidat.date_naiss +" </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Lieu de naissance: <strong>"+data.candidat.lieu_naiss +" </strong></label><label class='form-label'></label></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Mention : <strong>"+data.candidat.mention +" </strong> </label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Série : <strong> "+data.candidat.serie +" </strong></label><label class='form-label'></label></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Adresse : <strong> "+data.candidat.adresse_cand +" </strong></label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Téléphone : <strong> "+data.candidat.tel_mobile +" </strong></label><label class='form-label'></label></div></div></div><div class='form-group'></div></div></form>");
										$("#choixf").append("<form class='form'><div class='box-body'><h4 class='box-title text-dark mb-0'>Type de préinscription : <strong> "+data.recu.nom_type+" </strong> </h4> <br><div class='row'><div class='col-md-6'><div class='form-group'><label class='form-label'>Composante : <strong>"+data.departement.design_facult+" </strong> </label><label class='form-label'></label></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'>Département :<strong> "+data.departement.design_depart+" </strong></label><label class='form-label'></label></div></div></div></div><div class='col-md-6'><div class='form-group'><label class='form-label'></label></div></div></div></div></div></div></div></form>")

										// $("#infoP").show();
										$("#paye").show();



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
					error: function(jqXHR, status, error)
					{
						jsonValue = jQuery.parseJSON( jqXHR.responseText );
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
					error: function(jqXHR, status, error)
					{
						jsonValue = jQuery.parseJSON( jqXHR.responseText );
						console.log(jqXHR.responseJSON);
						// $("#messagef").append("<div class='text-warning'>"+jsonValue.errors.document[0]+"</div>")
						$("#messagef").empty();
						$("#messagef").append("<div class='alert alert-warning'>Tous les champs sont obligatoires</div>")
					
					}
				});
			});

			$("#document").submit(function(event) {
				event.preventDefault();
				var doc= $("#document").serializeArray();
				
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
							$.each(res,function(f,a){

								console.log(res)
							});
							$("#messaged").append("<div class='text-danger'>Vous avez déjà un document</div>");
						}
					},

					error: function(jqXHR, status, error)
					{
						jsonValue = jQuery.parseJSON( jqXHR.responseText );
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

</body>

<!-- Mirrored from crm-admin-dashboard-template.multipurposethemes.com/university/vertical/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 11:39:38 GMT -->

</html>