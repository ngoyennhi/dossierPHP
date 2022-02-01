<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controler donnees</title>
</head>
<body>
<?php
$loc = filter_input(INPUT_GET,'loc');

switch ($loc) {
    // TP upload file
    case 'home':
        include('vue/home.php');
        break;
    default:
        include('vue/formUpload.php');
        break;
}
?>
</body>
</html>