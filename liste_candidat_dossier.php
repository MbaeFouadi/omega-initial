<?php
session_start();
if (isset($_SESSION['login']) and ($_SESSION['cat'] == "1" or $_SESSION['cat'] == "6" or $_SESSION['cat'] == "11")) {
    include('connexion.php');
    $message = "";

    $r = "SELECT  date_fin FROM date_fin order by id_date DESC";

    $req = mysqli_query($link, $r);
    $d = mysqli_fetch_array($req);
    //$b = $_SESSION['nin'];
    // $br = mysqli_query($link,"SELECT * FROM choix where nin ='".$b."'");
    // while($data = mysqli_fetch_array($br)){
    //}

    // if ($_SESSION['choix'] == 1) {
    //     $sqlist = mysqli_query($link, "SELECT * FROM candidats where statut=5 AND  retenu IS NULL AND  choix1='" . $_SESSION['login'] . "'");
    //     $dep = mysqli_query($link, "SELECT * FROM departement where code_depart='" . $_SESSION['login'] . "'");
    //     $dat = mysqli_fetch_array($dep);
    // } else if ($_SESSION['choix'] == 2) {
    //     $sqlist = mysqli_query($link, "SELECT * FROM candidats where statut=5 AND  retenu='nR1' AND  choix2='" . $_SESSION['login'] . "'");
    //     $dep = mysqli_query($link, "SELECT * FROM departement where code_depart='" . $_SESSION['login'] . "'");
    //     $dat = mysqli_fetch_array($dep);


    // } else if ($_SESSION['choix'] == 3) {

    //     $sqlist = mysqli_query($link, "SELECT * FROM candidats where statut=5 AND  retenu='nR2' AND  choix3='" . $_SESSION['login'] . "'");
    //     $dep = mysqli_query($link, "SELECT * FROM departement where code_depart='" . $_SESSION['login'] . "'");
    //     $dat = mysqli_fetch_array($dep);


    // } else {
    //     header("location:liste_candidat_dossier.php");
    // }

    // if (isset($_GET['O'])) {
    //     if($_SESSION['choix'] == 1) {

    //         $sq = mysqli_query($link, "UPDATE candidats set retenu='" . $_SESSION['login'] . "' WHERE num_recu='" . $_GET['O'] . "'");
    //         header("location:liste_candidat_dossier.php");
    //     } else if ($_SESSION['choix'] == 2) {

    //         $sq = mysqli_query($link, "UPDATE candidats set retenu='" . $_SESSION['login'] . "' WHERE num_recu='" . $_GET['O'] . "'");
    //         header("location:liste_candidat_dossier.php");
    //     } else if ($_SESSION['choix'] == 3) {

    //         $sq = mysqli_query($link, "UPDATE candidats set retenu='" . $_SESSION['login'] . "' WHERE num_recu='" . $_GET['O'] . "'");
    //         header("location:liste_candidat_dossier.php");
    //     } else {

    //         header("location:liste_candidat_dossier.php");
    //     }
    // } else if(isset($_GET['N'])) {

    //     if ($_SESSION['choix'] == 1) {
    //         $sq = mysqli_query($link, "UPDATE candidats set retenu='nR1' WHERE num_recu='" . $_GET['N'] . "'");
    //         header("location:liste_candidat_dossier.php");
    //     } else if ($_SESSION['choix'] == 2) {

    //         $sq = mysqli_query($link, "UPDATE candidats set retenu='nR2' WHERE num_recu='" . $_GET['N'] . "'");
    //         header("location:liste_candidat_dossier.php");
    //     } else if ($_SESSION['choix'] == 3) {
    //         $sq = mysqli_query($link, "UPDATE candidats set retenu='nR3' WHERE num_recu='" . $_GET['N'] . "'");
    //         header("location:liste_candidat_dossier.php");
    //     } else {
    //         header("location:liste_candidat_dossier.php");
    //     }
    // }


    if (isset($_GET['O'])) {


        $sq = mysqli_query($link, "UPDATE candidats set retenu='" . $_SESSION['login'] . "' WHERE num_recu='" . $_GET['O'] . "'");
        header("location:liste_candidat_dossier.php");
    } else if (isset($_GET['N'])) {
        $ret = mysqli_query($link, "SELECT * FROM candidats WHERE num_recu='" . $_GET['N'] . "'");
        $data = mysqli_fetch_array($ret);
        if($data['retenu'] ==NULL)
        {
            $sq = mysqli_query($link, "UPDATE candidats set retenu='nR1' WHERE num_recu='" . $_GET['N'] . "'");
            header("location:liste_candidat_dossier.php");
        }
        else if($data['retenu'] =='nR1')
        {
            $sq = mysqli_query($link, "UPDATE candidats set retenu='nR2' WHERE num_recu='" . $_GET['N'] . "'");
            header("location:liste_candidat_dossier.php");
        }
        else if($data['retenu'] =='nR2')
        {
            $sq = mysqli_query($link, "UPDATE candidats set retenu='nR3' WHERE num_recu='" . $_GET['N'] . "'");
            header("location:liste_candidat_dossier.php");
        }

        
    }
    $sqlist = mysqli_query($link, "SELECT * FROM candidats where statut=5 AND (retenu IS NULL AND choix1='" . $_SESSION['libell'] . "') OR (retenu='nR1' AND choix2='" . $_SESSION['libell'] . "') OR (retenu='nR2' AND choix3='" . $_SESSION['libell'] . "') ");
    $dep = mysqli_query($link, "SELECT * FROM departement where code_depart='" . $_SESSION['login'] . "'");
    $dat = mysqli_fetch_array($dep);





?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Liste des cadidats autorisés à passés le concours de <?= utf8_encode($dat['design_depart']) ?></title>
        <link rel="shortcut icon" href="assets/img/udc.png">
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="node_modules/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/css.css">
        <link rel="stylesheet" href="assets/css/datatables.css">
        <link rel="stylesheet" href="assets/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">



    </head>

    <body>

        <section class="main-wrapper">
            <aside class="left-aside">
                <div class="fontLogo">
                    <div class="img-rd">
                        <img src="./assets/img/udc.png" alt="profile image">
                    </div>
                    <h6 class="m-3 text-center"><strong class="titre"> Université des Comores</strong></h6>
                    <hr>
                </div>
                <nav class="nav-aside">
                    <?php
                    switch ($_SESSION['cat']) {
                        case 1:
                            include('interfaces/superAdminRubrique.php');
                            break;
                        case 2:
                            include('interfaces/administrationRubrique.php');
                            break;
                        case 3:
                            include('interfaces/agtScolariteRubrique.php');
                            break;
                        case 4:
                            include('interfaces/scolariteRubrique.php');
                            break;
                        case 5:
                            include('interfaces/desRubrique.php');
                            break;
                        case 6:
                            include('interfaces/gestionnaireRubrique.php');
                            break;
                        case 7:
                            include('interfaces/agentComptaRubrique.php');
                            break;
                        case 8:
                            include('interfaces/adminRubrique.php');
                            break;
                        case 10:
                            include('interfaces/desvRubrique.php');
                            break;
                        case 11:
                            include('interfaces/chef_departementRubrique.php');
                            break;
                    }
                    ?>
                    <li class="bord"><a href="profil.php"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>

                    <li><a href="deconnexion.php"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>

                    </ul>
                </nav>
            </aside>
            <main class="main-content">
                <h4 align="right"><strong><?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']  ?> </strong></h4>
                <h5 align="right" style="color:#00b185;"> <strong><?php echo utf8_encode($_SESSION['libelle']) ?></strong></h5>

                <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-60px;"> <?php echo (date('d-m-Y')); ?></h5>
                <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin de préinscription : <?php echo $d['date_fin']; ?></h5>
                </div>
                <div class="text-center mb-5">
                </div>
                <h2 align="center">Liste des candidats en <?php echo utf8_encode($dat['design_depart']) ?> </h2>

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered tableexcel" id="tablexcel">
                                <thead class="thead-dark">


                                    <tr>
                                        <th scope="col">N°</th>
                                        <!-- <th scope="col">Reçu</th> -->
                                        <!-- <th scope="col">NIN</th> -->
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prénom</th>
                                        <th scope="col">Date de naissance</th>
                                        <th scope="col">Lieu de naissance</th>
                                        <!-- <th scope="col">Téléphone</th> -->
                                        <th scope="col">Document</th>
                                        <th scope="col">Action</th>


                                    </tr>


                                    <!-- <?php  //}


                                            ?>
                                 
                                  
                                    
                                </tr>
                             <?php
                                ?>
                                 <?php  //}

                                    //if(GI=="ECT"){  
                                    ?>
                                    <tr>
                                   
                                   
                                    
                                </tr>
                             <?php // }
                                ?>
                                    <?php  //}

                                    //if(GI=="STQ"){  
                                    ?>
                                 
                                    
                                </tr>
                             <?php  //}
                                ?> -->
                                </thead>
                                <tbody>
                                    <?php

                                    # code...
                                    ?>
                                    <?php
                                    $i = 1;
                                    while ($datlist = mysqli_fetch_array($sqlist)) {
                                    ?>
                                        <tr>

                                            <td><?= $i ?></td>
                                            <!-- <td><?= $datlist['num_recu']; ?></td> -->
                                            <!-- <td><?= $datlist['nin']; ?></td> -->
                                            <td><?= utf8_encode($datlist['nom']); ?></td>
                                            <td><?= utf8_encode($datlist['prenom']); ?></td>
                                            <td><?= utf8_encode($datlist['date_naiss']); ?></td>
                                            <td><?= utf8_encode($datlist['lieu_naiss']); ?></td>
                                            <!-- <td><?= utf8_encode($datlist['tel_mobile']); ?></td> -->
                                            <td> <a href="http://omega-xd.univ-comores.km/dossier/<?= utf8_encode($datlist['user_candidat_id']); ?> " target='_blank'>Document</a></td>
                                            <td><a href="liste_candidat_dossier.php?O=<?= $datlist['num_recu'] ?>">Retenir</a>-<a href="liste_candidat_dossier.php?N=<?= $datlist['num_recu'] ?>">Recaler</a></td>



                                            <?php //number_format($phy_moy, 2, ',', '')
                                            ?>

                                        <?php
                                        $i++;
                                    }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




                <script src="assets/js/datatables.js"></script>
                <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="assets/js/app.js"></script>

                <script type="text/javascript">
                    $('#tablexcel').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5'
                        ]
                    })
                </script>



    </body>

    </html>
<?php } else { ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
    <h3 align="center" style="font-family:arial;margin-top:20%;"><a href="userInterface.php"> retour &agrave; la page d'acceuil</a>
    <?php }

    ?>