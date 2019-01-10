<?php
    header("Access-Control-Allow-Origin: *");
    if($_POST["submit"]) {

        $recipient="absali6693@gmail.com";
        $subject=$_POST["form_subject"];
        
        $sender=$_POST["form_name"];
        $email=$_POST["form_email"];
        $message=$_POST["form_msg"];
        
        $mailBody="Name: $sender\nEmail: $email\n\n$message";

        $headers = "MIME-Version: 1.0\r\n";
        $headers.= "Content-type: text/html; charset=UTF-8\r\n";
        $headers.= "From: <" . $sender . ">";

        $success = mail($recipient, $subject, $mailBody, $headers);
        if ($success) {
            http_response_code(200); // Set a 200 (okay).
            return "<h1>Thank You! Your message has been sent.</h1>";
        } else {
            http_response_code(500); // Set a 500 (internal server error).
            return "<h1>Oops! Something went wrong and we couldn’t send your message.</h1>";
        } 
    }

?>