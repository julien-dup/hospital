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
        foreach ($getNbInfo as $patient) { ?>
            <form action="profile_patient.php" method="post">
                <div class="infoAndButton">
                    <input type="hidden" name="id" value="<?= $patient['id'] ?>" ><?= $patient['lastname'] ?> <?= $patient['firstname'] ?> <?= $patient['phone'] ?>
                    <button type="submit" name="buttonDetails">Détails
                    </button>
                    <button type="submit" name="deleteClient">Supprimer
                    </button>
                    </p>
                </div>

            </form>
        <?php
        } ?>

       
            <ul class="test">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li  <?= ($currentPage == 1) ? "disabled" : "" ?>>
                    <a href="liste_des_patients.php?page=<?= $currentPage - 1 ?>" >Précédente</a>
                </li>
                <?php for ($page = 1; $page <= $nbPages; $page++) : ?>
                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                    <li  <?= ($currentPage == $page) ? "active" : "" ?>>
                        <a href="liste_des_patients.php?page=<?= $page ?>" ><?= $page ?></a>
                    </li>
                <?php endfor ?>
                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <li  <?= ($currentPage == $nbPages) ? "disabled" : "" ?>>
                    <a href="liste_des_patients.php?page=<?= $currentPage + 1 ?>" >Suivante</a>
                </li>
            </ul>
        


        <a href="index.php"><button type="button">Accueil
            </button></a>
    </div>

</body>

</html>