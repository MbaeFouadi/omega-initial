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
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="box">

                                <div class="box-header">
                                    <h4 class="box-title ">Préinscription</h4>
                                </div>



                                <!-- /.box-header -->
                                <div class="box-body">


                                    <section id="c">
                                        <div id="dossier" sec="3">
                                            <div id="messaged"></div>
                                                   
                                            <form action="{{route('update_doc')}}" method="post" id="document" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                @error('document')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
                                                    <div id="docs"></div>
                                                    <div class="col-lg-6 col-12" id="doc">
                                                        <label for="formFile" class="form-label">Mes dossiers</label>
                                                        <input class="form-control" type="file" id="document" name="document" required> <br>

                                                        <input type="submit" id="buttond" class="form-control btn-sm btn-success" value="Enregistrez">
                                                    </div>


                                                
                                                            
                                            </form>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                    </div>

                </section>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>


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