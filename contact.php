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
		//Si une des données du formulaire n'est pas reçu, affiche le formulaire de contact
		if(!isset($_POST['nom']) OR !isset($_POST['mail']) Or !isset($_POST['tel']) OR !isset($_POST['site']) OR 
		 !isset($_POST['message']))
		{
	?>

	<!--Affiche la page de contact-->

	<h1 id="title">Nous contacter</h1>

	<form id="form" action="contact.php" method="post">
		<p>
			<label for="nom">Nom:</label>
			<input type="text" name="nom" required placeholder="Nom" />
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
			<label for="site">Site:</label>
			<input type="url" name="site" required placeholder="Site" />
		</p>

		<p>
			<label for="message">Votre message:</label>
			<textarea id="text_message" name="message" required placeholder="Message..."></textarea>
		</p>

		<p>
			<input type="submit" value="Envoyer">
			<input type="reset" value="Effacer">
		</p>
	</form>

	<?php
		} else
		{
			//Enregistrement du message dans la base de donnée
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
				$mail = $_POST['mail'];
				$tel = $_POST['tel'];
				$site = $_POST['site'];
				$message = $_POST['message'];

				$sql = "INSERT INTO contact(nom, mail, phone, site, message) 
				VALUES('$nom', 
				'$mail', 
				'$tel',
				'$site',
				'$message')";

				$bdd->query($sql);
				$bdd->prepare($sql);

				//Affichage enregistrement ok
				echo "<p id=\"register_success\">Message envoyé avec succès</p>";
			} catch(Exception $e)
			{
				die("Erreur ouverture base : ".$e->getMessage());
			}

			//Enregistrement du message dans un fichier
			$file = fopen("contact/" . $nom . ".txt", "a+");

			fputs($file, "-------- Le " . date("Y-m-d") . " à " . date("H:i:s") . " --------\r\n\r\n" .
			$nom . " a écrit ce message: \r\n" .
			$message .
			"\r\n\r\nInformations de " . $nom . " : \r\n" .
			"Mail: " . $mail .
			"\r\nTel: " . $tel .
			"\r\nSite: " . $site . "\r\n\r\n\r\n");

			fclose($file);
		}
	?>
</body>

<footer>
	<?php include("footer.php"); ?>
</footer>