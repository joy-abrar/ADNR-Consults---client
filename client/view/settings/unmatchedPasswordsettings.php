<?php
	if (session_status() === PHP_SESSION_NONE) 
	{
    	session_start();
	}

	if ($_SESSION['sessionStatus'] == "online") 
	{
?>
	<!DOCTYPE html>
	<html>
		<head>
<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="style.css">
			<link rel="stylesheet" type="text/css" href="../../lib/css/styleMenubar.css">
			<link rel="icon" type="image/png" href="images/logo.png" />
			<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
			<script src="https://kit.fontawesome.com/1bd3419ec6.js" crossorigin="anonymous"></script>
			<title>ADNR - Settings</title>
		</head>
		<body id="setFont">
			<?php
				include_once('../../lib/topMenu1.php');
				include_once('../../lib/sideMenu1.php');
			?>
				<div id="settingsPageMain">
					<div id="settingsForum">
						<h3 id="settingsTitle">Paramètre du compte</h3>
							<form id="settingsFormItems" method="POST" action="../../index.php?action=updateAccount">
								<h4>Nom</h4>
								<input id="settingsFormInputDeco" type="text" name="firstname" value="<?= base64_decode($_SESSION['firstName']) ?>" required>
								<h4>Prenom</h4>
								<input id="settingsFormInputDeco" type="text" name="lastname" value="<?= base64_decode($_SESSION['lastName']) ?>" required>
								<h4>Identifiant</h4>
								<input id="settingsFormInputDeco" type="text" name="username" value="<?= base64_decode($_SESSION['userName']) ?>" required readonly>
								<h4>Adresse mail</h4>
								<input id="settingsFormInputDeco" type="email" name="email" value="<?= base64_decode($_SESSION['userEmail']) ?>" required>
								<h4>Numéro de Téléphone</h4>
								<input id="settingsFormInputDeco" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" name="phoneNumber" maxlength="10" value="<?= base64_decode($_SESSION['userPhoneNumber']) ?>" required>
								<h4>Date de naissance</h4>
								<input id="settingsFormInputDeco" type="date" name="dob" value="<?= $_SESSION['userDob'] ?>" required>
								<h4>Mot de passe</h4>
								<input id="settingsFormInputDeco" type="password" name="password" value="<?= base64_decode($_SESSION['userPassword']) ?>" required>
								<h4>Retaper mot de passe</h4>
								<input id="settingsFormInputDeco" type="password" name="retypedPassword" required>
								<h5 style="color:red;">Différent mot de passe insérée. Veuillez réessayez</h5>
								<br>
								<input id="settingsSubmitButton" type="submit" name="valid" value="Sauvegarder">
							</form>
					</div>
						
				</div>
				<!--<div id="settingsMenu">
					<a href="#" id="accountSettings">
						<img id="accountSettingsLogo" src="images/settings.png" alt="settings png">Paramètre du compte
					</a>

					<a href="#" id="accountSettings">
						<img id="accountSettingsLogo" src="images/settings.png" alt="settings png">
					</a>
				</div>-->


			<script type="text/javascript" src="main.js"></script>
		</body>
	</html>

<?php
	}

	else
	{
		header("location:../../index.php");
	}


?>