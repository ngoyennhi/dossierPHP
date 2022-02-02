<?php
$documents = ['cv.pdf', 'photo.png','icon.jpg'];
// Liste des documents (viendrait sans doute d’une
// base de données dans une vraie application).
$no= filter_input(INPUT_GET,'no');

// Traitement du formulaire si filter_input(INTPUT_GET,'download') non vide.
if(isset($no)){
    //  // Récupérer le numéro du document.
    //  $numero = $no;
     // En déduire le nom du document.
     $nom_fichier= $documents[$no];
      // Envoyer l’en-tête d’attachement
      $header = 'Content-Disposition: attachment;';
      // "" utilise quand dans le syntax il y a un variable 
      $header .= "filename =$nom_fichier\n";
      header($header);
        // Envoyer l’en-tête du type MIME (ici, "inconnu").
        header('Content-Type: x/y\n');
// Envoyer le document.
readfile($nom_fichier);
}
else
{ echo 'donnée inconnu';};