<?php
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, ['cache' => false]);


// echo $twig->render('home.html.twig');
echo $twig->render('html.html.twig');

?>