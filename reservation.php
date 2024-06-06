<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rosto de Ndéré</title>
	<link rel="icon" href="images/logo.jpg">
	<link rel="stylesheet" type="text/css" href="reservation2.css">
</head>
<body>
	<div>
	<form method="post" action="traitement_reservation.php">
		<legend>Formulaire de réservation </legend>

		<h2>Vos coordonnées</h2>
		<p class="ligne">Nom </p>
		<input type="text" name="nom" placeholder="name" autofocus required /> 

		<p class="ligne">Prénom </p>
		<input type="text" name="prenom" placeholder="first name" required /> 

		<p class="ligne">Age </p>
		<input type="number" name="age" min="15" max="150" placeholder="your age" required /> 

		<p class="ligne">Genre </p>
		<select class="colonne" name="genre">
            <option value="Autre" selected>Autre</option>
			<option value="M">Masculin</option>
			<option value="F">Feminin</option>
		</select>

		<p class="ligne">Email </p>
		<input type="email" name="email" placeholder="Ex: nom@gmail.com"/> 

		<p class="ligne"> Nationalité </p>
		<select name="pays" class="colonne">
			<option value="Cote d'ivoire">Cote d'ivoire</option>
				<option value="Cameroon" selected>Cameroon</option>
				<option value="Tchad">Tchad</option>
				<option value="France">France</option>
				<option value="Autre">Autre</option>
				<option value="RCA">RCA</option>
				<option value="Congo">Congo</option>
		</select>
		
		<p class="ligne">Numéro de télephone </p>
		<input type="tel" name="tel" placeholder="Ex: 237 000000000" required />

		<h2>Votre choix </h2>
		<p class="ligne">table&tente </p>
		<select name="ville" class="colonne">
			
			<option selected>Reservation pro</option>
			<option>Reservation simple</option>
			
		</select>

        <p class="ligne">Nombre de reservation </p>
		<input type="number" name="nombre" min="1" placeholder="number of reservation" required /> 

        <p class="ligne">Destination </p>
		<select name="ville_des" class="colonne">
			
			<option>Ville Ndéré</option>
	
		</select>
	
        <p class="ligne"> CLASSE DE RESEVATION </p>
		<select name="classe" class="colonne">
			<option selected>Commerciale</option>
			<option>VIP</option>
		</select>

        <p class="ligne">Date demande </p>
		<input type="datetime-local" name="date_demande" required />

        <p class="ligne">Style de Reservation </p>
		<select name="style" class="colonne">
			<option selected>ceremonie de mariage</option>
			<option>ceremonie de consert</option>
		</select>

        <h2>Paiement</h2>
        <p class="ligne">Mode de paiement </p>
		<select name="mode_paie" class="colonne">
			<option selected>Orange Money</option>
			<option>Mtn MoMo</option>
		</select>

        <p class="ligne">Numéro de paiement </p>
        <input type="tel" name="tel_paie" placeholder="Ex: 237 000000000" required /> 
		
		<br> <br>

		<input type="submit" value="Valider" name="Envoyer" id="envoi" />
		
	</form>
	
	</div>
	
</body>
</html>