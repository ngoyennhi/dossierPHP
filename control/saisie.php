<?php 
// // Lorsqu’un fchier est envoyé avec un formulaire, des informations sur ce fchier sont accessibles, dans le script PHP, grâce à la variable $_FILES
// var_dump($_FILES);

//inclusion du fichier qui contient les fonctions generales
include('fonction.inc');

// Initialisation de la variable de message
$message = '';

// Traitement du formulaire.
//verifier status OK
$arrSaisie = filter_input(INPUT_POST,'saisie');
$ok = saisie['ok'];
var_dump($ok);