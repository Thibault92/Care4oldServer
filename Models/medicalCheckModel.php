<?php
      function getmedicalCheckByPatient($idPatient) {
        $mysqli = getMysqli();
        $sql = "SELECT * FROM medical_check WHERE 'id_patient' = ".$idPatient.";";
        $result = array();
        $query = $mysqli->query($sql);
        while ($row = $query->fetch_assoc() ) {
            array_push($result, $row);
        }
        return $result;
      }

      function insertmedicalCheck($mediVisit) {
          $mysqli = getMysqli();

          $sql = "INSERT INTO medical_check(id_patient, date_visit, height, weight, bmi, albumin, crp, vitamin_d, frequency, pressure, gir) VALUES(".$mediVisit['id_patient'].", ".$mediVisit['date_visit'].", ".$mediVisit['height'].", ".$mediVisit['weight'].", ".$mediVisit['bmi'].", ".
          $mediVisit['albumin'].", ".$mediVisit['crp'].", ".$mediVisit['vitamin_d'].", ".$mediVisit['frequency'].", ".$mediVisit['pressure'].", ".$mediVisit['gir'].");";
          $result = $mysqli->query($sql);
          return $result;
      }

?>
