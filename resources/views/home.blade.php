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
              <div class="box">

                <div class="box-header">
                  <h4 class="box-title">Inscription</h4>
                </div>


                <form action="{{'home_inscription'}}" method="post">
                  @csrf
                  <div class="box-body">

                    <div class="demo-radio-button">
                      <input name="inscription" value="nv_inscription" type="radio" id="radio_30" class="with-gap radio-col-success" required />
                      <label for="radio_30">Inscription à l'UDC pour la première fois</label>
                      <input name="inscription" value="re-inscription" type="radio" id="radio_32" class="with-gap radio-col-success" required/>
                      <label for="radio_32">Re-inscription</label>

                    </div>

                    <div class="row">
                      <div class="col-md-2">
                        <input type="submit" value="Valider" class="form-control btn btn-sm btn-success">
                      </div>
                    </div>

                  </div>
                </form>
                <!-- /.box-header -->

                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- ./col -->
            <div class="col-md-2"></div>
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