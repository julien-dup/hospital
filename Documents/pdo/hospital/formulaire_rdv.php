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
    <title>Créer RDV</title>
</head>
<body>
<div id="contain">
        <div id="h1otherPage">
            <p>Créer un rendez-vous </p>
        </div>
<form action="formulaire_rdv.php" method="post">
            <label for="Nom" name="nom">Nom du patient</label>
            <input type="text" name="nom" id="nom" >
            <span id="firstname" class="<?= $classLastName ?? "" ?>"><?= $validatelastname ?></span>
            <label for="Prénom" name="prenom">Prénom du patient</label>
            <input type="text" name="prenom" id="prenom" >
            <span id="lastname" class="<?= isset($classFirstName) ? $classFirstName : "" ?>"><?= $validatefirstname ?></span>
            <label for="Nom" name="dateHour">Date et Heure</label>
            <input type="datetime-local" name="rdv" id="rdv" >
            <span id="rdv" class="<?= isset($classRdv) ? $classRdv : "" ?>"><?= $validateRdv ?></span>
            <button name="validateRdv" type="submit">Créer rdv</button>
            <a href="index.php"><button type="button">Accueil
            </button></a>
</form>
</body>
</html>

