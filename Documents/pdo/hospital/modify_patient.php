<?php

require "controllers.php"

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Modification</title>
</head>
<body>
<div id="contain">
        <div id="h1otherPage">
        <p>Veuillez renseigner ces champs</p>
        </div>
       
        <form action="modify_patient.php" method="post">
            <label for="Nom" name="nom">Votre nom</label>
            <input type="text" name="nom" id="nom" value="<?= $showDetailPatient[0]["lastname"] ?? $_POST['nom'] ?>" >
            <span id="firstname" class="<?= isset($classLastName) ? $classLastName : "" ?>"><?= $validatelastname ?></span>
            <label for="Prénom" name="prenom">Votre Prénom</label>
            <input type="text" name="prenom" id="prenom" value="<?= $showDetailPatient[0]["firstname"] ?? $_POST['prenom'] ?>">
            <span id="lastname" class="<?= isset($classFirstName) ? $classFirstName : "" ?>"><?= $validatefirstname ?></span>
            <label for="Date de naissance" name="anniversaire">Votre date de naissance</label>
            <input type="date" name="anniversaire" value="<?= $showDetailPatient[0]["birthdate"] ?? $_POST['anniversaire'] ?>" >
            <span id="messageInfoBirthdate"></span>
            <label for="Numéro de téléphone" name="phoneNumber">Votre numéro de téléphone</label>
            <input type="number" name="numero" value="<?= $showDetailPatient[0]["phone"] ?? $_POST['numero'] ?>" >
            <span id="messageInfoPhone"></span>
            <label for="Adresse mail"name="mail">Votre adresse mail </label>
            <input type="text" name="mail"  value="<?= $showDetailPatient[0]["mail"] ?? $_POST['mail'] ?>" >
            <span id="messageInfoMail" id="mail" class="<?= isset($classMail) ? $classMail : "" ?>"><?= $validateMail ?></span>
            <input type="hidden" name="id" value="<?= $showDetailPatient[0]["id"] ?? $_POST['id'] ?>" >
            <div id="formulaireButton">
                <button name="ConfirmModifyButton" type="submit">Valider</button>
                <a href="liste_des_patients.php"><button type="button" id='button'>Retour</button></a>
            </div>
        </form>
       
</div> 
</body>
</html>

