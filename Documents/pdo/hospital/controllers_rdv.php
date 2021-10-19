<?php
$validatefirstname = "";
$validatelastname = "";
$validateRdv = "";
$i = 0;
$e= 0;



$regName =  "/^[a-z0-9_-]{3,15}$/";


require "class_patient.php";


// vérifie les champs et ajoute un rdv au click du bouton "validateRdv"
    if (isset($_POST["validateRdv"])) {
        
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $appointment = $_POST["rdv"];

        // on récupère le tableau des mails que l'ont stock dans une variable $showPatient
        $patientObj = new Patients();
        $showPatient = $patientObj->showPatient();

        // var_dump(count($showPatient));
        

        for ($i=0 ; $i<count($showPatient); $i++) {


            if (preg_match($regName, $nom) && in_array($nom, $showPatient[$i]))  {
                $validatelastname = "good";
                $classLastName = "correct";
                break;
            } else {
                $validatelastname = "mauvais format ou nom non référencé";
                $classLastName = "erreur";
                $e++;
            }
        

            if (preg_match($regName, $prenom) && in_array($prenom, $showPatient[$i])) {
                $validatefirstname = "good";
                $classFirstName = "correct";
                break;
            } else {
                $validatefirstname = "mauvais format ou prénom non référencé";
                $classFirstName = "erreur";
                $e++;
            }
        }

        if (empty($appointment)) {
            $validateRdv = "veuillez renseigné une date";
            $classRdv = "erreur";
            $e++;
        }

        if ($i === 0) {
            $patientObj = new Patients();
            $patientObj->getIdAndSaveApppointment($nom, $appointment);
            header("Location: add_rdv_validate.php");
        }
    }

$patientObj = new Patients();
$getAllRdv = $patientObj->getAllRdv();



 if (isset($_POST["buttonModifyRdv"])) {
    $idRdv = $_POST["id"];
    $patientObj = new Patients();
    $to_modify_Rdv = $patientObj->to_modify_Rdv($idRdv);
}





if (isset($_POST["buttonConfirmModifyRdv"])) {
    $lastname = htmlspecialchars($_POST["lastname"]);
    $dateHour = $_POST["dateHour"];
    $firstname = htmlspecialchars($_POST["firstname"]);
    $idRdv = $_POST["id"];
    $patientObj = new Patients();
    $showPatient = $patientObj->showPatient();


    for ($i=0 ; $i<count($showPatient); $i++) {


        if (preg_match($regName, $lastname) && in_array($lastname, $showPatient[$i])) {
            $validatelastname = "good";
            $classLastName = "correct";
            $e++;
            break;
        } else {
            $validatelastname = "mauvais format ou nom non référencé";
            $classLastName = "erreur";
        }
    }
        for ($i=0 ; $i<count($showPatient); $i++) {
        if (preg_match($regName, $firstname) && in_array($firstname, $showPatient[$i])) {
            $validatefirstname = "good";
            $classFirstName = "correct";
            $e++;
            break;
        } else {
            $validatefirstname = "mauvais format ou prénom non référencé";
            $classFirstName = "erreur";
        }
    }

    if (empty($dateHour)) {
        $validateRdv = "veuillez renseigné une date";
        $classRdv = "erreur";
    } else {
        $e++;
    }

    $patientObj = new Patients();
    $idPatient = $patientObj->getIdPatient($firstname, $lastname);
    $idPatient = $idPatient[0];
    foreach ($idPatient as  $value) {
        $idPatient = $value;
    }
    var_dump($idPatient);
    var_dump($dateHour);
    var_dump($idRdv);
    $patientObj->ConfirmModifyRdv($dateHour, $idPatient, $idRdv);
    header("Location: modifRdv_validate.php");

}

if(isset($_POST["buttonDeleteRdv"])) {
    $idRdv = $_POST["id"];
    $patientObj = new Patients();
    $patientObj->deleteRdv($idRdv);
    header("Location: deleteRdv_validate.php");
}

