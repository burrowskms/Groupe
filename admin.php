<?php
session_start();
if (isset($_SESSION['Connexion'])) {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="admin.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        header, footer {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        header img {
            width: 50px;
            height: 50px;
        }
        header div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #333;
            padding: 10px 0;
        }
        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        .bloc {
            width: 80%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
		ul li{
			display:inline-flex;
			padding-left:25px;
		}
		ul li a{
			color:blue;
			text-decoration:none;
			font-size:20px;
		}
    </style>
</head>
<body>
    <header><br><br>
       
            <img src="images/logo.jpg" alt="Ville de Ndéré">
			<ul>
				<li> <a href="admin.php">Accueil</a></li>
				<li> <a href="gereradmin.php">Gestion des administrateurs</a></li>
				<li><a href="tabtente.php">Gestion des tables et tentes</a></li>
				<li><a href="historique.php">Historique</a></li>
				<li><a href="deconnexion.php" title="cliquez ici" style="color: white; text-decoration: none;">Déconnexion</a></li>
			</ul>
    </header>
   
           
        <?php
        try {
            $BD = new PDO('mysql:host=localhost;dbname=univ_ndere', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        ?>

        <h2>Les réservations</h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Nationalité</th>
                    <th>Téléphone</th>
                    <th>Type de réservation</th>
                    <th>Classe</th>
                    <th>Date demande</th>
                    <th>Mode de paiement</th>
                    <th>Téléphone de paiement</th>
                    <th>Action</th> <!-- Colonne pour le bouton d'envoi d'email -->
                </tr>
            </thead>
            <tbody>
                <?php
                $reponse = $BD->query('SELECT * FROM reservations');
                while ($data = $reponse->fetch()) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($data['nom']); ?></td>
                        <td><?php echo htmlspecialchars($data['prenom']); ?></td>
                        <td><?php echo htmlspecialchars($data['email']); ?></td>
                        <td><?php echo htmlspecialchars($data['pays']); ?></td>
                        <td><?php echo htmlspecialchars($data['tel']); ?></td>
                        <td><?php echo htmlspecialchars($data['ville']); ?></td>
                        <td><?php echo htmlspecialchars($data['classe']); ?></td>
                        <td><?php echo htmlspecialchars($data['date_demande']); ?></td>
                        <td><?php echo htmlspecialchars($data['mode_paie']); ?></td>
                        <td><?php echo htmlspecialchars($data['tel_paie']); ?></td>
                        <td>
                            <a href="mailto:<?php echo htmlspecialchars($data['email']); ?>?subject=Réservation Table et Tente&body=Bonjour,">
                                <button>Envoyer un email</button>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>


    <footer>
        <p>Copyright Avril 2024 <br> Groupe 3 projet 11 | tous droits réservés!</p>
    </footer>
</body>
</html>
<?php
} else {
    header('Location:connexion.php');
}
?>
