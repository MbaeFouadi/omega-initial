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



        @include("include.inscription.header")
        @include("include.inscription.aside")
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>

                <!-- Main content -->
                <section class="content">

                    <div class="row">

                        <div class="col-md-2"></div>

                        <div class="col-md-6">
                            <div class="box border-shadow shadow-lg p-3 mb-5 bg-white rounded">
                                <div class="row">
                                    <div class="col-md-2"> <br>
                                        <img class="img-responsive" src="images/udc.png" alt="">
                                    </div>
                                    <div class="col-md-10">
                                        <h2 class="text-center font-weight-bold"><strong>Université des Comores</strong> </h2>
                                        <h5 class="text-center font-weight-bold"><strong>Direction des études et de la Scolarité</strong> </h5>
                                        <h6 class="text-center font-weight-bold"><strong>Autorisation de paiment</strong> </h6>
                                    </div>
                                </div> <br> <br>
                                <div class="row" style="font-size: 18px;">
                                    <div class="col-md-12">
                                        <p>Le Directeur des Etudes et de la Scolarité, soussigné , autorise</p>
                                        <p><strong>Numéro d'autorisation : {{$data->num_auto}} </strong></p>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <p>Nom : {{$data->nom}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Prénom : {{$data->prenom}}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Né(e) le : {{$data->date_naiss}} à {{$data->lieu_naiss}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Nin : {{$data->nin}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @if($data->matricule==NULL)
                                                @isset($candidats->num_recu)
                                                <p>Num reçu: {{$candidats->num_recu}}</p>
                                                @endisset
                                                @elseif($data->matricule !=NULL)
                                                <p>Matricule: {{$data->matricule}}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Préinscrit au titre de l'année : {{$data->Annee}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Composante : {{$composante->design_facult}}</p>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Département : {{$departement->design_depart}}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <p> Niveau : {{ $niveau->intit_niv}}</p>

                                            </div>
                                        </div>
                                        <p>à verser à la BDC</p>
                                        <p>{{$data->droit}} ({{$data->droit_lettre}} Francs Comorien) de frais d'inscription au compte UDC</p>
                                       
                                        <div class="row">
                                            <form method="post" action="{{url('https://26900.tagpay.fr/online/online.php')}}">
                                                @csrf
                                                <input type="hidden" name="sessionid" value="{{$sessionId}}">
                                                <input type="hidden" name="merchantid" value="2274832632922162">
                                                <input type="hidden" name="amount" value="{{$data->droit}}">
                                                <input type="hidden" name="currency" value="174">
                                                <input type="hidden" name="purchaseref" value="{{$data->user_candidat_id}}">
                                                <input type="hidden" name="accepturl" value="http://omega-xd.univ-comores.km/accepturl">
                                                <input type="hidden" name="cancelurl" value="http://omega-xd.univ-comores.km/cancelurl">
                                                <input type="hidden" name="declineurl" value="http://omega-xd.univ-comores.km/declineurl">
                                                <input type="submit" class="btn btn-sm btn-success" name="ok" value="Payer via Holo">
                                                <a href="{{route('accueil')}}" class="btn btn-sm btn-success">Payer après</a>
                                            </form>
                                        </div>
                                     
                                        <br>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="col-md-4"></div>

                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
        </div>
    </div>



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