<?php
if (session_status() === PHP_SESSION_NONE) 
	{
		session_start();
	}

	if ($_SESSION['sessionStatus'] == "online") 
	{
			$host_name = '127.0.0.1'; 
			$database = 'c1AdnCons2022bdd'; 
			$user_name = 'c1ConsAdn2022'; 
			$password = 'aqPZQq#8Zs'; 
			$db = null; 
			try 
			{ 
				$db = new PDO("mysql:host=$host_name; dbname=$database", $user_name, $password); 
			} 
			catch (PDOException $e) 
			{ 
				echo "Erreur!: " . $e->getMessage() . "<br/>"; 
				die(); 
			}
			
			$getMail = $db -> prepare('SELECT * FROM mails WHERE receiverMail = ? ORDER BY mailTime DESC');
			$getMail ->execute(array($_SESSION['userEmail']));

			$getSentMail = $db -> prepare('SELECT * FROM mails WHERE senderMail = ? ORDER BY mailTime DESC');
			$getSentMail ->execute(array($_SESSION['userEmail']));
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="view/takeAnAppointment/style.css">
			<link rel="stylesheet" type="text/css" href="lib/css/styleMenubar.css">
			<link rel="icon" type="image/png" href="view/takeAnAppointment/images/logo.png" />
			<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<link rel="stylesheet" href="view/takeAnAppointment/6-calendar.css">			
			<script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
			<script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

			<script src="https://kit.fontawesome.com/1bd3419ec6.js" crossorigin="anonymous"></script>
    		<script src="view/takeAnAppointment/5-calendar.js"></script>
    		<!------- LOADING SCREEN ------- -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
			<script type="text/javascript" src="view/takeAnAppointment/main2.js"></script>
			<!------- END LOADING SCREEN ------- -->
			<title>Prendre un rendez-vous</title>
		</head>
		<body id="body">
			<!------------ LOADING SCREEN ------------->
			<div class="se-pre-con"></div>	
			<!----------------------------------------->	
			<?php
				include_once('lib/topMenu2.php');
				include_once('lib/sideMenu2.php');
			?>
			<br>
			<center>
				<form method="POST" action="index.php?action=showPraticienAvailabilityForAppointment">
					<label for="pet-select">Veuillez choisir Votre praticien :</label>
					<select id="pet-select" name="praticienId">
						<option value="">-- Votre praticien ici --</option>
						<?php
							if ($numberOfResults == 0) 
							{
						?>
								<option>Aucun praticien disponible</option>
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
										<option value="<?= $rows2['id'] ?>"><?= base64_decode($rows2['firstname']) . " " . base64_decode($rows2['lastname']) ?></option>
						<?php
									}
								}
							}
						?>
					</select>
					<input type="submit" name="seeThisPraticienCalendar" value="Voir">
				</form>
			</center>

			<div id="mainAppearence" style="pointer-events: none;;">
				<div id="agendaParam">
			    	<!------------------------------------- CALENDAR IMPLEMENT -------------------------------->
						<!-- (A) PERIOD SELECTOR -->
					    <div id="calPeriod">
					    	<?php
						      // (A1) MONTH SELECTOR
						      // NOTE: DEFAULT TO CURRENT SERVER MONTH YEAR
						      $months =
						      [
						        1 => "Janvier", 2 => "Février", 3 => "Mars", 4 => "Avril",
						        5 => "Mai", 6 => "Juin", 7 => "Juillet", 8 => "Août",
						        9 => "Septembre", 10 => "Octobre", 11 => "Novembre", 12 => "Décembre"
						      ];
						      $monthNow = date("m");
						      echo "<select id='calmonth'>";
						      foreach ($months as $m=>$mth) 
						      {
						        printf("<option value='%s'%s>%s</option>",
						          $m, $m==$monthNow?" selected":"", $mth);
						      }
						      echo "</select>";

						      // (A2) YEAR SELECTOR
						      echo "<input type='number' id='calyear' value='".date("Y")."'/>";
						   	?>
						   		
						</div>

					    <!-- (B) CALENDAR WRAPPER -->
					    <div id="calwrap"></div>

					    <!-- (C) EVENT FORM -->
					    <div id="calblock">
					    	<form id="calform">
						    	<input type="hidden" name="req" value="save"/>
						      	<input type="hidden" id="evtid" name="eid"/>
						      	<label for="start">Début d'évènement</label>
						      	<input type="datetime-local" id="evtstart" name="start" required/>
						      	<label for="end">Fin d'évènement</label>
						      	<input type="datetime-local" id="evtend" name="end" required/>
						      	<label for="txt">Type d'évènement</label>
						      	<input type="text" id="evttxt" name="txt" autocomplete="off" required>
						      	<label for="color">Couleur</label>
						      	<input type="color" id="evtcolor" name="color" value="#e4edff" required/>
						      	<input type="submit" id="calformsave" value="Sauvegarder"/>
						      	<input type="button" id="calformdel" value="Supprimer"/>
						      	<input type="button" id="calformcx" value="Annuler"/>
					    	</form>
					    </div>
					    <!-- --------------------------------------------------- END OF THE CALENDAR ------------------------------------------------------------------------->
				</div>
			<script type="text/javascript" src="view/takeAnAppointment/mailMain.js"></script>
			<script type="text/javascript" src="view/takeAnAppointment/main.js"></script>
		</body>
	</html>

<?php
	}

	else
	{
		header("location:index.php");
	}


?>