<?php
//session_start();
    if(isset($_SESSION['login']) and $_SESSION['cat']=="10"){?>
        <ul class="nav-items">
                        <li><a href="userInterface.php"><i class="icon-grid"></i> &nbsp; <span class="nav-item-text">Tableau de bord</span></a></li>
                        <li><a href="choix_dep_dossier.php"><i class="icon-printer"></i> &nbsp; <span class="nav-item-text">Valider un dossier</a></li>
                        <!-- <li>
                        <a data-toggle="collapse" href="#collapseMenu8" role="button" aria-expanded="false" aria-controls="collapseMenu8"><i class="icon-pencil"></i> &nbsp; <span class="nav-item-text">Inscription</span></a>
                        <ul class="menu-dd collapse" id="collapseMenu8">
                            <li><a href="verif_n.php"> &nbsp;Nouvelle inscription</a></li>
                            <li><a href="verif_quitus.php">&nbsp;  Ré-inscription</a></li>
                            
                            
                        </ul>
                    </li> -->
                    <!--li><a href="#"><i class="icon-note"></i> &nbsp; <span class="nav-item-text">Inscription</span></a></li>
                   
                    <li>
                        <a data-toggle="collapse" href="#collapseMenu2" role="button" aria-expanded="false" aria-controls="collapseMenu1"><i class="icon-people"></i> &nbsp; <span class="nav-item-text">Etudiants</span></a>
                        <ul class="menu-dd collapse" id="collapseMenu2">
                            <li><a href=""><i class="icon-pencil"></i> &nbsp; Editer un certificat de scolarité</a></li>
                            <li><a href=""><i class="icon-pencil"></i> &nbsp; Editer une fiche de renseignements</a></li>
                            <li><a href=""><i class="icon-printer"></i> &nbsp; Imprimer une liste</a></li>
                        </ul>
                    </li-->
                    <li>
                        <a data-toggle="collapse" href="#collapseMenu3" role="button" aria-expanded="false" aria-controls="collapseMenu2"><i class="icon-magnifier"></i> &nbsp; <span class="nav-item-text">Rechercher ...</span></a>
                        <ul class="menu-dd collapse" id="collapseMenu3">
                            <li><a href="recherche_etudiant.php"><i class=""></i> &nbsp;  un dossier</a></li>

                           
                            
                            
                        </ul>
                    </li>
                   
<?php }
?>

