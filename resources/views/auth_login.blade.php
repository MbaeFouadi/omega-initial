<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from crm-admin-dashboard-template.multipurposethemes.com/university/vertical/main/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 11:40:16 GMT -->
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" href="images/Omega-logo.png">


    <title>Login</title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="../src/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="../src/css/style.css">
	<link rel="stylesheet" href="../src/css/skin_color.css">	

</head>
	
<body class="hold-transition theme-primary " style="background-image: url(../../../images/lg.png)">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div >
							
							<div class="content-top-agile p-20 pb-0">
							<h1 class="text-success" style="font-size: 3.9em;"><strong>Omega xD </strong></h1>

								<img src="../../images/udc-removebg-preview.png" alt="" width="70px" height="70px">

							</div>
							<div class="p-40">
								<form action="{{ route('login') }}" method="POST">
								@csrf
        						<strong><x-auth-validation-errors class="mb-6 text-dark" :errors="$errors" /></strong>

									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-white"><i class="ti-email"></i></span>
											<input type="email" name="email" class="form-control ps-15 bg-white" placeholder="Email" required>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-white"><i class="ti-lock"></i></span>
											<input type="password" name="password" class="form-control ps-15 bg-white" placeholder="Mot de passe" required>
										</div>
									</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-success mt-10">Se connecter</button>
										</div>
										<!-- /.col -->
									 
								</form>	
								<div class="text-center">
									<p class="mt-15 mb-0 text-dark"><strong>Vous n'avez pas un compte ? </strong><a href="{{('inscription')}}" class="text-success ms-5"><strong>S'inscrire</strong></a></p>
								</div>
								<div class="text-center">
									<p class="mt-15 mb-0 text-dark"><strong> Mot de passe oublié ?</strong><a href="{{('forgot-password')}}" class="text-success ms-5"><strong>Réinitialiser votre mot de passe</strong></a></p>
								</div>
							</div>						
						</div>
					
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Vendor JS -->
	<script src="../src/js/vendors.min.js"></script>
	<script src="../src/js/pages/chat-popup.js"></script>
    <script src="../../../assets/icons/feather-icons/feather.min.js"></script>	

</body>

<!-- Mirrored from crm-admin-dashboard-template.multipurposethemes.com/university/vertical/main/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 11:40:16 GMT -->
</html>
