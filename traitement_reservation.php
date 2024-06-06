<?php
// Informations de connexion à la base de données
$host = 'localhost'; // Remplacez par votre hôte
$dbname = 'univ_ndere'; // Remplacez par le nom de votre base de données
$username = 'root'; // Remplacez par votre nom d'utilisateur
$password = ''; // Remplacez par votre mot de passe

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $pays = filter_input(INPUT_POST, 'pays', FILTER_SANITIZE_STRING);
    $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
    $ville = filter_input(INPUT_POST, 'ville', FILTER_SANITIZE_STRING);
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_NUMBER_INT);
    $ville_des = filter_input(INPUT_POST, 'ville_des', FILTER_SANITIZE_STRING);
    $classe = filter_input(INPUT_POST, 'classe', FILTER_SANITIZE_STRING);
    $date_demande = filter_input(INPUT_POST, 'date_demande', FILTER_SANITIZE_STRING);
    $style = filter_input(INPUT_POST, 'style', FILTER_SANITIZE_STRING);
    $mode_paie = filter_input(INPUT_POST, 'mode_paie', FILTER_SANITIZE_STRING);
    $tel_paie = filter_input(INPUT_POST, 'tel_paie', FILTER_SANITIZE_STRING);

    // Préparation de la requête SQL
    $sql = "INSERT INTO reservations (nom, prenom, age, genre, email, pays, tel, ville, nombre, ville_des, classe, date_demande, style, mode_paie, tel_paie) 
            VALUES (:nom, :prenom, :age, :genre, :email, :pays, :tel, :ville, :nombre, :ville_des, :classe, :date_demande, :style, :mode_paie, :tel_paie)";

    // Préparation de la déclaration
    $stmt = $pdo->prepare($sql);

    // Liaison des valeurs
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pays', $pays);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':ville', $ville);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':ville_des', $ville_des);
    $stmt->bindParam(':classe', $classe);
    $stmt->bindParam(':date_demande', $date_demande);
    $stmt->bindParam(':style', $style);
    $stmt->bindParam(':mode_paie', $mode_paie);
    $stmt->bindParam(':tel_paie', $tel_paie);

    // Exécution de la requête
    $stmt->execute();

    // Redirection vers une page de succès (facultatif)
    header('Location: succes.html');
    exit();

} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>
