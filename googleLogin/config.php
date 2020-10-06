<?php
require_once "API/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("849250118380-tq3halolea2q47ojbp33ivqmbe4p2udp.apps.googleusercontent.com");
$gClient->setClientSecret("SXkHh8sBWwc6qJbFB9HcAJmJ");
$gClient->setApplicationName("Bookshelf.in");
$gClient->setRedirectUri("http://localhost/BookShelf/glogin.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>