<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8" />
 <title>Download</title>
 <style>
 table { border-collapse: collapse; }
 table, td, th { border: 1px solid black; }
 td, th { padding: 4px; }
 </style>
 </head>
 <body>
 <table>
 <tr><th>document</th></tr>
 <?php
 include 'control/c_formDownload.php';
 $documents = ['cv.pdf', 'photo.png','icon.jpg'];

 // Un petit bout de code PHP pour générer les lignes du
 // tableau présentant la liste des documents.
 // Parcourir la liste des documents et utiliser le nom
 // pour l’afchage et le numéro dans l’URL.
 foreach ($documents as $numero => $document) {
     echo sprintf(
         "<tr><td>%s</td></tr>\n",
         "<a href='../control/c_formDownload.php?no=$numero'>$document</a>"
     );
 }
 ?>
 </table>
 </body>
</html>