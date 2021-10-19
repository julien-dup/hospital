<?php

require "./database.php";

class Patients extends Database
{


    public function  addPatient($lastname, $firstname, $birthdate, $phoneNumber, $mail)
    {
            $bdd = $this->connectDatabase();
            $myQuery = "INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)";
            $first_query = $bdd->prepare($myQuery);
            $first_query->execute(array(
                'lastname' => $lastname,
                'firstname' => $firstname,
                'birthdate' => $birthdate,
                'phone' => $phoneNumber,
                'mail' => $mail
            ));
        
    }
    public function  showPatient()
    {
        $bdd = $this->connectDatabase();
        $myQuery = "SELECT * FROM `patients`";
        $first_query = $bdd->query($myQuery);
        $result = $first_query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function  showDetailPatient($id)
    {
        $bdd = $this->connectDatabase();
        $myQuery = "SELECT * FROM `patients`
        WHERE id='$id'";
        $first_query = $bdd->query($myQuery);
        $result = $first_query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function  showRdvPatient($id)
    {
        $bdd = $this->connectDatabase();
        $myQuery = "SELECT dateHour FROM `appointments`
        inner join patients  on appointments.idPatients = patients.id
        where patients.id = $id";
        $first_query = $bdd->query($myQuery);
        $result = $first_query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updatePatient ($nom, $prenom, $anniversaire, $numero, $email, $id) 
    {
    $bdd = $this->connectDatabase();
    $myQuery = "UPDATE patients SET lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone, mail = :mail WHERE id = $id ";
    $first_query = $bdd->prepare($myQuery);
    $first_query->execute(array(
    'lastname' => $nom,
    'firstname' => $prenom,
    'birthdate' => $anniversaire,
    'phone' => $numero,
    'mail' => $email
    ));
    }

    public function getIdAndSaveApppointment($nom, $appointment)
    {
        $bdd = $this->connectDatabase();
        $firstQuery = "SELECT id from patients where lastname ='$nom'";
        $queryId = $bdd->query($firstQuery);
        $id = $queryId->fetch();
        var_dump($id[0]);
        var_dump($appointment);
        $Secund_Query ="INSERT INTO appointments (dateHour, idPatients) VALUES (?, ?)";
        $my_Secund_Query = $bdd->prepare($Secund_Query);
        $my_Secund_Query->execute(array(
          $appointment,
          $id[0] 
        ));   
    }

    public function getAllRdv()
    {
        $bdd = $this->connectDatabase();
        $Secund_Query ="SELECT  appointments.id, dateHour, lastname, firstname, patients.id as toto FROM `appointments`
        inner join patients on appointments.idPatients = patients.id";
        $my_Secund_Query = $bdd->query($Secund_Query);
        $result = $my_Secund_Query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
       
    }

    public function to_modify_Rdv($idRdv) {
        $bdd = $this->connectDatabase();
        $Secund_Query ="SELECT appointments.id, dateHour, lastname, firstname, patients.id as toto FROM `appointments`
        inner join patients on appointments.idPatients = patients.id
        where appointments.id = $idRdv";
        $my_Secund_Query = $bdd->query($Secund_Query);
        $result = $my_Secund_Query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function ConfirmModifyRdv ($dateHour,$idPatient, $idRdv) 
    {
    $bdd = $this->connectDatabase();
    $myQuery = "UPDATE appointments SET  dateHour = ?, idPatients = ?  WHERE id = '$idRdv' ";
    $first_query = $bdd->prepare($myQuery);
    $first_query->execute(array(
        $dateHour,
        $idPatient

    ));
    }
    

    public function getIdPatient($firstname, $lastname) {
        $bdd = $this->connectDatabase();
        $myQuery ="SELECT  patients.id as toto FROM `patients`
        where firstname = '$firstname' and lastname = '$lastname' ";
         $my_Secund_Query = $bdd->query($myQuery);
         $result = $my_Secund_Query->fetchAll(PDO::FETCH_ASSOC);
         return $result;

    }

    public function deleteRdv($idRdv) {
        $bdd = $this->connectDatabase();
        var_dump($idRdv);
        $myQuery ="DELETE from appointments where id = '$idRdv' ";
        $myQuery = $bdd->query($myQuery);
    }

    public function deleteClient($idPatient) {
        $bdd = $this->connectDatabase();
        var_dump($idPatient);
        $myQuery ="DELETE from appointments where  appointments.idPatients =$idPatient ; 
        delete from patients
        where patients.id = $idPatient;";
        $myQuery = $bdd->query($myQuery);
    }

    public function getInfoPatient($name) {
        $bdd = $this->connectDatabase();
        $myQuery ="SELECT  * FROM `patients`
        where lastname like '%$name%' ";
         $my_Secund_Query = $bdd->query($myQuery);
         $result = $my_Secund_Query->fetchAll(PDO::FETCH_ASSOC);
         return $result;
    }

    public function getId($birthdate) {
        $bdd = $this->connectDatabase();
        $myQuery ="SELECT  id FROM `patients`
        where birthdate = '$birthdate' ";
         $my_Secund_Query = $bdd->query($myQuery);
         $result = $my_Secund_Query->fetchAll(PDO::FETCH_ASSOC);
         var_dump($result);
         return $result;
    }

    public function countNbPages($parPage) {
    $bdd = $this->connectDatabase();
    $sql = 'SELECT COUNT(*) AS nb_patients FROM `patients`';
    $query = $bdd->prepare($sql);
    $query->execute();
    $result = $query->fetch();
    $nbArticles = (int) $result['nb_patients'];
    $pages = ceil($nbArticles / $parPage);
    return $pages;
    }

    public function getInfoPatients($currentPage, $parPage) {
    $bdd = $this->connectDatabase();
    $premier = ($currentPage * $parPage) - $parPage;
    $secund_sql = 'SELECT * FROM `patients` LIMIT :premier, :parpage';
    $query = $bdd->prepare($secund_sql);
    $query->bindValue(':premier', $premier, PDO::PARAM_INT);
    $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);
    $query->execute();
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
    }

    public function getIdAndSaveApppointmentandPatient($birthdate, $dateHour)
    {
        $bdd = $this->connectDatabase();
        $firstQuery = "SELECT id from patients where birthdate ='$birthdate'";
        $queryId = $bdd->query($firstQuery);
        $id = $queryId->fetch();
        var_dump($id[0]);
        $Secund_Query ="INSERT INTO appointments (dateHour, idPatients) VALUES (?, ?)";
        $my_Secund_Query = $bdd->prepare($Secund_Query);
        $my_Secund_Query->execute(array(
          $dateHour,
          $id[0] 
        
        ));   
    }
}




    
