<?php
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, ['cache' => false]);


$liste = ["HTML", "CSS", "Javascript", "JQuery"];

echo $twig->render('home.html.twig', [
    'langages' => $liste,
]);
