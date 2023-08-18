<?php
	if (session_status() === PHP_SESSION_NONE) 
	{
    	session_start();
	}
?>
	<!DOCTYPE html>
	<html>
		<head>
<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="view/completeMyAccountCreation/style.css">
			<link rel="icon" type="image/png" href="view/completeMyAccountCreation/images/logo.png" />
			<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
			
			<script src="https://kit.fontawesome.com/1bd3419ec6.js" crossorigin="anonymous"></script>
			<!------- LOADING SCREEN SCRIPT------- -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
			<script type="text/javascript" src="view/completeMyAccountCreation/main2.js"></script>
			<!------- END LOADING SCREEN ------- -->
			<title>ADNR - Confirmer la création du compte</title>
		</head>
		<body id="setFont">
			<!------------ LOADING SCREEN ------------->
			<div class="se-pre-con"></div>	
			<!----------------------------------------->			
			<div id="topMenuNav">
					<div>
						<img id="logoImage" src="view/completeMyAccountCreation/images/logo.png" alt="logo_png">
						<i id="menuIcon" class="fa-solid fa-align-justify"></i>
					</div>

					<div id="usernameTopNav">
					      <ul class="navbar">
					        <li>
					          <a id="usernameTopNavLink" href="#"><?= base64_decode($_SESSION['userName']) ?> <i class="fa-solid fa-chevron-down"></i></a>
					          <!--<ul>
					            <li><a href="../../index.php?action=accueil">Accueil</a></li>
					            <li><a href="#">Mon compte</a></li>
					            <li><a href="../../index.php?action=settings">Paramètres</a></li>
					            <li><a href="../../index.php?action=aboutUs">Plus</a></li>
					          </ul>-->
					        </li>
					      </ul>
					</div>

					<div id="searchBox">
						<!--<input id="searchBoxTopNav" type="search" name="searchBox" placeholder="Recherchez votre praticien...">-->
					</div>

					<div id="timeClock">
					 	<i id="clock" class="fa-solid fa-clock"></i>&nbsp;
		        		<p id="time"></p>&nbsp;
		        		<p id="day"></p>&nbsp;&nbsp;
		        		<p id="date"></p>
		    		</div>

			</div>

			<?php
				while($rows = $retreiveAllDataToCreateMyAccount -> fetch())
				{
			?>
			
					<div id="settingsPageMain">
						<div id="settingsForum">
							<h3 id="settingsTitle">Paramètre du compte</h3>
								<form id="settingsFormItems" method="POST" action="index.php?action=accountCreationCompletedByClient&id=<?=$codedKey?>">
									<h4>Nom</h4>
									<input id="settingsFormInputDeco" type="text" name="firstname" value="<?= base64_decode($rows['firstname']) ?>" required>
									<h4>Prenom</h4>
									<input id="settingsFormInputDeco" type="text" name="lastname" value="<?= base64_decode($rows['lastname']) ?>" required>
									<h4>Nom d'utilisateur</h4>
									<input id="settingsFormInputDeco" type="text" name="username" value="<?= base64_decode($rows['username']) ?>" required>
									<h4>Adresse mail</h4>
									<input id="settingsFormInputDeco" type="email" name="email" value="<?= base64_decode($rows['email']) ?>" required>
									<h4>Numéro de Téléphone</h4>
									<input id="settingsFormInputDeco" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" name="phoneNumber" maxlength="10" value="<?= base64_decode($rows['phoneNumber']) ?>" required>
									<h4>Date de naissance</h4>
									<input id="settingsFormInputDeco" type="date" name="dob" value="<?= $rows['dob'] ?>" required>
									<h4>Mot de passe</h4>
									<input id="settingsFormInputDeco" type="password" name="password" value="<?= base64_decode($rows['password']) ?>" required>
									<h4>Retaper mot de passe</h4>
									<h3 style="color: red">Différent mot de passe saisi</h3>
									<input id="settingsFormInputDeco" type="password" name="retypedPassword" required>
									<br>
									<input id="settingsSubmitButton" type="submit" name="valid" value="Confirmer">
								</form>
						</div>	
					</div>

			<?php
				}
			?>


			<script type="text/javascript" src="view/completeMyAccountCreation/main.js"></script>
		</body>
	</html>