<?php
    function debugArray($array) {
        echo('<pre>');
        print_r($array);
        echo('</pre>');
        die();
    }

    function checkIdentity() {
        $userId = $_POST['userId'];
        $targetId = $_POST['targetId'];
        if( !is_allowed($userId, $targetId) ) {
            echo('notAllowed');
            die();
        }
    }

    function QueryError($msg,$sql, $error) {
	echo '<strong>'.$msg.'</strong>:<hr>';
	echo $sql;
	echo '<hr>';
	echo $error;
	$logmsg = "$msg<hr/>$sql<pre>".print_r($error,true)."</pre>";
	error_log($logmsg);
	die();
    }
?>
