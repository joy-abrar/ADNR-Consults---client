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
			<link rel="stylesheet" type="text/css" href="view/praticiens/style.css">
			<link rel="stylesheet" type="text/css" href="lib/css/styleMenubar.css">
			<link rel="icon" type="image/png" href="view/praticiens/images/logo.png" />
			<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
			<script src="https://kit.fontawesome.com/1bd3419ec6.js" crossorigin="anonymous"></script>
			
			<!------- LOADING SCREEN SCRIPT------- -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
			<script type="text/javascript" src="view/praticiens/main2.js"></script>
			<!------- END LOADING SCREEN ------- -->
			<title>DASHBOARD</title>
		</head>
		<body id="body">
			<!------------ LOADING SCREEN ------------->
			<div class="se-pre-con"></div>	
			<!----------------------------------------->			
			<?php
				include_once('lib/topMenu2.php');
				include_once('lib/sideMenu2.php');
			?>

			<div id="mainAppearence">


				<div id="fifthBloc">
					
					<center id="clientListTitle">
						<h2>Liste des praticiens</h2>
					</center>
				</div>

				<div id="seventhBloc" style="visibility: visible;">
					<input type="text" id="mySearchBox" onkeyup="mySearchBoxFunction()" placeholder="Rechercher un praticien...">
				<?php
					while ($rows = $showPraticiensList ->fetch()) 
					{
				?>
						<center id="clientListBloc">
							<h3><?= ucfirst(base64_decode($rows['firstname'])) . "&nbsp;" . ucfirst(base64_decode($rows['lastname'])) ?></h3>
							<h4>Cabinet au : <br><?= $rows['praticienRoadNumber'] . " " . ucwords($rows['praticienRoadName']) . "<br>" . $rows['praticienCodePostal'] . ", " . ucfirst($rows['praticienCityName']) . "<br>" . strtoupper($rows['praticienCountry']) ?></h4>
					  	 	 <form method="POST" action="index.php?action=chooseThisPraticienForMe&id=<?= $rows['id'] ?>">
					  	 	 	<input type="submit" id="clientSelectButton" value="Choisir ce praticien">
					  	 	 </form>
					  	 	 <BR>
					  	 	 <hr style="width:40%">
						</center>

				<?php
					}
				?>
				</div>
			</div>
			<script type="text/javascript" src="view/praticiens/main.js"></script>
		</body>
	</html>

<?php
	}

	else
	{
		header("location:index.php");
	}


?>