<?php
session_start();
// var_dump($_SESSION['name_dossier']);

$fichier = $_FILES['fichier']['name'];
// var_dump($fichier);

$elementsChemin = pathinfo($fichier);
// var_dump($elementsChemin);
// die;

$extensionFichier = $elementsChemin['extension'];
$extensionsAutorisees = array("jpeg", "jpg", "gif", "pdf", "pptx", "png", "txt", "docx", "zip");

$countfiles = count($fichier);

for($i=0;$i<$countfiles;$i++){ 

    
    if (!(in_array($extensionFichier, $extensionsAutorisees))) {
        echo "Le fichier n'a pas l'extension attendue";
    } else {
        $repertoireDestination = "./".$_SESSION['name_dossier']."/";
        // var_dump($repertoireDestination);
        // $nom = explode(" ", $fichier);
        // var_dump($nom);
        $nom = str_replace(" ", "_", $fichier);
        // var_dump($nom);
        $nomDestination = "$nom";
        
        if($_POST['submit']) {

            // $countfiles = count($_FILES['file']['name']);
            // var_dump($countfiles);
            
            $filename = $_FILES['file']['name'][$i];
            move_uploaded_file($_FILES['file']['tmp_name'][$i],"$repertoireDestination/$filename");
            }
        else {
        echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
        "Le déplacement du fichier temporaire a échoué".
        " vérifiez l'existence du répertoire ".$repertoireDestination;
        }
        }

}