<?php

require "controllers_rdv.php";
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Liste RDV</title>
</head>
<body>
<div id="contain">
<div id="h1otherPage">
<p>Liste des rendez-vous </p>
</div>
<?php
 foreach ($getAllRdv as $rdv) { ?>

 <form action="modify_rdv.php" method="post">
     <div class="infoAndButton">
    <input type="hidden" name="id" value="<?=$rdv['id']?>">
    <input type="hidden" name="idPatient" value="<?=$rdv['toto']?>">
    <input type="text"name="dateHour" value="<?= $rdv['dateHour']?>"disabled>  
    <input name="lastname" value="<?= $rdv['lastname']?>" disabled>   
    <input name="firstname" value="<?= $rdv['firstname']?>" disabled>
       <button type="submit" name="buttonModifyRdv">Modifier
            </button>
            <button type="submit" name="buttonDeleteRdv">Supprimer
            </button>
    
     </div>
     
</form>

<?php
 }?>


<a href="index.php"><button type="button">Accueil
</button></a>
<a href="formulaire_rdv.php"><button type="button">Créer Rdv
</button></a>
</div>
</body>
</html>