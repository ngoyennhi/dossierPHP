<form action='control/c_formUpload.php' method='post' enctype = 'multipart/form-data'>
<div>
    Fichier:
    <input size = '100' type ='file' name='fichier' />
    <!-- La valeur précisée dans cette zone ne peut pas être supérieure à la valeur de la directive de confguration upload_max_flesize (2 Mo par défaut) -->
    <input type ='hidden' name='saisie[MAX_FILE_SIZE]' value='10240'/>
    <input type ='submit' name='saisie[ok]' value = 'OK'/>
</div>
</form>