<?php
session_start();
if (isset($_SESSION['login']) and ($_SESSION['cat'] == "1" or $_SESSION['cat'] == "6" or $_SESSION['cat'] == "10")) {
    include('connexion.php');
    $message = "";

    $r = "SELECT  date_fin FROM date_fin order by id_date DESC";

    $req = mysqli_query($link, $r);
    $d = mysqli_fetch_array($req);
    //$b = $_SESSION['nin'];
    // $br = mysqli_query($link,"SELECT * FROM choix where nin ='".$b."'");
    // while($data = mysqli_fetch_array($br)){
    //}

    $sqlist = mysqli_query($link, "SELECT * FROM candidats,documents where candidats.user_candidat_id=documents.user_candidat_id AND candidats.statut=4 and  (candidats.choix1='" . $_SESSION['code_depart'] . "')");
    $dep = mysqli_query($link, "SELECT * FROM departement where code_depart='" . $_SESSION['code_depart'] . "'");
    $dat = mysqli_fetch_array($dep);

    if (isset($_GET['O'])) {
        $sq = mysqli_query($link, "UPDATE candidats set statut=5,traitant_recu='" . $_SESSION['login'] . "' WHERE num_recu='" . $_GET['O'] . "'");
        header("location:liste_candidat.php");
    }

    if(isset($_POST['submit']))
    {
        $message=$_POST['message'];
        $num_recu=$_POST['num_recu'];

        $sq=mysqli_query($link,"INSERT INTO message(message,statut,num_recu) VALUES('$message','1','$num_recu')");

        if($sq)
        {
            header("location:liste_candidat.php");

        }
    }




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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">



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
                    }
                    ?>
                    <li class="bord"><a href="profil.php"><i class="icon-user"></i> &nbsp; <span class="nav-item-text">Changer mon mot de passe</span></a></li>

                    <li><a href="deconnexion.php"><i class="icon-logout"></i> &nbsp; <span class="nav-item-text">Déconnexion</span></a></li>

                    </ul>
                </nav>
            </aside>
            <main class="main-content">
                <h4 align="right"><strong><?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']  ?> </strong></h4>
                <h5 align="right" style="color:#00b185;"> <strong><?php echo  $_SESSION['libelle'] ?></strong></h5>

                <h5 align="left" style="margin-top:-70px;margin-bottom:120px;margin-left:-60px;"> <?php echo (date('d-m-Y')); ?></h5>
                <h5 align="left" style="margin-top:-100px;margin-bottom:130px;margin-left:-60px;color:#00b185;"> Fin de préinscription : <?php echo $d['date_fin']; ?></h5>
                </div>
                <div class="text-center mb-5">
                </div>
                <h2 align="center">Liste des candidats en <?php echo utf8_encode($dat['design_depart']) ?> </h2>
                <!-- Button trigger modal -->
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button> -->

                <!-- Modal -->

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
                                        <th scope="col">Téléphone</th>
                                        <th scope="col">Document</th>
                                        <th scope="col">Etat document</th>


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

                                        $num=$datlist['num_recu'];
                                        $query=mysqli_query($link,"SELECT * FROM message WHERE num_recu='$num' AND statut=1 ORDER BY id DESC");
                                        $data = mysqli_fetch_array($query)
                                    ?>
                                        <div class="modal fade" id="<?php echo "exampleModal".$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="liste_candidat.php" method="POST">
                                                        
                                                            <textarea name="message" id="" cols="40" rows="5"></textarea>
                                                           <input type="hidden" name="num_recu" id="" value="<?= $datlist['num_recu'] ?>">
                                                            <div class="modal-footer">

                                                                <input type="submit" class="btn btn-primary" name="submit" value="Enregistrez">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermez</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <tr>

                                            <td><?= $i ?></td>
                                            <!-- <td><?= $datlist['num_recu']; ?></td> -->
                                            <!-- <td><?= $datlist['nin']; ?></td> -->
                                            <td><?= utf8_encode($datlist['nom']); ?></td>
                                            <td><?= utf8_encode($datlist['prenom']); ?></td>
                                            <td><?= utf8_encode($datlist['date_naiss']); ?></td>
                                            <td><?= utf8_encode($datlist['lieu_naiss']); ?></td>
                                            <td><?= utf8_encode($datlist['tel_mobile']); ?></td>
                                            <td> <a href="http://omega-xd.univ-comores.km/dossier/<?= utf8_encode($datlist['user_candidat_id']); ?> " target='_blank'>Document</a></td>
                                            <td> <?php if(mysqli_num_rows($query) ==0){?><a href="liste_candidat.php?O=<?= $datlist['num_recu'] ?>">Complet</a>-  <a href="#modal" data-bs-target="<?php echo "#exampleModal".$i?>"  data-bs-toggle="modal" data-id="<?= $datlist['num_recu'] ?>" class="submit">Incomplet</a><?php } else {?>Message envoyé <?php  } ?> </td>



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
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

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

                <script>
                    $(document).ready(function() {
                        // $('.submit').click(function() {
                        //     var id = $(this).data('id');
                        //     $('.num_recu').append("<input type='text' class='control' id='num_recu' name='num_recu' value="+id+">");
                            
                            
                        // });
                    });
                </script>



    </body>

    </html>
<?php } else { ?>
    <h3 align="center" style="font-family:arial;margin-top:20%;">D&eacute;sol&eacute;, vous n'avez pas les privil&eacute;ges d'acc&eacute;der &agrave; cette page! </h3>
    <h3 align="center" style="font-family:arial;margin-top:20%;"><a href="userInterface.php"> retour &agrave; la page d'acceuil</a>
    <?php }

    ?>