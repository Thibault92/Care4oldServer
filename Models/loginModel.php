<?php
    function getUser() {
        $mysqli = getMysqli();
        $sql = "SELECT * FROM User";
        $result = array();
    		$query = $mysqli->query($sql);
    		while ($row = $query->fetch_assoc() ) {
    			array_push($result, $row);
    		}
    		return $result;
    }

    function getUserByEmail($email) {
        $mysqli = getMysqli();
        $sql = "SELECT * FROM User WHERE Name = ".$email.";";
        $result = array();
        $query = $mysqli->query($sql);
        while ($row = $query->fetch_assoc() ) {
          array_push($result, $row);
        }
        return $result;
    }
?>
