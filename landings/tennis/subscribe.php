<?php 

if(isset($_POST['submit'])){ 
$to = "glushko.aleksandr@gmail.com"; // Здесь нужно написать e-mail, куда будут приходить письма   
$from = "volna@volna.net"; // Здесь нужно написать e-mail, от кого будут приходить письма, например no-reply(собака)epicblog.net
 
/* Указываем переменные, в которые будет записываться информация с формы */
$first_name = $_POST['name1'];
$phone = $_POST['tel1'];
$subject = "ПОДПИСКА ТЕННИС";
     
/* Переменная, которая будет отправлена на почту со значениями, вводимых в поля */
$mail_to_myemail = "Здравствуйте!
У вас новая пописка на теннис!
Имя отправителя: $first_name
Номер телефона: $phone";
$headers = "From: $from \r\n";
     
/* Отправка сообщения, с помощью функции mail() */
mail($to, $subject, $mail_to_myemail, $headers . 'Content-type: text/plain; charset=utf-8');
header("Location: ".@$_SERVER['HTTP_REFERER'].'#sent');
}
?>