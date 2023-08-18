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
			<!------- LOADING SCREEN SCRIPT------- -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
			<script type="text/javascript" src="main2.js"></script>
			<!------- END LOADING SCREEN ------- -->
			<title>ADNR Consults - A Propos de Nous</title>
		</head>
		<body id="setFont">
			<!------------ LOADING SCREEN ------------->
			<div class="se-pre-con"></div>	
			<!----------------------------------------->			
			
			<?php
				include_once('../../lib/topMenu1.php');
				include_once('../../lib/sideMenu1.php');
			?>
				
				<div id="aboutUsBloc">
					<br><br><br><br>
					<center>
						<h2><u>Crédits</u></h2>
						<h3 style="color: grey; font-family: roboto condensedsans;">Développé depuis</h3>
						<h4>ADNR Groups</h4>
						<h3 style="color: grey; font-family: segoe UI Light;"><u>Directrice Générale</u></h3>
						<h4>ATTALAUZITI Alexandra</h4>
						<h3 style="color: grey; font-family: segoe UI Light"><u>Directeur Pédagogique</u></h3>
						<h4>NOSAL Denis</h4>
						<h3 style="color: grey;"><u>Développeur</u></h3>
						<h4>FERDOUS Antor</h4>

					</center>
				</div>
				


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