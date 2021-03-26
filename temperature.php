<!DOCTYPE html>

<head>
	<meta charset="utf-8" />
	<title>Equipe BTSSN1 EC</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<header>
	<?php 
        include("header.php");

        header("refresh: 30");
    ?>
</header>

<body>
	<h1 id="article_title">temperature</h1>
	
    <?php
        //mode COM1: BAUD=9600 PARITY=N data=8 stop=1 XON=off TO=on
        $com = fopen('COM1', 'a+');

        if(!$com) echo "Port non accessible";
        else
        {
            $buffer = fgets($com, 5);

            fclose($com);

            if($buffer)
            {
                echo "<p id=\"temp\">Temperature: $buffer</p>";

                //Enregistrement dans un fichier
                $file = fopen("temperature.txt", "a+");

                fputs($file, "Temp: " $buffer);

                fclose($file);


                //Connection à la base de donnée
				$host = "localhost";
				$user = "root";
				$password = "";
				$base = "web";

				$options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bdd = new PDO("mysql:host=$host;dbname=$base", $user, $password, $options);

                //Enregistrement dans la base de donnée
                $sql = "INSERT INTO contact(date, T_LM35) VALUES ('date("Y-m-d H:i:s")', '$buffer')";

				$bdd->query($sql);
				$bdd->prepare($sql);
            }
        }

    ?>
</body>

<footer>
	<?php include("footer.php"); ?>
</footer>