<?php

    function getHospitalisationsByPatient($idPatient) {
        $mysqli = getMysqli();
        $sql = "SELECT * FROM hospitalisation WHERE 'idPatient' = ".$idPatient.";";
        $result = array();
        $query = $mysqli->query($sql);
        while ($row = $query->fetch_assoc() ) {
            array_push($result, $row);
        }
        return $result;
    }

    function insertHospitalisation($hosp) {
        $mysqli = getMysqli();
        $sql = "INSERT INTO hospitalisation(id_patient,date_entry, dateStart, dateEnd, reason) VALUES($hosp['id_patient']." ,".$hosp[''date_entry'']." ,".$hosp['dateStart']." ,".$hosp['dateEnd']." ,".
            $hosp['reason'].");";
        $result = $mysqli->query($sql);
        return $result;
    }

?>
