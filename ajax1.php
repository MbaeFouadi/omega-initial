<?php
session_start();
include('connexion.php');

if(isset($_POST['code_facult']) && !empty($_POST['code_facult']))
{
	// $query=mysqli_query($link,"SELECT * FROM departement,disposition WHERE departement.code_depart=disposition.code_depart and code_facult='".$_POST['code_facult']."' and disposition.statut=1 and (code_niv='N1'or code_niv='P1') ") or die(mysqli_error($link));
	
    $query=mysqli_query($link,"SELECT * FROM departement WHERE  code_facult='".$_POST['code_facult']."' and statut=1 ") or die(mysqli_error($link));
	
   
    if(mysqli_num_rows($query)>0)


    {?>
        
        <?php while($data=mysqli_fetch_array($query)){?>
            <option disabled selected hidden>selectionner le departement</option>    
        <option value="<?=utf8_encode($data['code_depart'])?>"><?=utf8_encode($data['design_depart'])?></option>
        <?php
        }
    }
    
}