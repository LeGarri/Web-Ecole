<!DOCTYPE html>

<head>
	<meta charset="utf-8" />
	<title>Equipe BTSSN1 EC</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<header>
	<?php include("header.php"); ?>
</header>

<body>
	<?php
        if(!isset($_POST['nom']) AND !isset($_POST['prenom']))
        {
            ?>
				<!--Affiche la page d'enregistrement-->

				<h1 id="title">Inscrivez-vous</h1>

				<form id="form" action="register.php" method="post">
					<p>
						<label for="nom">Nom:</label>
						<input type="text" name="nom" required placeholder="Nom" />
					</p>

					<p>
						<label for="prenom">Prenom:</label>
						<input type="text" name="prenom" required placeholder="Prenom" />
					</p>

					<p>
						<label for="password">Mot de passe:</label>
						<input type="password" name="password" required placeholder="Mot de passe" />
					</p>

					<p>
						<label for="passwordconfirm">Confirmer Mot de passe:</label>
						<input type="password" name="passwordconfirm" required placeholder="Confirmer mot de passe" />
					</p>

					<p>
						<label for="mail">Email:</label>
						<input type="email" name="mail" required placeholder="Adresse email" />
					</p>

					<p>
						<label for="tel">Téléphone:</label>
						<input type="tel" name="tel" pattern="[0-9]{10}" required placeholder="Numéro de téléphone" />
					</p>

					<p>
						<input type="submit" value="Envoyer">
						<input type="reset" value="Effacer">
					</p>
				</form>
			<?php
        } else
		{
			//Verifie si il n'y a pas d'erreur

			echo('<p>ok</p>');

			//Enregistrement de la personne
		}
    ?>
	
</body>

<footer>
	<?php include("footer.php"); ?>
</footer>