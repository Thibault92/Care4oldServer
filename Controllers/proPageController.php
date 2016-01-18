<?php
    $action = $_POST['action']; // set or get

    if( $_POST['action'] == 'get') {
        getAction();
    } else {
        echo('Invalid action');
        die();
    }


    function getAction() {

      checkIdentity();
      $idTarget = $_POST['targetId'];

      $result = getProPage($idTarget);
      $resultJson = json_encode($result);

      echo($resultJson);
      die();

    }


?>
