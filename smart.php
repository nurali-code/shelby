<?php
$name = $_POST['u-name'];
$review = $_POST['u-review'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'alicia.mir0nova@yandex.ru'; // Наш логин
$mail->Password = 'JR+Sq2$4h;MR-X8'; // Наш пароль от ящика
$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to

$mail->setFrom('alicia.mir0nova@yandex.ru', 'Алиса'); // От кого письмо 
// $mail->addAddress('arzonccnt@gmail.com'); // Add a recipient
$mail->addAddress('avto.shelby@yandex.ru');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
// $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
$mail->addAttachment($_FILES['u-photo']['tmp_name'], $_FILES['u-photo']['name']); // Optional name
$mail->isHTML(true); // Set email format to HTML

$mail->Subject = 'Новая заявка с сайта.';
$mail->Body = '
	<h3>Пользователь оставил свои данные</h3> 
	<br>
	Имя: ' . $name . ' <br>
	Отзыв: ' . $review . ' ';

$mail->AltBody = 'Это альтернативный текст';

if (!$mail->send()) {
	echo 'Error';
} else {
	header('location: https://avtoshelby.ru/');
}

?>