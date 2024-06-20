<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

        
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mail->CharSet = 'utf-8';

    $ordname = $_POST['ordname'];
    $ordtext = $_POST['ordtext'];
    $ordmail = $_POST['ordmail'];
    $ordphone = $_POST['ordphone'];

    
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  //Вывод в консоль ошибок/данных о работоспособности скрипта                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'mailsendertester629@gmail.com';                     //SMTP username
        $mail->Password   = 'advjwtivheidaqav';//сгенерированый гуглом 16-зн пароль                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // adfkauykbcasdf пароль
        //Recipients
        $mail->setFrom('mailsendertester629@gmail.com', 'Evroperevoz');
        $mail->addAddress('sandrej622@gmail.com');  //Name is optional
        
        $body = "
            <b>Имя клиента: $ordname</b><br>
            <b>Сообщение: $ordtext</b><br>
            <b>Телефон: $ordphone</b><br>
            <b>Почта: $ordmail</b><br>
        ";
        
        //Content
        $mail->isHTML(true);  //Set email format to HTML
        $mail->Subject = 'Заявка с сайта!';
        $mail->Body    = $body;

        $mail->send();
        header('location: orderaccepted.html');
      } catch (Exception $e) {
        echo "Ошибка отправки: {$mail->ErrorInfo}";
      }
?>