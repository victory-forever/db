<?php
header("Content-Type: text/html; charset=utf-8");
$email = htmlspecialchars($_POST["email"]);
$refferer = getenv('HTTP_REFERER');
$date=date("d.m.y"); // число.месяц.год  
$time=date("H:i"); // часы:минуты:секунды 
$myemail = "victory_bg@mail.ru";

$tema = "Новая заявка оформлена";
$message_to_myemail = "
Добрый день, Андрей!
<br>
Поздравляю, поступила новая заявка с сайта Design Bureau. :)
<br>
Контактный email:
$email<br>
Источник (ссылка): $refferer
";
mail($myemail, $tema, $message_to_myemail, "From: WAYUP <reg@wayup.in> \r\n Reply-To: WAYUP \r\n"."MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n" );
$tema = "Новая заявка оформлена";
$message_to_myemail = "

Добрый день!
<br>
Ваша заявка успешно получена.
<br>
Наши специалисты свяжутся с вами в ближайшее время.
";
$myemail = $email;
mail($myemail, $tema, $message_to_myemail, "From: WAYUP <reg@wayup.in> \r\n Reply-To: WAYUP \r\n"."MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n" );


$f = fopen("leads.xls", "a+");
fwrite($f," <tr>");    
fwrite($f," <td>$email</td> <td>$name</td> <td>$tel</td>   <td>$date / $time</td>");   
fwrite($f," <td>$refferer</td>");    
fwrite($f," </tr>");  
fwrite($f,"\n ");    
fclose($f);


?>
