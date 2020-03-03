<?php
session_start();
$arr_file_types = ['application/javascript',
'application/json',
'application/x-www-form-urlencoded',
'application/xml',
'application/zip',
'application/pdf',
'application/sql',
'application/graphql',
'application/ld+json',
'application/msword',
'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
'application/vnd.ms-excel',
'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
'application/vnd.ms-powerpoint',
'application/vnd.openxmlformats-officedocument.presentationml.presentation',
'application/vnd.oasis.opendocument.text',
'application/zstd',
'audio/mpeg',
'audio/ogg',
'multipart/form-data',
'text/css',
'text/html',
'text/xml',
'text/csv',
'text/plain',
'image/png',
'image/jpeg',
'image/gif',
'application/vnd.api+json',
'application/octet-stream', 
'application/x-zip-compressed', 
'multipart/x-zip',
'application/x-rar-compressed'
];
$name = $_SESSION['name'];
$test = "$name";

if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
  echo "false";
  return;
}
$file = $_FILES['name'];

// var_dump($_SESSION['nom_dossier']);
// die;
move_uploaded_file($_FILES['file']['tmp_name'], $test.'/'.$_SESSION['nom_dossier'].'/'.$_FILES['file']['name']);

// .$name.'/'
// var_dump($_FILES['file']);
// die;
echo "Fichier téléchargé.";

?>