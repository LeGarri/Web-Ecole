<!DOCTYPE html>

<head>
	<meta charset="utf-8" />
	<title>Equipe BTSSN1 EC</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<header>
	<div id="header">
		<img id="header_image" src="images/Photo_de_Lattre.jpg" alt="photo de lattre">
	</div>

	<nav id="navlist">
		<ul>
			<li class="nav"><a href="index.html">Présentation</a></li>
			<li class="nav"><a href="news.html">Actualités</a></li>
			<li class="nav"><a href="register.html">Inscription</a></li>
			<li class="nav"><a href="contact.html">Contact</a></li>
		</ul>
	</nav>
</header>

<body>
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
			<input type="tel" name="tel" pattern="[0-9][10]" required placeholder="Numéro de téléphone" />
		</p>

		<p>
			<input type="submit" value="Envoyer">
			<input type="reset" value="Effacer">
		</p>
	</form>
</body>

<footer>
	<p>Certains droits réservés</p>

	<div id="footer_link">
		<a href="index.html">Mentions légales - </a>
		<a href="index.html">Plan du site</a>
	</div>
</footer>