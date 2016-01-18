<?php
    function getPsychoVisitByPatient() {
      $mysqli = getMysqli();
      $sql = "SELECT * FROM medical_check WHERE 'id_patient' = ".$idPatient.";";
      $result = array();
      $query = $mysqli->query($sql);
      while ($row = $query->fetch_assoc() ) {
          array_push($result, $row);
      }
      return $result;
    }

?>

<?php
    function insertPsychoVisit($psychoVisit) {
      $mysqli = getMysqli();

      $sql = "INSERT INTO psychological_test VALUES(".$psychoVisit['id_patient'].", ".$psychoVisit['date_psycho'].", ".$psychoVisit['minibesttest_score'].", ".$psychoVisit['greco_global'].", ".
      $psychoVisit['greco_immediat'].", ".$psychoVisit['greco_differe'].");";
      $result = $mysqli->query($sql);
      return $result;
  }

?>
