<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.13.0/css/mdb.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<script src="js/jquery.min.js"></script>
<!-- <script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script> -->
<script src="js/main.js"></script>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.13.0/js/mdb.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="table.css">

<style>
	#drop_file_zone {
    background-color: white; 
    border: #145380 5px dashed;
    width: 75%; 
    height: 200px;
    padding: 8px;
    font-size: 18px;
	margin-left: 350px;
	margin-bottom: 30px;
	margin-top: 30px;
}
#drag_upload_file {
  width:50%;
  margin:0 auto;
}
#drag_upload_file p {
  text-align: center;
}
#drag_upload_file #selectfile {
  display: none;
}
td,tr,th{
	text-align: center;
}
h1 {
	text-align: center;
	color: white;
}
.connected {
    color: white;
    margin-right: 10px;
    display: flex;
	align-items: center;
	justify-content: center;
  }

  .connected-circle {
    margin-right: 5px;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: rgb(84, 208, 57);
  }
</style>
</head>
<body onload="load()">

<div class="wrapper d-flex align-items-stretch w-25">
<nav id="sidebar">
<div class="p-4 pt-5">
<a class="img logo rounded-circle mb-5" style="background-image: url(https://zupimages.net/up/20/09/pj79.png); cursor: unset;"></a>
<div class="connected">
						<?php
						echo "<span class='connected-circle'></span>" . $_SESSION['name'];
						?>
					</div>
					<br>
<ul class="list-unstyled components mb-5">
<li class="">
<a href="index.php" data-toggle="" aria-expanded="false" class="dropdown">Accueil</a>
</li>
<li>
<a href="dossiers.php">Dossiers</a>
</li>
<li>
	              <a href="logout.php">Déconnexion</a>
			  </li>

</div>
</nav>
</div>