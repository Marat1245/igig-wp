<?php
require_once(__DIR__ . '/phpmailer/PHPMailerAutoload.php');

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$user_name = $_POST['name']; 
$phone = $_POST['phone']; 
$file = $_FILES['file'];  // Убедитесь, что форма имеет атрибут enctype="multipart/form-data"

// $mail->SMTPDebug = 1;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'marathesadyrov@yandex.ru';        // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'zxhwdmeiyvlmnikh';                     // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('marathesadyrov@yandex.ru');          // От кого будет уходить письмо?
$mail->addAddress('maratsadyrov@yandex.ru');         // Кому будет уходить письмо
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка';
$mail->Body    = "Имя " . $user_name . "<br>" . "Телефон " . $phone . "<br>";
$mail->AltBody = '';


// Прикрепление файла
if (isset($file['tmp_name']) && !empty($file['tmp_name'])) {
   $mail->addAttachment($file['tmp_name'], $file['name']);
}


if (!$mail->send()) {
    // Если отправка не удалась, вы можете добавить обработку ошибки здесь
    header("Location:" . $_SERVER["SERVER_NAME"] . "/извините/");
    exit(); 
} else {
     // Если отправка успешна, производим перенаправление
     header("Location:" . $_SERVER["SERVER_NAME"] . "/спасибо/");
      exit(); 
}




?>

