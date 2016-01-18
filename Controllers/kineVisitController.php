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

        $result = getKineVisitByPatient($idTarget);
        $resultJson = json_encode($result);

        echo($resultJson);
        die();
    }

    function setAction() {

      checkIdentity();
      $idTarget        = $_POST['id_patient'];
      $date            = $_POST['date_kine'];
      $tinettiPoma     = $_POST['tinettiPoma'];
      $getUpAndGo      = $_POST['getupandgo'];
      $slowWalk        = $_POST['slow_walk'];
      $fastWalk        = $_POST['fast_walk'];

      //TODO: add other fields


      $kineVisit = array(
        'id_patient'      => $idTarget,
        'date_kine'     => $date,
        'tinettiPoma'   => $tinettiPoma,
        'getupandgo'    => $getUpAndGo,
        'slow_walk'     => $slowWalk,
        'fastWalk'      => $fastWalk,
      );

      $result = insertKineVisit($kineVisit);

      if( $result ) {
          echo('success');
          die();
      }
      echo('fail');
      die();

    }

?>
