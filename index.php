<!-- Controleur general -->
<?php

$loc = filter_input(INPUT_GET,'loc');

switch ($loc) {
    case 'home':
        include('control/c_home.php');
        break;
    default:
        include('control/c_formUpload.php');
        break;
}

// pour appeller une ficher PHP, on utilise fonction include()
include('vue/template.php');
?>