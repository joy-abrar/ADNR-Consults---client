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
			<link rel="stylesheet" type="text/css" href="style.css">
			<link rel="stylesheet" type="text/css" href="../../lib/css/styleMenubar.css">
			<link rel="icon" type="image/png" href="images/logo.png" />
			<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<link rel="stylesheet" href="6-calendar.css">			
			<script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
			<script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

			<script src="https://kit.fontawesome.com/1bd3419ec6.js" crossorigin="anonymous"></script>
    		<script src="5-calendar.js"></script>
    		<!------- LOADING SCREEN ------- -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
			<script type="text/javascript" src="main2.js"></script>
			<!------- END LOADING SCREEN ------- -->
			<title>DASHBOARD</title>
		</head>
		<body id="body">
			<!------------ LOADING SCREEN ------------->
			<div class="se-pre-con"></div>	
			<!----------------------------------------->
			
			<?php
				include_once('../../lib/topMenu1.php');
			?>		

			<nav class="main-menu">
				<!--<div>
				    <a class="logo" href="#"></a> 
				</div> 
				<div class="settings"></div>
				<div class="scrollbar" id="style-1">-->
				      
					<ul>
						<li>                                   
							<a href="../../index.php?action=accueil">
								<i class="fa fa-home fa-lg"></i>
								<span class="nav-text">Accueil</span>
							</a>
						</li>   
					   
						<li>                                 
							<a href="../../index.php?action=takeAnAppointment">
								<i class="fa fa-solid fa-calendar-plus"></i>
								<span class="nav-text">Prendre rendez-vous</span>
							</a>
						</li>

						<li>                                 
							<a href="../../index.php?action=agenda">
								<i class="fa fa-solid fa-calendar"></i>
								<span class="nav-text">Mes rendez-vous</span>
							</a>
						</li>

					    
						<li>                                 
							<a href="../../index.php?action=showPraticiensList">
								<i class="fa fa-solid fa-people-group"></i>
								<span class="nav-text">Tous les praticiens</span>
							</a>
						</li>   
	  
						<li class="darkerlishadow">
							<a href="../../index.php?action=showMyPraticiens">
								<i class="fa fa-solid fa-user-doctor"></i>
								<span class="nav-text">Mes praticiens</span>
							</a>
						</li>
	  
	  
						<li class="darkerli">
							<a href="../../index.php?action=logout">
								<i class="fa fa-thin fa-door-open"></i>
								<span class="nav-text">Quitter</span>
							</a>
						</li>

						<li class="darkerli">
							<a href="../../index.php?action=showPraticiensList">
								<i class="fa fa-thin fa-user-plus"></i>
								<span class="nav-text">Choisir un praticien</span>
							</a>
						</li>
	  
						<li class="darkerli">
							<a href="../../index.php?action=myDocuments" >
								<i class="fa fa-thin fa-file"></i>
								<span class="nav-text">Documents</span>
							</a>
						</li>

						<li class="darkerli">
							<a href="../../index.php?action=gotoMails" onclick="dashboardAppearence('courriers')">
								<i class="fa fa-thin fa-envelope"></i>
								<span class="nav-text">Messagerie</span>
							</a>
						</li>
	  
						<li class="darkerli">
							<a href="../../index.php?action=settings">
								<i class="fa fa-thin fa-screwdriver-wrench"></i>
								<span class="nav-text">Configuration</span>
							</a>
						</li>
					

	  
						<li class="darkerli">                                  
							<a href="#">
								<i class="fa fa-question-circle fa-lg"></i>
								<span class="nav-text">Aide</span>
							</a>
						</li>

						<li class="darkerli">                                  
							<a href="../../index.php?action=aboutUs">
								<i class="fa fa-solid fa-info"></i>
								<span class="nav-text">A Propos De Nous</span>
							</a>
						</li>
	    
	  				</ul>

					<ul class="logout">
						<li>
		                   <a href="../../index.php?action=logout">
		                        <i class="fa fa-thin fa-power-off"></i>
		                        <span class="nav-text">Se déconnecter</span>    
		                    </a>
						</li>  
					</ul>
	    		</div>	
			</nav>

			<div id="mainAppearence">

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
						      	<input type="text" id="evttxt" name="txt" required>
						      	<label for="color">Couleur</label>
						      	<input type="color" id="evtcolor" name="color" value="#e4edff" required/>
						      	<input type="submit" id="calformsave" value="Sauvegarder"/>
						      	<input type="button" id="calformdel" value="Supprimer"/>
						      	<input type="button" id="calformcx" value="Annuler"/>
					    	</form>
					    </div>
					    <!-- --------------------------------------------------- END OF THE CALENDAR ------------------------------------------------------------------------->
				</div>
			<script type="text/javascript" src="mailMain.js"></script>
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