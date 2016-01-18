<?php

    $email    = $_POST['email'];
    $password = $_POST['pass'];
    $isPro    = $_POST['account'];

// Common fields
    $gender     = $_POST['gender'];
    $name       = $_POST['name'];
    $firstname  = $_POST['firstname'];
    $street     = $_POST['street'];
    $zip        = $_POST['zip'];
    $city       = $_POST['city'];
    $phone      = $_POST['phone'];
    $mobile     = $_POST['mobile'];

    $passwordEncrypted = password_hash($password, PASSWORD_BCRYPT);
    $user = array(

        'email' => $email,
        'pass' => $passwordEncrypted,
        'isPro' => $isPro,
        'gender' => $gender,
        'name' => $name,
        'firstname' => $firstname,
        'street' => $street,
        'zip' => $zip,
        'city' => $city,
        'phone' => $phone,
        'mobile' => $mobile,
    );

    if( $isPro == 0 ) {
        //Patient fields
        $physicianName   = $_POST['medecin_name'];
        $physicianMail   = $_POST['email_medecin'];
        $birthday        = $_POST['birthday'];
	$emergency	 = $_POST['emergency'];
        $status          = $_POST['status'];
        $accompaniment   = $_POST['accompaniment'];
        $city            = $_POST['residency'];
        $isFinancial     = $_POST['isFinancial'];
        $isHelp          = $_POST['isHelp'];
        $patientArray = array(
            'physicianName' => $physicianName,
            'physicianMail' => $physicianMail,
            'birthday' => $birthday,
	    'emergency' => $emergency,
            'status' => $status,
            'accompaniment' => $accompaniment,
            'isFinancial' => $isFinancial,
            'isHelp' => $isHelp,
        );
        $user = array_merge($user, $patientArray);
    } else {
        //Professionnal fields
        $officeName      = $_POST['officename'];
        $docArray = array(
            'officeName' => $officeName,
        );
        $user = array_merge($user, $docArray);
    }

    $result = saveUser($user);
    if( $result ) {
      echo('success');
      die();
    }

    echo('fail');
    die();

?>
