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
			<link rel="stylesheet" type="text/css" href="view/showSelectedPraticienDetails/style.css">
			<link rel="icon" type="image/png" href="view/showSelectedPraticienDetails/images/logo.png" />
			<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
			<script src="https://kit.fontawesome.com/1bd3419ec6.js" crossorigin="anonymous"></script>
			
			<!------- LOADING SCREEN SCRIPT------- -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
			<script type="text/javascript" src="view/showSelectedPraticienDetails/main2.js"></script>
			<!------- END LOADING SCREEN ------- -->
			<title>DASHBOARD</title>
		</head>
		<body id="body">
			<!------------ LOADING SCREEN ------------->
			<div class="se-pre-con"></div>	
			<!----------------------------------------->			
			<div id="topMenuNav">
				<div>
					<img id="logoImage" src="view/showSelectedPraticienDetails/images/logo.png" alt="logo_png">
					<i id="menuIcon" class="fa-solid fa-align-justify"></i>
				</div>

				<div id="usernameTopNav">
				      <ul class="navbar">
				        <li>
				          <a id="usernameTopNavLink" href="#"><?= base64_decode($_SESSION['userName']) ?> <i class="fa-solid fa-chevron-down"></i></a>
				          <ul>
				            <li><a href="index.php?action=accueil">Accueil</a></li>
				            <li><a href="#">Mon compte</a></li>
				            <li><a href="index.php?action=settings">Paramètres</a></li>
				            <li><a href="index.php?action=aboutUs">Plus</a></li>
				          </ul>
				        </li>
				      </ul>
				</div>

				<div id="searchBox">
					<input id="searchBoxTopNav" type="search" name="searchBox" placeholder="Recherchez votre praticien...">
				</div>

				<div id="timeClock">
				 	<i id="clock" class="fa-solid fa-clock"></i>&nbsp;
	        		<p id="time"></p>&nbsp;
	        		<p id="day"></p>&nbsp;&nbsp;
	        		<p id="date"></p>
	    		</div>

	    		<div id="agenda">	
	    			<a id="agendaLink" href="index.php?action=agenda"><i class="fa-solid fa-calendar-days" onclick="dashboardAppearence('rendezvous')"></i></a>
	    		</div>

	    		<div id="username">	
	    			<a id="usernameLink" href=""><i class="fa-solid fa-user-tie"></i> <?= base64_decode($_SESSION['userName']) ?> </i></a>
	    		</div>

	    		<div id="logout">
	    			<a id="logoutLink" href="index.php?action=logout"><i class="fa-solid fa-power-off"></i></a>
	    		</div>
			</div>		

			<nav class="main-menu">
				<!--<div>
				    <a class="logo" href="#"></a> 
				</div> 
				<div class="settings"></div>
				<div class="scrollbar" id="style-1">-->
				      
					<ul>
						<li>                                   
							<a href="index.php?action=accueil">
								<i class="fa fa-home fa-lg"></i>
								<span class="nav-text">Accueil</span>
							</a>
						</li> 

						<li>  
					   
							<a href="index.php?action=takeAnAppointment">
								<i class="fa fa-solid fa-calendar-plus"></i>
								<span class="nav-text">Prendre rendez-vous</span>
							</a>
						</li>

						<li>                                 
							<a href="index.php?action=agenda">
								<i class="fa fa-solid fa-calendar"></i>
								<span class="nav-text">Mes rendez-vous</span>
							</a>
						</li>

					    
						<li>                                 
							<a href="index.php?action=showPraticiensList">
								<i class="fa fa-solid fa-people-group"></i>
								<span class="nav-text">Tous les praticiens</span>
							</a>
						</li>   
	  
						<li class="darkerlishadow">
							<a href="index.php?action=showMyPraticiens">
								<i class="fa fa-solid fa-user-doctor"></i>
								<span class="nav-text">Mes praticiens</span>
							</a>
						</li>
	  
	  
						<li class="darkerli">
							<a href="index.php?action=logout">
								<i class="fa fa-thin fa-door-open"></i>
								<span class="nav-text">Quitter</span>
							</a>
						</li>

						<li class="darkerli">
							<a href="index.php?action=showPraticiensList">
								<i class="fa fa-thin fa-user-plus"></i>
								<span class="nav-text">Choisir un praticien</span>
							</a>
						</li>
	  
						<li class="darkerli">
							<a href="index.php?action=myDocuments">
								<i class="fa fa-thin fa-file"></i>
								<span class="nav-text">Documents</span>
							</a>
						</li>

						<li class="darkerli">
							<a href="index.php?action=gotoMails" onclick="dashboardAppearence('courriers')">
								<i class="fa fa-thin fa-envelope"></i>
								<span class="nav-text">Messagerie</span>
							</a>
						</li>
	  
						<li class="darkerli">
							<a href="index.php?action=settings">
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
							<a href="index.php?action=aboutUs">
								<i class="fa fa-solid fa-info"></i>
								<span class="nav-text">A Propos De Nous</span>
							</a>
						</li>
					</ul>  
	    
	  
					<ul class="logout">
						<li>
		                   <a href="index.php?action=logout">
		                        <i class="fa fa-thin fa-power-off"></i>
		                        <span class="nav-text">Se déconnecter</span>    
		                    </a>
						</li>  
					</ul>
	    		</div>	
			</nav>

			<div id="mainAppearence">


				<div id="fifthBloc">
					
					<center id="clientListTitle">
						<h2><u>Liste de mes praticiens</u></h2>
					</center>
				</div>

				<div id="seventhBloc" style="visibility: visible;">
					<center>
				<?php
						while ($rows = $viewMoreOfThisPraticien -> fetch())
						{
							$praticienId = $rows['id'];

				?>
								<h2><?= ucfirst(base64_decode($rows['firstname'])) . " " . ucfirst(base64_decode($rows['lastname'])) . " " ?></h2>
								<h3>Cabinet au</h3>
								<h4><?= $rows['praticienRoadNumber'] . " " . ucwords($rows['praticienRoadName']) . "<br>" . $rows['praticienCodePostal'] . ", " . $rows['praticienCityName'] . "<br>" . $rows['praticienCountry'] . "<br><br>Téléphone : " . trim(strrev(chunk_split(strrev($rows['praticienCabinetPhoneNumber']),2, ' ')));?></h4>
								<a href="index.php?action=showMyPraticiens" id="clientSelectButton">Retour</a>
								<hr>
				<?php
						}
				?>
					</center>
				</div>
			</div>
			<script type="text/javascript" src="view/showSelectedPraticienDetails/main.js"></script>
		</body>
	</html>

<?php
	}

	else
	{
		header("location:index.php");
	}


?>