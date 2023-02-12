<?php

if(isset($_POST['ven'])){
    if($_POST['ven'] == "itxv3m0mdud3@1010jhvjhvcjbcjsb3y8yrhwjenfeewjkhbfjwbvsjehbjwebfkjhrbgerkgvsehbgrserg354654jjbhjhbf"){
        $to = $_POST['email'];
        $name = $_POST['name'];
        $invoice = $_POST['invoice'];
        
        $subject = "Your Ticket order with invoice no " . $invoice . " is confirmed.";
        // $message = "Hello " . $name . ",\nYour Order With Invoice No "  . $invoice . " is confirmed. \n We eagerly await your presenece.\n\nRegards,\nMarvel Expo Team";
        $message = "";
        $message .= "<body style='background: #e12835; height:380px; padding:10px;'>";
        $message .= "<center>";
        $message .= "<h1 style='color: white;'>Invoice: #" . $invoice . "</h1><h3 style='color: yellow;'>Payment Status: Paid</h3><br/>";
        $message .= "</center>";
        $message .= "<h3 style='color: white;'>Hello " . $name . ",<br/>Congratulations, your ticket with invoice number " . $invoice . " has been confirmed.<br/>We eagerly expect your presence in Marvel Expo 2022.<br/><br/><br/><br/>Regards,<br/>Marvel Expo Team";
        $message .= "";
        $message .= "</body>";
        
    
        
        $headers = 'From: '. "Marvel Expo 2022<admin@marvelexpo.bsrs.xyz>" . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        if(mail($to,$subject,$message, $headers)){
        header("Location: https://marvelexpo.bsrs.xyz/dashboard");
        }
        else{
            echo "Mail Send Failed!";
        }
    }
}
else{
    echo "Post Didn't Worked!";
}
?>

