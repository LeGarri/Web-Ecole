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
		//Si recoit une erreur(GET) ou ne recoit pas une des données du formulaire(POST), affiche le formulaire
		$error = null;
		if(isset($_GET['error'])) $error = str_replace('_', ' ', $_GET['error']);

        if((!isset($_POST['nom']) OR !isset($_POST['prenom']) OR !isset($_POST['password']) OR
		 !isset($_POST['passwordconfirm']) OR !isset($_POST['mail']) OR !isset($_POST['tel'])) OR
		 isset($_GET['error']))
        {
    ?>

	<!--Affiche la page d'enregistrement-->

	<h1 id="title">Inscrivez-vous</h1>

	<?php echo "<strong id=\"register_error\">$error</strong>"; ?>

	<form id="form" action="register.php" method="post">
		<p>
			<label for="nom">Nom:</label>
			<input type="text" id="nom" name="nom" required placeholder="Nom" />
		</p>

		<p>
			<label for="prenom">Prenom:</label>
			<input type="text" id="prenom" name="prenom" required placeholder="Prenom" />
		</p>

		<p>
			<label for="password">Mot de passe:</label>
			<input type="password" id="password" name="password" required placeholder="Mot de passe" />
		</p>

		<p>
			<label for="passwordconfirm">Confirmer Mot de passe:</label>
			<input type="password" id="passwordconfirm" name="passwordconfirm" required placeholder="Confirmer mot de passe" />
		</p>

		<p>
			<label for="mail">Email:</label>
			<input type="email" id="mail" name="mail" required placeholder="Adresse email" />
		</p>

		<p>
			<label for="tel">Téléphone:</label>
			<input type="tel" id="tel" name="tel" pattern="[0-9]{10}" required placeholder="Numéro de téléphone" />
		</p>

		<p>
			<input type="submit" value="Envoyer">
			<input type="reset" value="Effacer">
		</p>
	</form>

	<?php
        } else
		{
			//Verifie si il n'y a pas d'erreur dans le formulaire
			if($_POST['password'] != $_POST['passwordconfirm'])
			{
				header("Location: register.php?error=Les_mots_de_passe_de_ne_correspondent_pas");
				exit;
			}

			//Enregistrement de la personne
			try
			{
				//Connection à la base de donnée
				$host = "localhost";
				$user = "root";
				$password = "";
				$base = "web";

				$options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bdd = new PDO("mysql:host=$host;dbname=$base", $user, $password, $options);

				//Enregistrement dans la base de donée
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$password = $_POST['password'];
				$mail = $_POST['mail'];
				$tel = $_POST['tel'];

				$sql = "INSERT INTO user(nom, prenom, password, mail, phone) 
				VALUES('$nom', 
				'$prenom', 
				AES_ENCRYPT('$password', 'gVkYp2s5v8yoBMEh'), 
				'$mail', 
				'$tel')";

				$bdd->query($sql);
				$bdd->prepare($sql);

				//Affichage enregistrement ok
				echo "<p id=\"register_success\">Enregistrement effectué avec succès</p>";
			} catch(Exception $e)
			{
				die("Erreur ouverture base : ".$e->getMessage());
			}
		}
    ?>
	
</body>

<footer>
	<?php include("footer.php"); ?>
</footer>
