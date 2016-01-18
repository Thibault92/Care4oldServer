<?php

    $mailPosted = $_POST['email'];
    $passPosted = $_POST['password'];
    $user = getUserByMail($mailPosted);
    if( !$user ) {
        echo('userNotFound');
        die();
    }
    if( password_verify($passPosted, $user['password']) ) {
        echo('success');
        echo('--|--');
        echo($user['username']);
        echo('--|--');
        echo($user['isPro']);
        die();
    } else {
        echo('wrong_password');
        die();
    }

?>
