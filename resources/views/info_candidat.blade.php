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

                        <div class="col-md-8">
                            <div class="box border-shadow shadow-lg p-3 mb-5 bg-white rounded"> <br>
                                <h3 class="text-center">Informations candidat</h3>
                                <hr>
                                <form class="form" method="POST" action="{{route('autorisation.store')}}" onsubmit="return confirm('Etes-vous sur de vouloir confirmez ce département?')">
                                    @csrf
                                    <div class="box-body">
                                        @isset($messages)
                                        <div class="alert alert-danger">{{ $messages }}</div>
                                        @endisset
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Nin: {{$candidat->nin}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Type préinscription: {{$recu->nom_type}} </p>
                                            </div>
                                        </div> <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Nom: {{$candidat->nom}} </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Prénom: {{$candidat->prenom}} </p>
                                            </div>
                                        </div> <br>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Date de naissance: {{$candidat->date_naiss}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Lieu de naissance: {{$candidat->lieu_naiss}} </p>
                                            </div>
                                        </div> <br>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Retenu: {{$departement->design_depart}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="hidden" value="{{$candidat->nin}}" name="nin" class="form-control" placeholder="Nin" id="inputEmail3">
                                                @if($recu->id_type==1)
                                                <input type="hidden" value="l1" name="niveau" class="form-control" id="inputEmail3">
                                                @elseif($recu->id_type==2)
                                                <input type="hidden" value="l2" name="niveau" class="form-control" id="inputEmail3">
                                                @elseif($recu->id_type==3)
                                                <input type="hidden" value="l3" name="niveau" class="form-control" id="inputEmail3">
                                                @elseif($recu->id_type==6)
                                                <input type="hidden" value="N4" name="niveau" class="form-control" id="inputEmail3">
                                                @elseif($recu->id_type==7)
                                                <input type="hidden" value="N5" name="niveau" class="form-control" id="inputEmail3">
                                                @endif

                                            </div>
                                        </div> <br>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="submit" value="Confirmer" class="btn btn-sm btn-success">
                                            </div>
                                        </div>

                                </form>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="col-md-2"></div>

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