<?php
rmdir($_GET['delete']);
unlink($_GET['delete']);
header('location: dossiers.php');
?>