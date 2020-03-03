<?php
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html>
<head>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
	<title>Login Tchat</title>
</head>


<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="images/login.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">

                <?php
    if (isset($_POST['name']) && isset($_POST['password'])) {

      // cette requête permet de récupérer l'utilisateur depuis la BD
      $requete = "SELECT * FROM `users` WHERE `name`=? AND `password`=?";
      $resultat = $bdd->prepare($requete);
      $name = $_POST['name'];
	  $_POST['password'] = MD5($_POST['password']);
      $resultat->execute([$name, $_POST['password']]);
  
      if ($resultat->fetchColumn()) {
          // l'utilisateur existe dans la table
          // on ajoute ses infos en tant que variables de session
          $_SESSION['name'] = $name;
          $_SESSION['password'] = MD5($password);
          header("location: dossiers.php");
      }
      else {
        echo "<h5>Identifiant incorrect, veuillez réessayer.</h5>";
      } 
  }
  ?>
					<form method="POST">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="name" class="form-control input_user" value="" placeholder="Nom">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="Mot de passe">
						</div>
						
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<input type="submit" name="button" class="btn login_btn" value="Se connecter">
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links text-white">
						Vous n'avez pas de compte ? <a href="sign_up.php" class="ml-2">S'inscrire</a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>
