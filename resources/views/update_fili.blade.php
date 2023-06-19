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
                                        <div id="fili" sec="2">
                                            <div id="fillie"></div>
                                            <div id="messagef"></div>
                                            <form action="{{route('update_fili')}}" method="POST" id="filiere">
                                                @csrf
                                                @if($data->id_type==1)
                                                <div class="row" id="choix1">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label">1er Choix <br> <br> Composantes <span class="text-danger">*</span></label>
                                                            <select class="form-control select2" id="composante1" name="composante1" style="width: 100%;">
                                                                <option value="{{$candidat1->code_facult}}">{{$candidat1->design_facult}}</option>
                                                                @foreach ($faculte as $fac )
                                                                    <option value="{{$fac->code_facult}}">{{$fac->design_facult}}</option>  
                                                                @endforeach


                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Départements <span class="text-danger">*</span></label>
                                                            <select class="form-control select2" id="departement1" name="departement1" style="width: 100%;">
                                                                <option value="{{$candidat1->code_depart}}">{{$candidat1->design_depart}}</option>

                                                                
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label">2ème choix <br> <br> Composantes <span class="text-danger">*</span></label>
                                                            <select class="form-control select2" id="composante2" name="composante2" style="width: 100%;">
                                                                <option value="{{$candidat2->code_facult}}">{{$candidat2->design_facult}}</option>
                                                                @foreach ($faculte as $fac )
                                                                    <option value="{{$fac->code_facult}}">{{$fac->design_facult}}</option>  
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Départements <span class="text-danger">*</span></label>
                                                            <select class="form-control select2" id="departement2" name="departement2" style="width: 100%;">
                                                                <option value="{{$candidat2->code_depart}}">{{$candidat2->design_depart}}</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label">3ème choix <br> <br> Composantes <span class="text-danger">*</span></label>
                                                            <select class="form-control select2" style="width: 100%;" id="composante3" name="composante3">

                                                                <option value="{{$candidat3->code_facult}}">{{$candidat3->design_facult}}</option>
                                                                @foreach ($facultes as $fac )
                                                                    <option value="{{$fac->code_facult}}">{{$fac->design_facult}}</option>  
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Départements <span class="text-danger">*</span></label>
                                                            <select class="form-control select2" id="departement3" name="departement3" style="width: 100%;">
                                                                <option value="{{$candidat3->design_depart}}">{{$candidat3->design_depart}}</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="row" id="choix2">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label">1er choix <br> <br> Composantes <span class="text-danger">*</span></label>
                                                            <select class="form-control select2" style="width: 100%;" id="composante" name="composante">
                                                                <option value="{{$candidat->code_facult}}">{{$candidat->design_facult}}</option>
                                                                @foreach ($facultes as $fac )
                                                                    <option value="{{$fac->code_facult}}">{{$fac->design_facult}}</option>  
                                                                @endforeach


                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Départements <span class="text-danger">*</span></label>
                                                            <select class="form-control select2" style="width: 100%;" name="departement" id="departement">
                                                            <option value="{{$candidat->code_depart}}">{{$candidat->design_depart}}</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif



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
    <script>
        $(document).ready(function() {

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

        });
    </script>


</body>

<!-- Mirrored from crm-admin-dashboard-template.multipurposethemes.com/university/vertical/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 11:39:38 GMT -->

</html>