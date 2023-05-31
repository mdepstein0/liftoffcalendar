<?php
    $to_email = "mdepstein0@gmail.com";
    $subject = "IMPORTANT MESSAGE";
    $body = "TEST";
    $headers = "From: Liftoff Calendar";
     
    if (mail($to_email, $subject, $body, $headers)) {
        echo "Email successfully sent to $to_email...";
    } else {
        echo "Email sending failed...";
    }
?>