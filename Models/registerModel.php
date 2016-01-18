<?php
    function saveUser($user) {
      $mysqli = getMysqli();

      $sql_common = "INSERT INTO user(email, password, gender, name, firstname, street, zip, city, phone, mobile, account) VALUES ('".$user['email']."' ,'".$user['pass']."' ,'".
          $user['gender']."' ,'".$user['name']."' ,'".$user['firstname']."', '".$user['street']."' ,'".$user['zip']."' ,'".$user['city']."' ,'".
          $user['phone']."' ,'".$user['mobile']."', '".$user['isPro']."');";

       $result = $mysqli->query($sql_common) or QueryError("Invalid query registering user", $sql_common, $mysqli->error);
       $id =  $mysqli->insert_id; 

          switch ($user['isPro']) {
              case 0:
                  $sql_patient = "INSERT INTO patient_account VALUES ('".$id."', '".$user['physicianName']."' ,'".$user['physicianMail']."' ,'".$user['birthday']."' ,'".
                      $user['emergency']."', '".$user['status']."' ,'".$user['accompaniment']."' ,'".$user['residency']."' , '".$user['isFinancial']."' ,'".$user['isHelp']."');";

                  $resultPatient = $mysqli->query($sql_patient) or QueryError("Invalid query registering patient", $sql_patient, $mysqli->error);
                  return $result && $resultPatient;
              break;

              case 1:

                  $sql_pro = "INSERT INTO professional_account VALUES ('".$id."', '".$user['officeName']."')";
                  $resultPro = $mysqli->query($sql_pro) or QueryError("Invalid query registering pro", $sql_pro, $mysqli->error);
                  return $result && $resultPro;
              break;

              default:
                  return false;
              break;
          }
        }
?>
