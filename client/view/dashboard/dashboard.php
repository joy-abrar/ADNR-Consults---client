<?php
if (session_status() === PHP_SESSION_NONE) 
	{
		session_start();
	}

	if ($_SESSION['sessionStatus'] == "online") 
	{
			/*
			$host_name = '127.0.0.1'; 
			$database = 'c1AdnCons2022bdd'; 
			$user_name = 'c1ConsAdn2022'; 
			$password = 'aqPZQq#8Zs'; */
			$host_name = 'localhost'; 
			$database = 'projet1'; 
			$user_name = 'root'; 
			$password = ''; 
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
			$getMail ->execute(array($_SESSION['userName']));

			$getSentMail = $db -> prepare('SELECT * FROM mails WHERE senderMail = ? ORDER BY mailTime DESC');
			$getSentMail ->execute(array($_SESSION['userName']));
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="view/dashboard/mailStyle.css">
			<link rel="stylesheet" type="text/css" href="view/dashboard/style.css">
			<link rel="icon" type="image/png" href="view/dashboard/images/logo.png" />
			<link rel="stylesheet" type="text/css" href="lib/css/styleMenubar.css">
			<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<link rel="stylesheet" href="view/dashboard/6-calendar.css">			
			<!--<script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>-->
			
			<script src="https://kit.fontawesome.com/1bd3419ec6.js" crossorigin="anonymous"></script>
    		<script src="view/dashboard/5-calendar.js"></script>
			<!------- LOADING SCREEN SCRIPT------- -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>-->
			<script type="text/javascript" src="view/dashboard/main2.js"></script>
			<!------- END LOADING SCREEN ------- -->
			<title>Tableau De Bord</title>
			<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
			<meta http-equiv="Pragma" content="no-cache" />
			<meta http-equiv="Expires" content="0" />
		</head>
		<body id="body">
			<script language="javascript">
				/*
					addEventListener("click", function() 
					{
					    var el = document.documentElement, rfs = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen;rfs.call(el);
					});
				*/
			</script> 
			<!------------ LOADING SCREEN ------------->
			<div class="se-pre-con"></div>	
			<!----------------------------------------->
			<?php
				include_once('lib/topMenu2.php');
				include_once('lib/sideMenu2.php');
			?>

			<div id="mainAppearence">


				<div id="forthBloc">
					<div id="forthSubBlocOne">
			    		<a href="index.php" id="dashboardsecondSubBlocOne"><h3><?php if ($_SESSION['userSexe'] == "m") {?><i id="gendreParam" class="fa-solid fa-hospital-user" style="color:#3c5dff"></i><?php } if ($_SESSION['userSexe'] == "f") {?><i id="gendreParam" class="fa-solid fa-hospital-user" style="color:#fb2c66"></i> <?php }  ?>&nbsp;&nbsp;&nbsp; Bonjour <span><?= base64_decode($_SESSION['firstName']) ?> [<?= $_SESSION['userAge'] ?> Ans]</span></h3></a>
			    	</div>

			    	<div id="forthSubBlocTwo" style="background: whitesmoke; pointer-events: none; opacity: 1;">
			    		<center><h3>Coming Soon !</h3></center>
			    	</div>
				</div>

				<div id="thirdBloc">
					<div id="thirdSubBlocOne" style="background: whitesmoke; pointer-events: none; opacity: 1;">
			    		<center><h3>Coming Soon !</h3></center>
			    	</div>

			    	<div id="thirdSubBlocTwo" style="background: whitesmoke; pointer-events: none; opacity: 1;">
			    		<center><h3>Coming Soon !</h3></center>
			    	</div>

			    	<div id="thirdSubBlocThree" style="background: whitesmoke; pointer-events: none; opacity: 1;">
			    		<center><h3>Coming Soon !</h3></center>
			    	</div>
				</div>

				<div id="fifthBloc">
					
					<div id="fifthSubBlocOne" onclick="dashboardAppearence('dashboard')">
			    		<b id="dashboardButton"><i class="fa-solid fa-gauge"></i> Tableau de bord</b>
			    	</div>
			    	
			    	<div id="fifthSubBlocTwo" onclick="dashboardAppearence('rendezvous')">
			    		<b id="rendezVousButton"><i class="fa-solid fa-calendar-check"></i> Rendez-vous</b>
			    	</div>
			    	
			    	<div id="fifthSubBlocThree" onclick="dashboardAppearence('documents')">
			    		<b id="documentsButton"><i class="fa-solid fa-file"></i> Documents</b>
			    	</div>

			    	<div id="fifthSubBlocFour" onclick="dashboardAppearence('courriers')">
			    		<b id="courriersButton"><i class="fa-solid fa-envelope"></i> Messagerie</b>
			    	</div>		
				</div>

				<div id="sixthBloc">
					<div id="sixthSubBlocOne">
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
				</div>

				<div id="secondBloc">
					<center><h4><u>Mes Praticiens</u></h4></center>
			    	<?php
			    		if ($numberOfResults == 0) 
						{
					?>
							<div id="secondSubBlocOne">
								<center><h5>Vous n'avez choisi aucun praticien pour le moment</h5></center>
							</div>
					<?php	
						}

						if ($numberOfResults !== 0) 
						{
							while ($rows = $showMyPraticiensId -> fetch())
							{
								$praticienId = $rows['praticienId'];
								$showMyPraticiensDetails = $userManager -> showMyPraticiensDetailsForDashboard($praticienId);
								while ($rows2 = $showMyPraticiensDetails -> fetch())
								{
					?>
									<div id="secondSubBlocOne">
										<center>
											<h4><?= ucfirst(base64_decode($rows2['firstname'])) . " " . ucfirst(base64_decode($rows2['lastname']))?></h4>
											<h5>Cabinet au <br></h5>
											<h6><?= $rows2['praticienRoadNumber'] . " " . ucwords($rows2['praticienRoadName']) . "<br>" . $rows2['praticienCodePostal'] . ", " . ucwords($rows2['praticienCityName']) . "<br>" . strtoupper($rows2['praticienCountry']) ?><br>Numéro du cabinet : <?= trim(strrev(chunk_split(strrev($rows2['praticienCabinetPhoneNumber']),2, ' '))) ?> </h6>
										</center>
									</div>
					<?php
								}
							}
						}
					?>
			    	<!--
			    	<div id="secondSubBlocTwo">
			    		<a href="../questionnaires/index.php?action=questions1" id="dashboardMenuOption"><img id="dashboardMenuOptionsImage" src="images/qcm.png">QCM</a>
			    	</div>

			    	<div id="secondSubBlocThree">
			    	</div>

			    	<div id="secondSubBlocFour">
			    	</div>
			    	-->
				</div>

				<div id="seventhBloc">
					<div id="seventhSubBlocOne">
						<div id="mailBloc">
						<div id="mailOptions">
							<div id="mailOptionsItem" onclick="mail('writeFunction')">
								<i id="mailOptionsItemDeco" class="fa-solid fa-pen"></i> <a id="mailOptionsItemDeco" href="#">écrire un message</a>
							</div>
							<div id="mailOptionsItem" onclick="mail('allMailFunction')">
								<i id="mailOptionsItemDeco" class="fa-solid fa-inbox"></i> <a id="mailOptionsItemDeco" href="#">messages reçus</a>
							</div>
							<div id="mailOptionsItem" onclick="mail('archiveFunction')">
								<i id="mailOptionsItemDeco" class="fa-solid fa-box-archive"></i> <a id="mailOptionsItemDeco" href="#">messages archivées</a>
							</div>
							<div id="mailOptionsItem" onclick="mail('sentMailFunction')">
								<i id="mailOptionsItemDeco" class="fa-solid fa-inbox"></i> <a id="mailOptionsItemDeco" href="#">messages envoyés</a>
							</div>
							<div id="mailOptionsItem" onclick="mail('readFunction')">
								<i id="mailOptionsItemDeco" class="fa-solid fa-box-archive"></i> <a id="mailOptionsItemDeco" href="#">messages lus</a>
							</div>

							<div id="mailOptionsItem" onclick="mail('unreadFunction')">
								<i id="mailOptionsItemDeco" class="fa-solid fa-box-archive"></i> <a id="mailOptionsItemDeco" href="#">messages non lus</a>
							</div>
						</div>

				<form method="POST" action="index.php?action=sendThisMail">
					<div id="writeAmail">
						<div id="toUserDetails">
							&nbsp;envoyer à : &nbsp;&nbsp;<input id="toUserInputForm" type="text" name="sendTo" autocomplete="off">
						</div>

						<div id="mailSubject">
							&nbsp;sujet : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="mailSubjectInputForm" type="text" name="mailSubject" autocomplete="off">
						</div>

						<div id="toUserMessage">
							&nbsp;votre message : &nbsp;&nbsp;<textarea id="textArea" name="message"></textarea>
						</div>

						<div id="sendingPartButtons">
							<input type="submit" id="envoyerButton" name="envoyer" value="envoyer">
							<input type="submit" id="annulerButton" name="cancel" value="annuler">
						</div>
					</div>
				<form>

				<div id="allMail">
					<center><h2>ICI TOUS VOS MESSAGES !</h2></center>
								
					<table class="zebra"> 
						</thead>
						<thead> 
						<tr> 
						    <th style="width:15%; min-width: 15%; max-width: 15%;">From</th> 
						    <th style="width:8%; min-width: 8%; max-width: 8%;">Date</th>
						    <th style="width:20%; min-width: 20%; max-width: 20%;">Subject</th>
						    <th style="width:45%; min-width: 45%; max-width: 45%;">Message</th> 
						    <th style="width:2%; min-width: 2%; max-width: 2%;">Options</th> 
						</tr> 
						</thead> 
						<tbody> 
					<?php
						while ($rows = $getMail -> fetch()) 
						{
					?>	
								<tr> 
								    <td><?php echo base64_decode($rows['senderMail']); ?></td> 
								    <td><?php echo $rows['mailTime'] ?></td>
								    <td><?php echo base64_decode($rows['mailTitle']); ?></td> 
								    <td  class="text"><?php echo htmlspecialchars_decode( base64_decode($rows['mailContent'])) ?></td> 
								    <td><a href="index.php?action=deleteThisSelectedMail&id= <?= $rows['id'] ?>" style="margin-left: 36%;"><i class="fa-solid fa-trash"></i></a></td>
								</tr>
					<?php
						 } 
					?>
						</tbody> 
					</table> 	
				</div>

				<div id="archiveMail">
					<center><h2>ICI TOUS VOS MESSAGES ARCHIVEE !</h2></center>
				</div>

				<div id="sentMail">
					<center><h2>ICI TOUS VOS MESSAGES ENVOYEE !</h2></center>
					<table class="zebra"> 
						</thead>
						<thead> 
						<tr> 
						    <th style="width:15%; min-width: 15%; max-width: 15%;">From</th> 
						    <th style="width:8%; min-width: 8%; max-width: 8%;">Date</th>
						    <th style="width:20%; min-width: 20%; max-width: 20%;">Subject</th>
						    <th style="width:45%; min-width: 45%; max-width: 45%;">Message</th> 
						    <th style="width:2%; min-width: 2%; max-width: 2%;">Options</th> 
						</tr> 
						</thead> 
						<tbody> 
					<?php
						while ($rows2 = $getSentMail -> fetch()) 
						{
					?>

								<tr> 
								    <td><?php echo base64_decode($rows2['receiverMail']); ?></td> 
								    <td><?php echo $rows2['mailTime'] ?></td>
								    <td><?php echo base64_decode($rows2['mailTitle']); ?></td> 
								    <td  class="text"><?php echo htmlspecialchars_decode( base64_decode($rows2['mailContent'])) ?></td> 
								    <td><a href="index.php?action=deleteThisSelectedMail&id= <?= $rows2['id'] ?>" style="margin-left: 36%;"><i class="fa-solid fa-trash"></i></a></td>
								</tr> 

					<?php
						 }
					?>
						</tbody> 
					</table> 	
				</div>

				<div id="readMail">
					<center><h2>ICI TOUS VOS MESSAGES LU !</h2></center>
				</div>

				<div id="unreadMail">
					<center><h2>ICI TOUS VOS MESSAGES NON LU !</h2></center>
				</div>

				<!--<div>
					<textarea id="mytextarea">
    					Welcome to TinyMCE!
  					</textarea>	
				</div>-->

			</div>
					</div>
				</div>
			</div>
			<script type="text/javascript" src="view/dashboard/mailMain.js"></script>
			<script type="text/javascript" src="view/dashboard/main.js"></script>
		</body>
	</html>

<?php
	}

	else
	{
		header("location:index.php");
	}


?>