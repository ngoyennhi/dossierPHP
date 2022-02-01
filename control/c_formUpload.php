<!-- recuperer les infos saisies sur la formulaire Upload -->
<?php
$arrSaisi = filter_input(INPUT_POST,'saisie',FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
// Inialisation de la variable de message
$message = '';
// Traitement du formulaire
// if boutton OK appliqué, on commence le traitement
if (isset($arrSaisi['ok'])) {
    // Recupere les infos sur le fichier
    $informations = $_FILES['fichier'];
    // En extraire:
    // son nom
    $nom = $informations['name'];
    // son type MIME
    $type_mime = $informations['type'];
    // sa taille.
    $taille = $informations['size'];
    //l'emplacement du fchier temporaire.
    $fichier_temporaire = $informations['tmp_name'];
    // le code d’erreur.
    $code_erreur = $informations['error'];
    var_dump( $informations );
    //controles et traitement
    switch ($code_erreur) {
        case UPLOAD_ERR_OK:
            // Fichier bien reçu
            // Déterminer sa destination finale.
            $destination = '../documents/'.$nom;
            // Copier le fichier temporaire (tester le résultat)
            if (copy($fichier_temporaire, $destination)) {
                // Copie OK => mettre un message de confrmation.
                $message = 'Transfert terminé - Fichier = '.$nom ;
                $message .= 'Taille = '.$taille.'octets - ';
                $message .= 'Type MIME = '.$type_mime;
            } else {
                //Problem de copie =>mettre un message d'erreur
                $message = 'Problème de copie sur le serveur';
                // utiliser ces 3 lignes pour afficher les eurreurs 
                $errors= error_get_last();
                echo "COPY ERROR: ".$errors['type'];
                echo "<br />\n".$errors['message'];
            }
            break;
        case UPLOAD_ERR_NO_FILE:
            // Pas de fchier saisi.
            $message = 'Pas de fchier saisi.';
            break;
        case UPLOAD_ERR_INI_SIZE:
            // Taille fchier > upload_max_flesize.
            $message = 'Fichier '.$nom.' non transféré ';
            $message .= '(taille > upload_max_flesize).';
            break;
        case UPLOAD_ERR_FORM_SIZE:
            // Taille fchier > MAX_FILE_SIZE.
            $message = 'Fichier '.$nom.' non transféré ';
            $message .= '(taille > MAX_FILE_SIZE).';
            break;
        case UPLOAD_ERR_PARTIAL:
            // Fichier partiellement transféré.
            $message = 'Fichier '.$nom.' non transféré ';
            $message .= '(problème lors du tranfert).';
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            // Pas de répertoire temporaire.
            $message = 'Fichier '.$nom.' non transféré ';
            $message .= '(pas de répertoire temporaire).';
            break;
        case UPLOAD_ERR_CANT_WRITE:
            // Erreur lors de l'écriture du fchier sur disque.
            $message = 'Fichier '.$nom.' non transféré ';
            $message .= "(erreur lors de l\'écriture du fchier sur disque).";
            break;
        case UPLOAD_ERR_EXTENSION:
            // Transfert stoppé par l'extension.
            $message = 'Fichier '.$nom.' non transféré ';
            $message .= "(transfert stoppé par l\'extension).";
            break;
        default:
            // Erreur non prévue !
            $message ='Fichier non transféré';
            $message .= "(erreur inconnue : $code_erreur ).";
            break;
    };
    echo $message;
}