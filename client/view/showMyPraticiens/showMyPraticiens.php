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
			<link rel="stylesheet" type="text/css" href="view/showMyPraticiens/style.css">
			<link rel="stylesheet" type="text/css" href="lib/css/styleMenubar.css">
			<link rel="icon" type="image/png" href="view/showMyPraticiens/images/logo.png" />
			<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
			<script src="https://kit.fontawesome.com/1bd3419ec6.js" crossorigin="anonymous"></script>
			
			<!------- LOADING SCREEN SCRIPT------- -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
			<script type="text/javascript" src="view/showMyPraticiens/main2.js"></script>
			<!------- END LOADING SCREEN ------- -->
			<title>ADNR Consults- Mes Praticiens</title>
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
						<h2>MES PRATICIENS</h2>
					</center>
				</div>

				<div id="seventhBloc" style="visibility: visible;">
					<center>
				<?php
					if ($numberOfResults == 0) 
					{
				?>
						<br><br><br>
						<h6>Vous n'avez choisi aucun praticien pour l'instant</h6>
				<?php
				}
					if ($numberOfResults !== 0) 
					{
						while ($rows = $showMyPraticiensId -> fetch())
						{
							$praticienId = $rows['praticienId'];
							$showMyPraticiensDetails = $userManager -> showMyPraticiensDetails($praticienId);

							while ($rows2 = $showMyPraticiensDetails -> fetch()) 
							{
				?>
								<div>
									<h2><?= ucfirst(base64_decode($rows2['firstname'])) . " " . ucfirst(base64_decode($rows2['lastname'])) . " " ?></h2>
									<a href="index.php?action=viewMoreOfThisPraticien&id=<?=$rows['id']?>" id="clientSelectButton">Voir plus</a>
									<a href="index.php?action=deleteThisPraticienForMe&id=<?=$rows['id']?>" id="clientSelectButton">Supprimer ce praticien</a>
									<hr>
								</div>
				<?php
							}
						}
					}
				?>
					</center>
				</div>
			</div>
			<script type="text/javascript" src="view/showMyPraticiens/main.js"></script>
		</body>
	</html>

<?php
	}

	else
	{
		header("location:index.php");
	}


?>