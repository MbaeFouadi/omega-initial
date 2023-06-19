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
                                        <h6 class="text-center font-weight-bold"><strong>Fiche de renseignement</strong> </h6>
                                    </div>
                                </div> <br> <br>
                                <div class="row" style="font-size: 14px;">
                                    <div class="col-md-12">
                                        <p>Matricule : {{$data->mat_etud}}</p>
                                        <p>Nin : {{$data->NIN}} </p>
                                        <p>Nom : {{$data->nom}}</p>
                                        <p>Prénom : {{$data->prenom}}</p>
                                        <p>Date de naissance : {{$data->date_naiss}}</p>
                                        <p>Lieu de naissance : {{$data->lieu_naiss}}</p>
                                        <h4 class="text-center">Parcours de {{ $data->nom }} {{ $data->prenom }} à l'UDC</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">Composante</th>
                                                        <th scope="col">Département</th>
                                                        <th scope="col">Niveau</th>
                                                        <th scope="col">Année Universitaire</th>
                                                    </tr>
                                                </tbody>
                                                @foreach($datas as $data)
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" >{{ $data->design_facult }}</th>
                                                        <td >{{ $data->design_depart  }}</td>
                                                        <td >{{ $data->intit_niv  }}</td>
                                                        <td >{{ $data->Annee }}</td>
                                                    </tr>
                                                </tbody>
                                                @endforeach
                                               
                                            </table>
                                        </div> <br> <br>

                                        <p>
                                            <input type="button" value="Télécharger" class="btn btn-success">
                                        </p>
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