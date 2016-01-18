<?php

function getKineVisitByPatient($idPatient) {
    $mysqli = getMysqli();
    $sql = "SELECT * FROM kine_test WHERE 'idPatient' = ".$idPatient.";";
    $result = array();
    $query = $mysqli->query($sql);
    while ($row = $query->fetch_assoc() ) {
        array_push($result, $row);
    }
    return $result;
}

    function insertKineVisit($kine) {
        $mysqli = getMysqli();

        $sql = "INSERT INTO kine_test(id_patient, date_kine, tinettiPoma, getupandgo, slow_walk, fast) VALUES(".$kine['id_patient'].", ".$kine['date_kine'].", ".$kine['tinettiPoma'].", ".$kine['getupandgo'].", ".$kine['slow_walk'].", ".$kine['fast_walk'].");";
        $result = $mysqli->query($sql);
        return $result;
    }

?>
