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
        <p>Veuillez renseigner ces champs</p>
        </div>
        <form action="" method="post">
            <label for="Nom" name="nom">Votre nom</label>
            <input type="text" name="nom" id="nom">
            <span id="firstname" class="<?= isset($classFirstName) ? $classFirstName : "" ?>"><?= $validatefirstname ?></span>
            <label for="Prénom" name="prenom">Votre Prénom</label>
            <input type="text" name="prenom" id="prenom" >
            <span id="lastname" class="<?= isset($classLastName) ? $classLastName : "" ?>"><?= $validatelastname ?></span>
            <label for="Date de naissance" name="birthdate">Votre date de naissance</label>
            <input type="date" name="birthdate"></imput>
            <span id="messageInfoBirthdate"></span>
            <label for="Numéro de téléphone" name="phoneNumber">Votre numéro de téléphone</label>
            <input type="number" name="phoneNumber"></imput>
            <span id="messageInfoPhone"></span>
            <label for="Adresse mail"name="mail">Votre adresse mail </label>
            <input type="text" name="mail"> </imput>
            <span id="messageInfoMail" id="mail" class="<?= isset($classMail) ? $classMail : "" ?>"><?= $validateMail ?></span>
            <div id="formulaireButton">
                <button name="myButton" type="submit">Valider</button>
                <a href="index.php"><button type="button" id='button'>Retour</button></a>
            </div>
        </form>
    </div>

<?php

?>

</body>
</html>