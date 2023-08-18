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
			<link rel="stylesheet" type="text/css" href="view/showPraticienQuestionSheet/style.css?version=1.0">
			<link rel="stylesheet" type="text/css" href="lib/css/styleMenubar.css">
			<link rel="icon" type="image/png" href="view/showPraticienQuestionSheet/images/logo.png" />
			<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
			<script src="https://kit.fontawesome.com/1bd3419ec6.js" crossorigin="anonymous"></script>
			
			<!------- LOADING SCREEN SCRIPT------- -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
			<script type="text/javascript" src="view/showPraticienQuestionSheet/main2.js"></script>
			<!------- END LOADING SCREEN ------- -->
			<title>Documents</title>
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
						<h2>Questionnaires Praticiens</h2>
					</center>
				</div>

				<div id="seventhBloc" style="visibility: visible;">
					<center>
						<table class="zebra"> 
							</thead>
							<thead> 
								<tr> 
								    <th>Nom du questionnaire</th> 
								    <th>Donné(e) par</th> 
								    <th>Antécédents</th>
								    <th>Lieu de vie, loisirs</th>
								    <th>Vie professionnelle</th>
								    <th>Alimentation</th>
								    <th>Digestion - transit</th>
								    <th>SYSTEME RESPIRATOIRE - ORL</th>
								    <th>SYSTEME CARDIOVASCULAIRE</th>
								    <th>SYSTEME URO-GENITAL</th>
								    <th>SYSTEME OSSEUX, MUSCULAIRE ET ARTICULAIRE</th>
								    <th>SYSTEME PEAU ET PHANERE </th>
								    <th>SYSTEME EMOTIONEL ET VIATLITE </th>
								    <th>SOMMEIL </th>
								    <th>Statue</th>
								    <th>Crée le</th>
								    <th>Action</th>
								</tr> 
							</thead> 
							<tbody> 
								<?php
								/* ----------------------------- DOCUMENTS PUBLISHED BY CLIENT ITSELF (CAN BE MODIFIED AND SHARE BY THEMSELVES) ------------------------------ */
									while($rows = $showPraticienQuestionSheet -> fetch())
									{
										$praticienId = $rows['praticienId'];

										$getPraticienNameForQuestionSheet = $userManager -> getPraticienNameForQuestionSheet($praticienId);
										while($rows2 = $getPraticienNameForQuestionSheet -> fetch())
										{
								?>			<tr>	
												<td style="color:blue"><i class="fa-solid fa-file"></i><?= $rows['testName'] ?></td>
												<td style="color:magenta;"> <?= ucfirst(base64_decode($rows2['firstname'])) . " " . strtoupper(base64_decode($rows2['lastname'])) ?></td>
												<?php
													if ($rows['bloc1'] == 1) 
													{
												?>
														<td style="color:green"><i class="fa-solid fa-check"></i></td>
												<?php	
													}
													else
													{
												?>		
														<td style="color:red"><i class="fa-solid fa-xmark"></i></td>
												<?php
													}

													if ($rows['bloc2'] == 1) 
													{
												?>
														<td style="color:green"><i class="fa-solid fa-check"></i></td>
												<?php	
													}
													else
													{
												?>		
														<td style="color:red"><i class="fa-solid fa-xmark"></i></td>
												<?php
													}
													if ($rows['bloc3'] == 1) 
													{
												?>
														<td style="color:green"><i class="fa-solid fa-check"></i></td>
												<?php	
													}
													else
													{
												?>
														<td style="color:red"><i class="fa-solid fa-xmark"></i></td>
												<?php
													}

													if ($rows['bloc4'] == 1) 
													{
												?>
														<td style="color:green"><i class="fa-solid fa-check"></i></td>
												<?php	
													}
													else
													{
												?>		
														<td style="color:red"><i class="fa-solid fa-xmark"></i></td>
												<?php
													}

													if ($rows['bloc5'] == 1) 
													{
												?>
														<td style="color:green"><i class="fa-solid fa-check"></i></td>
												<?php	
													}
													else
													{
												?>		
														<td style="color:red"><i class="fa-solid fa-xmark"></i></td>
												<?php
													}

													if ($rows['bloc6'] == 1) 
													{
												?>
														<td style="color:green"><i class="fa-solid fa-check"></i></td>
												<?php	
													}
													else
													{
												?>		
														<td style="color:red"><i class="fa-solid fa-xmark"></i></td>
												<?php
													}

													if ($rows['bloc7'] == 1) 
													{
												?>
														<td style="color:green"><i class="fa-solid fa-check"></i></td>
												<?php	
													}
													else
													{
												?>		
														<td style="color:red"><i class="fa-solid fa-xmark"></i></td>
												<?php
													}

													if ($rows['bloc8'] == 1) 
													{
												?>
														<td style="color:green"><i class="fa-solid fa-check"></i></td>
												<?php	
													}
													else
													{
												?>		
														<td style="color:red"><i class="fa-solid fa-xmark"></i></td>
												<?php
													}

													if ($rows['bloc9'] == 1) 
													{
												?>
														<td style="color:green"><i class="fa-solid fa-check"></i></td>
												<?php	
													}
													else
													{
												?>		
														<td style="color:red"><i class="fa-solid fa-xmark"></i></td>
												<?php
													}

													if ($rows['bloc10'] == 1) 
													{
												?>
														<td style="color:green"><i class="fa-solid fa-check"></i></td>
												<?php	
													}
													else
													{
												?>		
														<td style="color:red"><i class="fa-solid fa-xmark"></i></td>
												<?php
													}

													if ($rows['bloc11'] == 1) 
													{
												?>
														<td style="color:green"><i class="fa-solid fa-check"></i></td>
												<?php	
													}
													else
													{
												?>		
														<td style="color:red"><i class="fa-solid fa-xmark"></i></td>
												<?php
													}

													if ($rows['bloc12'] == 1) 
													{
												?>
														<td style="color:green"><i class="fa-solid fa-check"></i></td>
												<?php	
													}
													else
													{
												?>		
														<td style="color:red"><i class="fa-solid fa-xmark"></i></td>
												<?php
													}
												?>

												<?php if ($rows['bilanStatus'] === "notSubmittedByClient") 
														  {
												?>
															<td style="color: red;">Non réalisé</td>
												<?php
														  }

														  if ($rows['bilanStatus'] === "submittedByClient") 
														  {
												?>
															<td style="color: green;">Réalisé</td>
												<?php
														  } 
													?> 
												
												<td><?= $rows['createdOn']?> </td>
												<?php
														  if ($rows['bilanStatus'] === "submittedByClient") 
														  {
												?>
															<td><b style="text-decoration: none;">INDISPONIBLE</b></td>
												<?php
														  }

														  if ($rows['bilanStatus'] === "notSubmittedByClient") 
														  {
												?>
															<td><a style="text-decoration: none;" href="index.php?action=startThisQuestionSheet&questionSheetId=<?= $rows['id'] ?>">Commencer <i class="fa-solid fa-file"></i></a></td>
												<?php
														  }
												?>
											</tr>
								<?php
										}
									}
								?>
							</tbody> 
						</table> 
					</center>
				</div>
			</div>
			<script type="text/javascript" src="view/showPraticienQuestionSheet/main.js"></script>
		</body>
	</html>

<?php
	}

	else
	{
		header("location:index.php");
	}


?>