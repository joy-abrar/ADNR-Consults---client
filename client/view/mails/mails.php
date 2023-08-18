<?php
	
	if (session_status() === PHP_SESSION_NONE) 
	{
		session_start();
	}

 
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
			$getMail ->execute(array($_SESSION['userName']));
			$numberOfResults = $getMail -> rowCount();
			$getSentMail = $db -> prepare('SELECT * FROM mails WHERE senderMail = ? ORDER BY mailTime DESC');
			$getSentMail ->execute(array($_SESSION['userName']));


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
			<script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/view/home/home.php/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
			<script src="https://kit.fontawesome.com/1bd3419ec6.js" crossorigin="anonymous"></script>
			 <script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

			<!------- LOADING SCREEN SCRIPT------- -->
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
				include_once('../../lib/sideMenu1.php');
			?>

			
			<h2 id="mailTitle">MESSAGERIE</h2>
			<br>
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

				<form method="POST" action="../../index.php?action=sendThisMail">
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
							<input type="submit" name="cancel" id="annulerButton" value="annuler" >
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
					<?php
					?>	
								<tr> 
								    <td><?php echo base64_decode($rows['senderMail']); ?></td> 
								    <td><?php echo $rows['mailTime'] ?></td>
								    <td><?php echo base64_decode($rows['mailTitle']); ?></td> 
								    <td  class="text"><?php echo htmlspecialchars_decode( base64_decode($rows['mailContent'])) ?></td> 
								    <td><a href="../../index.php?action=deleteThisSelectedMail&id= <?= $rows['id'] ?>" style="margin-left: 36%;"><i class="fa-solid fa-trash"></i></a></td>
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
								    <td><a href="../../index.php?action=deleteThisSelectedMail&id= <?= $rows2['id'] ?>" style="margin-left: 36%;"><i class="fa-solid fa-trash"></i></a></td>
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