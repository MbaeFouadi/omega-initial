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
				<div class="row">

					<div class="col-md-2"></div>

					<div class="col-md-8">
						<div class="box border-shadow shadow-lg p-3 mb-5 bg-white rounded">
							<div class="row">
								<div class="col-md-2"> <br>
									<img class="img-responsive" src="images/udc.png" alt="">
								</div>
								<div class="col-md-10">
									<h2 class="text-center font-weight-bold"><strong>Université des Comores</strong> </h2>
									<h5 class="text-center font-weight-bold"><strong>Direction des études et de la Scolarité</strong> </h5>
									<h6 class="text-center font-weight-bold"><strong>Fiche de préinscription</strong> </h6>
								</div>
							</div> <br> <br>
							<h4> <strong>Etat Civil</strong> </h4>
							<div class="row" style="font-size: 14px;">
								<div class="col-md-6">
									<p>Nin : <strong>{{$data->nin}}</strong></p>
								</div>
								<div class="col-md-6">
									<p>Transaction de paiment : <strong>{{$transaction->reference}}</strong></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Nom :<strong> {{$data->nom}}</strong></p>

								</div>
								<div class="col-md-6">
									<p>Prénom : <strong>{{$data->prenom}}</strong> </p>

								</div>

							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Date de naissance : <strong>{{$data->date_naiss}}</strong></p>

								</div>
								<div class="col-md-6">
									<p>Lieu de naissance : <strong>{{$data->lieu_naiss}}</strong></p>

								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Adresse : <strong>{{$data->adresse_cand}}</strong></p>

								</div>
								<div class="col-md-6">
									<p>Téléphone : <strong>{{$data->tel_mobile}}</strong></p>

								</div>
							</div>
							<h4> <strong>Baccalauréat (ou équivalent) </strong> </h4>
							<div class="row">
								<div class="col-md-6">
									<p>Série : <strong> {{$data->serie}}</strong></p>
								</div>
								<div class="col-md-6">
									<p>Mention : <strong>{{$data->mention}}</strong></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p> Année : <strong>{{$data->annee}}</strong></p>
								</div>
								<div class="col-md-6">
									<p> Centre : <strong>{{$data->centre}}</strong></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p>Numéro de l'attestation : <strong> {{$data->num_attest}}</strong></p>
								</div>
							</div>
							<h4> <strong>Choix des filières </strong> </h4>
							@if ($data->id_type ==1)
							<div class="row">
								<div class="col-md-6">
									<p>Composante : <strong>{{$departement1->design_facult}}</strong></p>
								</div>
								<div class="col-md-6">
									<p>Département : <strong>{{$departement1->design_depart}}</strong></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Composante : <strong>{{$departement2->design_facult}}</strong></p>
								</div>
								<div class="col-md-6">
									<p>Département : <strong>{{$departement2->design_depart}}</strong></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Composante : <strong>{{$departement3->design_facult}}</strong></p>
								</div>
								<div class="col-md-6">
									<p>Département : <strong>{{$departement3->design_depart}}</strong></p>
								</div>
							</div>
							@else
							<div class="row">
								<div class="col-md-6">
									<p>Composante :  <strong> {{$departement->design_facult}}</strong></p>
								</div>
								<div class="col-md-6">
									<p>Département : <strong>{{$departement->design_depart}}</strong></p>
								</div>
							</div>
							@endif

							



						</div> <br> <br>

						<p>
							<input type="button" value="Télécharger" class="btn btn-success">
						</p>


						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<div class="col-md-2"></div>

				<!-- ./col -->
		</div>
		</section>
		<!-- Step 4 -->

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



</body>

<!-- Mirrored from crm-admin-dashboard-template.multipurposethemes.com/university/vertical/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 11:39:38 GMT -->

</html>