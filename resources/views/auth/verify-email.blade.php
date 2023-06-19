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
                        <div class="bg-white rounded10 shadow-lg">

                            <div class="content-top-agile p-20 pb-0">
                                <h1 class="text-success" style="font-size: 1.9em;"><strong>Omega xD </strong></h1>

                                <img src="../../images/udc-removebg-preview.png" alt="" width="40px" height="40px">

                            </div> <br><br>
                            <div class="container text-center">
                                Merci pour votre inscription!! <br> Avant de continuer veuillez verifier votre adresse email pour confirmer votre compte. Si vous n'avez pas reçu de mail, nous pouvons renvoyer le lien en cliquant le lien ci-dessous
                            </div>
                            @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                               Un nouveau lien de verification a été envoyé.                         </div>
                            @endif

                            <div class="mt-4 flex items-center justify-between">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf

                                    <div class="text-center">
                                        <x-button class="btn btn-success">
                                            {{ __('Renvoi email') }}
                                        </x-button>
                                    </div>
                                </form>
                            </div><br><br>

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