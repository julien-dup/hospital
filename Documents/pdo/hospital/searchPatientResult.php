<?php

require "controllers.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Liste des patients</title>
</head>
<body>

<div id="contain">
<div id="h1otherPage">
<p>Liste des patients </p>
</div>
<form action="liste_des_patients.php" method="post">
<div class="searchBarr">
    <input type="text" name="searchBarr" placeholder="rechercher un patient">
    <span id="firstname" class="<?= $classLastName ?? "" ?>"><?= $validatelastname ?></span>
    <button type="submit" name="buttonSearchBarr">Rechercher</button>
</div>
</form>
<?php
 foreach ($_SESSION["resultSearchPatient"] as $patient) { ?>
 <form action="profile_patient.php" method="post">
     <div class="infoAndButton">
    <input type="hidden" name="id" value="<?=$patient['id']?>"
    <p><?= $patient['lastname']?>   <?= $patient['firstname']?>   <?= $patient['phone']?> 
       <button type="submit" name="buttonDetails">Détails
            </button>
            <button type="submit" name="deleteClient">Supprimer
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