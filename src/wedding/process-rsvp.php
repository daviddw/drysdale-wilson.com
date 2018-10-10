<?php
    if ($_POST) {
        $guest1 = $_POST['guest1'];
        $guest2 = $_POST['guest2'];
        $guest3 = $_POST['guest3'];
        $guest4 = $_POST['guest4'];
        $guest5 = $_POST['guest5'];
        $yesorno = $_POST['yesorno'];
        $requirements = $_POST['requirements'];
        $message = $_POST['message'];
        $email = $_POST['email'];

        $emailAddress = "From: $email";
        $emailSubject = "RSVP from $guest1";
        $emailMessage = "$guest1\n";
        if(!empty($guest2)) {
            $emailMessage .= "$guest2\n";
        }
        if(!empty($guest3)) {
            $emailMessage .= "$guest3\n";
        }
        if(!empty($guest4)) {
            $emailMessage .= "$guest4\n";
        }
        if(!empty($guest5)) {
            $emailMessage .= "$guest5\n";
        }
        if($yesorno == "yes") {
            $emailMessage .= "\nWill be able to attend.\n";
        } else {
            $emailMessage .= "\nWill not be able to attend.\n";
        }
        if(!empty($requirements)) {
            $emailMessage .= "\nDietry requirements:\n\n$requirements\n";
        }
        if(!empty($message)) {
            $emailMessage .= "\nMessage:\n\n$message\n";
        }

        mail("wedding@drysdale-wilson.com", $emailSubject, $emailMessage, $emailAddress);

        header("Location: thanks.php?rsvp=$yesorno");
    }
?>
