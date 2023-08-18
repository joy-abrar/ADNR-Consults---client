<?php


        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        //Load Composer's autoloader
        require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'adnr.consults.infos@gmail.com';                //SMTP username
            $mail->Password   = 'jhxnuvsyjjtnmpoi';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('adnr.consults.infos@gmail.com', 'ADNR Consults');
            $mail->addAddress(base64_decode($praticienEmail) , $praticienName);     //Add a recipient
            //$mail->addAddress('ellen@example.com');             //Name is optional
            /*
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');
            */
            //Attachments
            //$mail->addAttachment($current_location , $fileName);         //Add attachments
            //$mail->addAttachment($current_location, $fileName,  $encoding = 'base64', $type = 'application/pdf');
            //$mail->addStringAttachment('./view/resultat.php', $pdf);
            //$mail->AddAttachment("./view/resultat.pdf", '', $encoding = 'base64', $type = 'application/pdf');
            //$mail->addAttachment('./view/resultat.php' , 'ordonnance.html');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Vous avez un nouveau document partages par votre client";
            $mail->Body    = "Bonjour " . $praticienName . ",<br> <em>Votre client " . base64_decode($_SESSION['firstName']) . " " . base64_decode($_SESSION['lastName']) . " vient juste de partager un document avec vous.</em><br> Pour pouvoir consulter ce document, veuillez bien vous connecter dans votre <a href='https://adnr-consults.eu/consults/praticien'>Espace Praticien</a>.<br><br>ADNR Consults vous souhaite une excellente journée.";

            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) 
        {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

?>