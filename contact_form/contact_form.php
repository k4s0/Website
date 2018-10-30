<?php
$thank_you_page = '
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700" rel="stylesheet" type="text/css">
        <style>
            @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
            @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
        </style>
        <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
        <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
        <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
    </head>
    <body>
        <header class="site-header" id="header">
            <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU !</h1>
        </header>

        <div class="main-content">
            <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
            <p class="main-content__body" data-lead-id="main-content-body">The message has been sent.</p>
        </div>

        <footer class="site-footer" id="footer">
            <p class="site-footer__fineprint" id="fineprint">Copyright ©2017 All Rights Reserved </p>
        </footer>
    </body>
    </html>
    ';

$name   = $_POST['name'];
$name_s = filter_var($name, FILTER_SANITIZE_STRING);

$email   = $_POST['email'];
$email_s = filter_var($email, FILTER_SANITIZE_EMAIL);

$message   = $_POST['message'];
$message_s = filter_var($message, FILTER_SANITIZE_STRING);

$from    = 'WebSite Contact Form';
$to      = 'casinilorenzo@pm.me';
$subject = "Richiesta di Contatto !";
$human   = $_POST['spam'];

$body = "From: $name_s\n E-Mail: $email_s\n Message:\n $message_s";

if ($human == '4') { // check for spam
    if (mail($to, $subject, $body, $from)) {
        echo $thank_you_page;
    } else {
        echo '<p>Something went wrong, go back and try again!</p>';
    }
} else if ($human != '4') {
    echo '<p>You answered the anti-spam question incorrectly!</p>';
}
?>
