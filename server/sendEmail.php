<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<?php

$to  = "max.baranowski@mail.ru";

$subject = "From blog  based on heroku";

$message = "From: " .trim($_POST['from']) ." Email: " .trim($_POST['email']);
$message .= "<br>Message: <p>" .trim($_POST['message']) ."</p>";

mail($to, $subject, $message);

echo "<p style='text-align: center; font-size: 3em; margin: 1.5em 0; font-family: Roboto'>Hurrah! <span style='color: tomato;'>Email </span>successfully send.<br><a href='../index.php' style='margin-top:20px; color: tomato; '>Home</a></p>";