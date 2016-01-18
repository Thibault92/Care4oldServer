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

      $result = getPsychoVisitByPatient($idTarget);
      $resultJson = json_encode($result);

      echo($resultJson);
      die();
    }

    function setAction() {

      checkIdentity();
      $idTarget       = $_POST['id_patient'];
      $date           = $_POST['date_psycho'];
      $miniBest       = $_POST['minibesttest_score'];
      $grecoGlobal    = $_POST['greco_global'];
      $grecoImmediat  = $_POST['greco_immediat'];
      $grecoDiffere   = $_POST['greco_differe'];

      $psyVisit = array(
          'id_patient'         => $idTarget,
          'date_psycho'        => $date,
          'minibesttest_score' => $miniBest,
          'greco_global'       => $grecoGlobal,
          'greco_immediat'     => $grecoImmediat,
          'greco_differe'      => $grecoDiffere,


      );

      $result = insertPsychoVisit($psyVisit);

      if( $result ) {
          echo('success');
          die();
      }
      echo('fail');
      die();

    }

?>
