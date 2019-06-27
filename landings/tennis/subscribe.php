<?php
	//****************************************
	//edit here
	$senderName = 'VOLNA';                          // имя отправителя
	$senderEmail = 'site@example.com';            // от кого будет отправлено письмо
	$targetEmail = 'glushko.aleksandr@gmail.com';           // куда отправлять письмо
	$messageSubject = 'Новый подписчик теннис';    // тема письма
	$redirectToReferer = false;
	$redirectURL = 'thankyou.html';              

	// mail content
	$ufname = $_POST['name1'];
	$uphone = $_POST['tel1'];

	// prepare message text
	$messageText =	'Имя: '.$ufname."\n".
					'Телефон: '.$uphone."\n";

	// send email
	$senderName = "base64_encode($senderName)";
	$messageSubject = "base64_encode($messageSubject)";
	$messageHeaders = "From: " . $senderName . " <" . $senderEmail . ">\r\n"
				. "MIME-Version: 1.0" . "\r\n"
				. "Content-type: text/plain; charset=UTF-8" . "\r\n";

	if (preg_match('/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/',$targetEmail,$matches))
	mail($targetEmail, $messageSubject, $messageText, $messageHeaders);

	// redirect
	if($redirectToReferer) {
		header("Location: ".@$_SERVER['HTTP_REFERER'].'#sent');
	} else {
		header("Location: ".$redirectURL);
	}
?>
