<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['text'];

// Формирование самого письма
$title = "Письмо с сайта ypstudio.ru";
$body = "
<h2>Новое письмо</h2>
<b>Имя:</b> $name<br>
<b>Почта:</b> $email<br><br>
<b>Сообщение:</b><br>$text
";

// Валидация почты
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->Encoding = 'base64';
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host = 'ssl://smtp.mail.ru';  
    $mail->Username = 'ap@ypstudio.ru'; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
    $mail->Password = 'Zt0T5WMu8jllYSuLVzCh'; // Ваш пароль
    $mail->SMTPSecure = 'ssl';                            
    $mail->Port = 465;
    $mail->setFrom('ap@ypstudio.ru', 'Сайт'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('mgyp@mail.ru'); // Email получателя
    $mail->addAddress('yp@ypstudio.ru');


// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}
} else {
	$result = "email";
}
// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);

?>