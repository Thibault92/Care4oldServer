<?php
    function getPatientPage($user) {
        $mysqli = getMysqli();
        $sql = "SELECT * FROM user INNER JOIN patient_account ON 'user.id_user' = 'patient_account.id_user' WHERE 'user.id_user' = ".$user.";";
        $result = array();
    		$query = $mysqli->query($sql);
    		while ($row = $query->fetch_assoc() ) {
    			array_push($result, $row);
    		}
    		return $result;
    }

?>
