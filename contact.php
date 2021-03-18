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
	<h1 id="title">Nous contacter</h1>

	<form id="form" action="register.php" method="post">
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
			<input type="tel" name="tel" pattern="[0-9][10]" required placeholder="Numéro de téléphone" />
		</p>

		<p>
			<label for="site">Site:</label>
			<input type="text" name="site" required placeholder="Site" />
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
</body>

<footer>
	<?php include("footer.php"); ?>
</footer>