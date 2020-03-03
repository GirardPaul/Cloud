<?php
session_start();
unlink($_GET['delete']);
// on récupère le nom du dossier
if ($_GET['delete']) {

    // variable : nom dossier / nom session / chemin dossier
    $dir = $_GET['delete'];
    $name = $_SESSION['name'];
    $adresse = "$name/$dir";
    
    // si le dossier existe
    if (is_dir($adresse)) {
       
        // si le dossier contient des fichiers
        if ($dh = opendir($adresse)) {
            // on boucle tous les fichiers
            while (($file = readdir($dh)) !== false) {

                unlink($adresse.'/'."$file");
            }
                rmdir($adresse);
        }
    }
}
header('location: dossiers.php');
?>