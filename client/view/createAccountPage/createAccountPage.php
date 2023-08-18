<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>ADNR Consults - Créer un compte</title>
</head>

<body>

	<div id="mainPage">
		<div id="connectionPart">
			<div id="connectionLogoBloc">
				<img id="connectionLogo" src="images/logo.png">
				<div id="formTitle">
					<hr id="borderLine">
						<span id="connectionMessage">Créez un compte</span>
					<hr id="borderLine">
				</div>
				<div id="formTitle">
						<span id="connectionMessage">Client</span>
				</div>
			</div>
				<form id="connectionForm" method="POST" action="../../index.php?action=createAccount">
					<div id="inputSexeForm">
							<h4 id="textParam">Votre Sexe</h4>
							<span id="choiceParam">Homme <input type="radio" name="sexe" value="m" required></span>
							<span id="choiceParam">Femme <input type="radio" name="sexe" value="f"></span>
					</div>
					<h4 id="textParam">Votre Nom</h4>
					<input id="inputFirstNameForm" type="text" name="lastname" required>
					<h4 id="textParam">Votre Prenom</h4>
					<input id="inputLastNameForm" type="text" name="firstname" required>
					<h4 id="textParam">Votre Adresse Mail</h4>
					<input id="inputEmailForm" type="email" name="mail" required>
					<h4 id="textParam">Numéro de Téléphone</h4>
					<input id="inputPhoneNumberForm" type="number" name="phoneNumber" required>
					<h4 id="textParam">Date De Naissance</h4>
					<input id="inputPasswordForm" type="date" name="dateOfBirth" required>
					<h4 id="textParam">Identifiant</h4>
					<input id="inputEmailForm" type="text" name="username" required>
					<h4 id="textParam">Votre Mot De Passe</h4>
					<input id="inputEmailForm" type="password" name="password" required>
					<h4 id="textParam">Retapez Votre Mot De Passe</h4>
					<input id="inputEmailForm" type="password" name="retypedPassword" required>
					<br><br>
					<input id="connexionButton" type="submit" name="create" value="Créer">
					<div id="terms">
						<a id="conditionsLink" href="../termsOfConditions/cgu.php">C.G.U.</a>
						<a id="conditionsLink" href="../termsOfConditions/rgpd.php">RGPD</a>
						<a id="conditionsLink" href="../termsOfConditions/mentions.php">Mentions Légales</a>
					</div>
					<br><br>
				</form>
		</div>

		<div id="sidePart">
		</div>
	</div>

</body>
</html>