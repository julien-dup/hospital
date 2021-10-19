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
    <title>Modifier un rdv </title>
</head>
<body>
<div id="contain">
<div id="h1otherPage">
<p>Modifier le rdv </p>
</div>
<?php
 foreach ($to_modify_Rdv as $rdv) { ?>
 <form action="modify_rdv.php" method="post">
        <div class="infoAndButton">
        <label for="Nom" name="nom">Date et heure rdv </label> 
        <label for="Nom" name="nom">Nom</label> 
        <label for="Nom" name="nom">Prenom</label> 
        </div>
     <div class="infoAndButton">
    <input type="hidden" name="id" value="<?=$rdv['id'] ?>">
    <input type="hidden" name="idPatient" value="<?=$rdv['toto'] ?>">
    <input  name="dateHour" value="<?= $rdv['dateHour'] ?>" > 
    <input name="lastname" value="<?= $rdv['lastname'] ?>" >
    <span id="firstname" class="<?= isset($classLastName) ? $classLastName : "" ?>"><?= $validatelastname ?></span> 
     
    <input name="firstname" value="<?= $rdv['firstname'] ?>">
    <span id="lastname" class="<?= isset($classFirstName) ? $classFirstName : "" ?>"><?= $validatefirstname ?></span>
       <button type="submit" name="buttonConfirmModifyRdv">Confirmer
            </button>
    </p>
     </div>
     
</form>
<?php
 }?>


<a href="index.php"><button type="button">Accueil
</button></a>

</div>
</body>
</html>