<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation des table&tentes</title>
    <link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="gereradmin.css">
</head>
<body>
    <header>
		<h1>Reservation des table&tentes <br> 
			<img src="images/logo.jpg" alt="">ville de Ndéré
		</h1>
        <div>
			<p>
				<span> <?php echo $_SESSION['nom'] .' '; ?> </span>
				<span> <?php echo $_SESSION['prenom']; ?></span>
			</p>
			<button> <a href="deconnexion.php" title="cliquez ici">Déconnexion</a> </button>
		</div>
	</header>

    <nav>
		<a href="admin.php">Retour en arrière</a>
        <a href="tabtente.php">Actualiser</a>
	</nav>
	<div>
		<p class="trouve">Prenez un raccourci pour
			<a href="#bas" class="lien" title="Cliquez ici">ajouter un table&tente !</a>
		</p>
		<h2> Liste des table&tentes disponibles </h2>
		<?php
            try
			{
				$BD = new PDO('mysql:host=localhost;dbname=univ_ndere','root','');
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getmessage());
			}
			$test=$BD->query('SELECT * FROM tabtente');
			while ($req=$test->fetch())
			{
		?>
			<div class="interne">
            <?php
				echo 'Demande: ' .$req['ville_demande'] .' Destination: ' .$req['destination'] .' Classe: ' .$req['classe'] 
                .' Reservarion: ' .$req['nb_reservation'] .' Prix: ' .$req['prix'] .'<br>';
			?>
                <button><a href="modify.php?x=<?php echo $req['id_tabtente']; ?>">modifier</a></button>
			    <button><a href="actualiser.php?x=<?php echo $req['id_tabtente']; ?>">actualiser</a></button>
			</div>
		<?php
			}
		?>

			
    </div>
    <?php
		if (isset($_POST['ajouter']))
		{
			//On ajoute une entrée dans la table tabtente
			$take = $BD->prepare('INSERT INTO tabtente (classe, destination, horaire, nb_reservation, prix, ville_demande) VALUES(?, ?, ?, ?, ?, ?)');
			$take->execute(array($_POST['classe'], $_POST['destination'], $_POST['horaire'], $_POST['nombre'], $_POST['prix'], $_POST['ville']));
			$take->closeCursor();

            //on recupere la classe de la tabtente
            $tout = $BD->prepare('SELECT id_tabtente FROM tabtente WHERE classe = ? AND ville_demande = ? AND destination = ? AND prix = ?');
            $tout->execute(array($_POST['classe'], $_POST['ville'], $_POST['destination'], $_POST['prix']));
            $b = $tout->fetch();
            $tout->closeCursor();

            //On ajoute une entrée dans la table faire
			$take = $BD->prepare('INSERT INTO gerer(id_admin, id_tabtente) VALUES(?, ?)');
			$take->execute(array($_SESSION['identifiant'], $b['id_tabtente']));
			$take->closeCursor();
		}
	?>

    <footer>
		<p>Copyright Avril 2024 <br> Groupe 3 projet 11| tous droits reservés!</p>
	</footer>
</body>
</html>