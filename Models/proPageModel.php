<?php
    function getProPage($user) {
        $mysqli = getMysqli();
        $sql = "SELECT * FROM user INNER JOIN professionnal_account ON 'user.id_user' = 'professionnal_account.id_user' WHERE 'user.id_user' = ".$user.";";
        $result = array();
    		$query = $mysqli->query($sql);
    		while ($row = $query->fetch_assoc() ) {
    			array_push($result, $row);
    		}
    		return $result;
    }

?>
