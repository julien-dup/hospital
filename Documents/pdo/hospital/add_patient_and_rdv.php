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
    <title>Formulaire d'ajout</title>
</head>

<body>
    <div id="contain">
        <div id="h1otherPage">
            <p>Nouveau patient</p>
        </div>
        <form action="add_patient_and_rdv.php" method="post">
            <label for="Nom" name="nom">Votre nom</label>
            <input type="text" name="nom" id="nom" value="<?=  $_POST["nom"] ?? "" ?>" >
            <span id="firstname" class="<?= isset($classFirstName) ? $classFirstName : "" ?>"><?= $validatefirstname ?></span>
            <label for="Prénom" name="prenom">Votre Prénom</label>
            <input type="text" name="prenom" id="prenom" value="<?= $_POST["prenom"] ?? "" ?>">
            <span id="lastname" class="<?= isset($classLastName) ? $classLastName : "" ?>"><?= $validatelastname ?></span>
            <label for="Date de naissance" name="birthdate">Votre date de naissance</label>
            <input type="date" name="birthdate" value="<?= $_POST["birthdate"] ?? "" ?>"></imput>
            <span id="messageInfoBirthdate"></span>
            <label for="Numéro de téléphone" name="phoneNumber">Votre numéro de téléphone</label>
            <input type="number" name="phoneNumber" value="<?= $_POST["phoneNumber"] ?? "" ?>"></imput>
            <span id="messageInfoPhone"></span>
            <label for="Adresse mail" name="mail">Votre adresse mail </label>
            <input type="text" name="mail" value="<?= $_POST["mail"] ?? "" ?>"> </imput>
            <span id="messageInfoMail" id="mail" class="<?= isset($classMail) ? $classMail : "" ?>"><?= $validateMail ?></span>

    </div>
    <div id="contain">
        <div id="h1otherPage">
            <p>Créer un rendez-vous </p>
        </div>

        
        <label for="Nom" name="dateHour">Date et Heure</label>
        <input type="datetime-local" name="rdv" id="rdv" value="<?=  $_POST["rdv"] ?? "" ?>">
        <span id="rdv" class="<?= isset($classRdv) ? $classRdv : "" ?>"><?= $validateRdv ?></span>
        <button name="validatePatientAndRdv" type="submit">Valider</button>
        <a href="index.php"><button type="button">Accueil
            </button></a>
        </form>

        <?php

        ?>

</body>

</html>