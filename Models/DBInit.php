<?php
    function getMysqli() {
        return new mysqli(DBURL, DBUSER, DBPASS, DBTABLE);
    }

    function is_allowed($userId, $targetId) {
        $mysqli = getMysqli();
        $sql = "SELECT * FROM patientToPro WHERE 'idPro' = ".$userId." AND 'idPatient' = ".$targetId.";";
        $result = array();
        $query = $mysqli->query($sql);
        while ($row = $query->fetch_assoc() ) {
            array_push($result, $row);
        }
        if( sizeof($result) == 0 ) {
            return false;
        } else {
            return true;
        }
    }
?>
