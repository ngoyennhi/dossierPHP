<?php
$loc = filter_input(INPUT_GET,'loc');
$path = '';
switch ($loc) {
    // TP upload file
    case 'formUpload':
        $path = 'vue/formUpload.php';
        break;
    default:
        $path = 'vue/home.php';
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controler donnees</title>
</head>
<body>
    <?php include($path);?>
    <a href="index.php?loc=formUpload">upload</a>
</body>
</html>