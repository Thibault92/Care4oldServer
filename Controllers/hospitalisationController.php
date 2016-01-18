<?php
    $action = $_POST['action']; // set or get

    if( $_POST['action'] == 'get') {
        getAction();
    } else if( $_POST['action'] == 'set' ) {
        setAction();
    } else {
        echo('Invalid action');
        die();
    }


    function getAction() {

        checkIdentity();
        $idTarget = $_POST['targetId'];

        $result = getHospitalisationsByPatient($idTarget);
        $resultJson = json_encode($result);

        echo($resultJson);
        die();
    }

    function setAction() {

        checkIdentity();
        $reason     = $_POST['reason'];
        $dateEntry  = $_POST['date_entry']
        $dateStart  = $_POST['dateStart'];
        $dateEnd    = $_POST['dateEnd'];
        $targetId   = $_POST['id_patient'];


        $hospitalisation = array(
            'reason'    => $reason,
            'date_entry'=> $dateEntry,
            'dateStart' => $dateStart,
            'dateEnd'   => $dateEnd,
            'id_patient'=> $targetId,
        );

        $result = insertHospitalisation($hospitalisation);

        if( $result ) {
            echo('success');
            die();
        }
        echo('fail');
        die();

    }



?>
