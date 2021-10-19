<?php
$validateRdv ="";
$validatefirstname = "";
$validatelastname = "";
$validateMail = "";
$i = 0;
$e = 0;

session_start();


$regName =  "/^[a-z0-9_-]{3,15}$/";


require "class_patient.php";


// vérifie les champs et ajoute le patient à la bdd si ok
if (isset($_POST["myButton"])) {
    $lastname = htmlspecialchars($_POST["nom"]);
    $firstname = htmlspecialchars($_POST["prenom"]);
    $birthdate = $_POST["birthdate"];
    $phoneNumber = $_POST["phoneNumber"];
    $mail = htmlspecialchars($_POST["mail"]);

    $arrayMail = array("julien@gmail.com", "habib@hotmail.fr", "paul@gmail.com");


    if (!preg_match($regName, $lastname)) {
        $validatelastname = "mauvais format";
        $classLastName = "erreur";
        $i++;
    } else {
        $validatelastname = "good";
        $classLastName = "correct";
    }

    if (!preg_match($regName, $firstname)) {
        $validatefirstname = "mauvais format";
        $classFirstName = "erreur";
        $i++;
    } else {
        $validatefirstname = "good";
        $classFirstName = "correct";
    }

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $validateMail = "mauvais format";
        $classMail = "erreur";
    } else if (filter_var($mail, FILTER_VALIDATE_EMAIL) && in_array($_POST['mail'], $arrayMail)) {
        $validateMail = "email déjà enregistré";
        $classMail = "erreur";
        $i++;
    } else {
        $validateMail = "good";
        $classMail = "correct";
    }

    if ($i === 0) {
        $patientObj = new Patients();
        $patientObj->addPatient($lastname, $firstname, $birthdate, $phoneNumber, $mail);
        header("Location: add_validate.php");
    }
}


// stock les info d'un patients dans un objet au click du bouton "buttonDetail"
if (isset($_POST["buttonDetails"])) {
    $id = $_POST["id"];
    $patientObj = new Patients();
    $showDetailPatient = $patientObj->showDetailPatient($id);
    $showRdvPatient = $patientObj->showRdvPatient($id);
}


// stock la liste des patients 
$patientObj = new Patients();
$showPatient = $patientObj->showPatient();


// stock les infos d'un patient au click du bouton "modifyButton"
if (isset($_POST["modifyButton"])) {
    $id = $_POST["id"];
    $patientObj = new Patients();
    $showDetailPatient = $patientObj->showDetailPatient($id);
}



// vérifie les champs et mets à jours les infos d'un patient au click du bouton "confirmModifyButton"
if (isset($_POST["ConfirmModifyButton"])) {
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $anniversaire = $_POST["anniversaire"];
    $numero = $_POST["numero"];
    $email = htmlspecialchars($_POST["mail"]);
   
   
    

    $arrayMail = array("julien@gmail.com", "habib@hotmail.fr", "paul@gmail.com");


    if (!preg_match($regName, $nom)) {
        $validatelastname = "mauvais format";
        $classLastName = "erreur";
        $e++;
    } else {
        $validatelastname = "good";
        $classLastName = "correct";
    }

    if (!preg_match($regName, $prenom)) {
        $validatefirstname = "mauvais format";
        $classFirstName = "erreur";
        $e++;
    } else {
        $validatefirstname = "good";
        $classFirstName = "correct";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validateMail = "mauvais format";
        $classMail = "erreur";
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL) && in_array($_POST['mail'], $arrayMail)) {
        $validateMail = "email déjà enregistré";
        $classMail = "erreur";
        $e++;
    } else {
        $validateMail = "good";
        $classMail = "correct";
    }

    if ($e === 0) {
        $id = $_POST["id"];
        $patientObj = new Patients();
        $patientObj->updatePatient($nom, $prenom, $anniversaire, $numero, $email, $id);
        header("Location: modif_validate.php");
    }
}

if(isset($_POST["deleteClient"])) {
    $idPatient = $_POST["id"];
    $patientObj = new Patients();
    $patientObj->deleteClient($idPatient);
    header("Location: deletepatient_validate.php");
}




if (isset($_POST["buttonSearchBarr"])) {
    $name = htmlspecialchars($_POST["searchBarr"]);
   
    $patientObj = new Patients();
    $showPatient = $patientObj->showPatient();

    for ($i=0 ; $i<count($showPatient); $i++) {
        if (preg_match($regName, $name) && in_array($name, $showPatient[$i])) {
            $e++;
            break;
        } else {
            $validatelastname = "mauvais format ou nom/prénom non référencé";
            $classLastName = "erreur";
        }
    }

    if ($e === 1) {
            $patientObj = new Patients();
            $resultSearchPatient = $patientObj->getInfoPatient($name);
            $_SESSION["resultSearchPatient"] = $resultSearchPatient ;
            header("Location: searchPatientResult.php");
            }
            
}

// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
    $patientObj = new Patients();
$parPage = 3;
$nbPages = $patientObj->countNbPages($parPage);
$getNbInfo = $patientObj->getInfoPatients($currentPage, $parPage);

}else{
    $currentPage = 1;
    $parPage = 3;
    $patientObj = new Patients();
$nbPages = $patientObj->countNbPages($parPage);
$getNbInfo = $patientObj->getInfoPatients($currentPage, $parPage);
}


if(isset($_POST["validatePatientAndRdv"])) {
   
        $lastname = htmlspecialchars($_POST["nom"]);
        $firstname = htmlspecialchars($_POST["prenom"]);
        $birthdate = $_POST["birthdate"];
        $phoneNumber = $_POST["phoneNumber"];
        $mail = htmlspecialchars($_POST["mail"]);
        $dateHour = $_POST["rdv"];

       
       
        
    
        $arrayMail = array("julien@gmail.com", "habib@hotmail.fr", "paul@gmail.com");
    
    
        if (!preg_match($regName, $lastname)) {
            $validatelastname = "mauvais format";
            $classLastName = "erreur";
            $e++;
        } else {
            $validatelastname = "good";
            $classLastName = "correct";
        }
    
        if (!preg_match($regName, $firstname)) {
            $validatefirstname = "mauvais format";
            $classFirstName = "erreur";
            $e++;
        } else {
            $validatefirstname = "good";
            $classFirstName = "correct";
        }
    
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $validateMail = "mauvais format";
            $classMail = "erreur";
        } else if (filter_var($mail, FILTER_VALIDATE_EMAIL) && in_array($_POST['mail'], $arrayMail)) {
            $validateMail = "email déjà enregistré";
            $classMail = "erreur";
            $e++;
        } else {
            $validateMail = "good";
            $classMail = "correct";
        }

        if (empty($dateHour)) {
            $validateRdv = "veuillez renseigné une date";
            $classRdv = "erreur";
        } else {
            $e++;
        }
    
        if ($i === 0) {
            $patientObj = new Patients();
            $addPatient = $patientObj->addPatient($lastname, $firstname, $birthdate, $phoneNumber, $mail);
            $getIdAndSaveApppointmentandPatient = $patientObj->getIdAndSaveApppointmentandPatient($birthdate, $dateHour);
            header("Location: add_rdv__and_patient_validate.php");
        }

}







