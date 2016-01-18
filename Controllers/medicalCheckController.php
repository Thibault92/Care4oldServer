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

        $result = getmedicalCheckByPatient($idTarget);
        $resultJson = json_encode($result);

        echo($resultJson);
        die();
    }

    function setAction() {

      checkIdentity();
      $idTarget     = $_POST['id_patient'];
      $date         = $_POST['date_visit'];
      $height       = $_POST['height'];
      $weight       = $_POST['weight'];
      $bmi          = $_POST['bmi'];
      $albumin      = $_POST['albumin'];
      $crp          = $_POST['crp'];
      $vitaminD     = $_POST['vitamin_d'];
      $frequency    = $_POST['frequency'];
      $pressure     = $_POST['pressure'];
      $gir          = $_POST['gir'];


      $medCheck = array(
          'id_patient'  => $idTarget,
          'date'        => $date,
          'height'      => $height,
          'weight'      => $weight,
          'bmi'         => $bmi,
          'albumin'     => $albumin,
          'crp'         => $crp,
          'vitamin_d'   => $vitaminD,
          'frequency'   => $frequency,
          'pressure'    => $pressure,
          'gir'         => $gir,

      );

      $result = insertmedicalCheck($medCheck);

      if( $result ) {
          echo('success');
          die();
      }
      echo('fail');
      die();

    }

?>
