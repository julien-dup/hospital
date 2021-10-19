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
    <title>Détail du patient</title>
</head>

<body>

    <div id="contain">
        <div id="h1otherPage">
            <p>Informations du patient </p>
        </div>
        <?php
        foreach ($showDetailPatient as $patient) { ?>
            <form action="modify_patient.php" method="post">
                <div class="infoAndButton">
                    <p>NOM : </p>
                    <input type="text" name="nom" disabled value="<?= $patient['lastname'] ?>">
                </div>
                <div class="infoAndButton">
                    <p>PRENOM : </p>
                    <input type="text" name="prenom" disabled value="<?= $patient['firstname'] ?>">
                </div>
                <div class="infoAndButton">
                    <p>MAIL : </p>
                    <input type="text" name="email" disabled value="<?= $patient['mail'] ?>">
                </div>
                <div class="infoAndButton">
                    <p>DATE DE NAISSANCE : </p>
                    <input type="text" name="anniversaire" disabled value="<?= $patient['birthdate'] ?>">
                </div>
                <div class="infoAndButton">
                    <p>TELEPHONE : </p>
                    <input type="text" disabled name ="numero" value="<?= $patient['phone'] ?>">
                    <input type="hidden" name="id" value="<?= $patient['id'] ?>">
                </div>
                <p><br></p>
                <div class="infoAndButton">
                    <p>RENDEZ-VOUS : </p>
                    
                    <?php
                    foreach($showRdvPatient as $rdv) {?>
                    <div class="rdv">
                    <input type="text" disabled name ="numero" value="<?= $rdv["dateHour"] ?>">
                    <?php } ?>
                    </div>
                </div>
                <button name="modifyButton" type="submit">modifier</button>

            </form>
    
<?php
        } ?>
<div class="HomePage">
<a href="liste_des_patients.php"><button type="button">retour
    </button></a>
</div>

</div>

</body>

</html>