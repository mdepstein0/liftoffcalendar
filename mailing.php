<?php

    session_start();

    if (! isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    $to_email = $_SESSION['email'];
    $subject = $_POST['s'];
    $body = $_POST['m'];
    $headers = "From: Liftoff Calendar";
     
    if (mail($to_email, $subject, $body, $headers)) {
        echo "Email successfully sent to $to_email...";
    } else {
        echo "Email sending failed...";
    }
?>