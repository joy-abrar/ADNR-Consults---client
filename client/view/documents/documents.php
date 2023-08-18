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
			<link rel="stylesheet" type="text/css" href="view/documents/style.css">
			<link rel="icon" type="image/png" href="view/documents/images/logo.png" />
			<link rel="stylesheet" type="text/css" href="lib/css/styleMenubar.css">
			<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<!--<script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>-->
			<script src="https://kit.fontawesome.com/1bd3419ec6.js" crossorigin="anonymous"></script>
			
			<!------- LOADING SCREEN SCRIPT------- -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
			<script type="text/javascript" src="view/documents/main2.js"></script>

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
						<h2>MES DOCUMENTS</h2>
					</center>
				</div>

				<div id="seventhBloc" style="visibility: visible;">
					<center>
						<table class="zebra"> 
							</thead>
							<thead> 
								<tr> 
								    <th>Nom du fichier</th>
								    <th>Publié le</th> 
								    <th>Télécharger</th>
								    <th>Supprimer</th>
								    <th>Partager avec</th>
								</tr> 
							</thead> 
							<tbody> 
								<?php
								/* ----------------------------- DOCUMENTS PUBLISHED BY CLIENT ITSELF (CAN BE MODIFIED AND SHARE BY THEMSELVES) ------------------------------ */
									while ($rows = $myDocuments -> fetch())
									{
								?>
										<tr> 
										    <td><i class="fa-solid fa-file"></i> <a style="text-decoration: none; color: black; font-weight: 800;" target="_blank" href="<?= $rows['paths'] ?>"><?= $rows['documentName'] ?></a></td>  
										    <td><?= $rows['publishedOn'] ?></td>
										    <td><a style="color: blue; text-decoration: none;" href="<?= $rows['paths'] ?>" download><i class="fa-solid fa-file-arrow-down"></i></a></td>
										    <td><a style="color:blue; text-decoration: none;"  href="index.php?action=deleteThisClientDocument&id=<?= $rows['id'] ?>&paths=<?= $rows['paths'] ?>">Supprimer</a></td>
										    <td>
										    	<?php
											    	$getAllMyConnectionsForSharing = $userManager -> getAllMyConnectionsForSharing($userId);
													while($myPraticiens = $getAllMyConnectionsForSharing -> fetch())
													{
														$praticienId = $myPraticiens['praticienId'];
														

														$getPraticienNameThroughIdFromSharing = $userManager -> getPraticienNameThroughIdFromSharing($praticienId);
														while($praticienDetails = $getPraticienNameThroughIdFromSharing -> fetch())
														{

													?>
															<?php
													    		$i = 0;
													    	?>
															<form method="POST" action="index.php?action=sayWhomToShare">
												      			<b><?= strtoupper(base64_decode($praticienDetails['lastname'])) . " " . ucwords(base64_decode($praticienDetails['firstname'])) ?></b>
												      			<br>
												      			<label for="oui">Oui</label>
																<input type="radio" id="" name="<?= $i ?>" value="<?= $praticienDetails['id'].'_yes'?>"
																<?php
																	$checkIfthisDocumentIsAlreadyShared = $userManager -> checkIfthisDocumentIsAlreadyShared($rows['id'], $userId, $praticienDetails['id']);
																	$checkingResult = $checkIfthisDocumentIsAlreadyShared -> rowCount();
																	if ($checkingResult > 0) 
																	{
																?>
																		 checked>
																<?php
																	}

																	else
																	{
																?>
																		>

																<?php
																	}
																?>
																<label for="non">Non</label>
																<input type="radio" id="" name="<?= $i ?>" value="<?= $praticienDetails['id'].'_no'?>"
																<?php
																	$checkIfthisDocumentIsAlreadyShared = $userManager -> checkIfthisDocumentIsAlreadyShared($rows['id'], $userId, $praticienDetails['id']);
																	$checkingResult = $checkIfthisDocumentIsAlreadyShared -> rowCount();
																	if ($checkingResult == 0) 
																	{
																?>
																		 checked>
																<?php
																	}

																	else
																	{
																?>
																		>

																<?php
																	}
																?>
																

																<?php $i = $i+1; ?>
																<input style="display:none" type="text" name="numbers" value="<?= $i ?>">
																<input style="display:none" type="text" name="documentId" value="<?= $rows['id'] ?>">
																<input id="documentAddingConfirmButton" type="submit" value="Valider" name="confirmed">
															</form>
													<?php
														}
													}
													?>
												</td>
											</tr>
											<!------ End Sharing document form ---->
								<?php
									}

									/* ------------- END DOCUMENTS PUBLISHED BY CLIENT ITSELF (CAN BE MODIFIED AND SHARE BY THEMSELVES) --------------- */

									/* -----------------NATUROSHEET PUBLISHED BY PRATICIENS (CAN NOT BE MODIFIED BY CLIENTS) -------------------------- */
									while ($rows2 = $myBilan -> fetch())
									{
										$docId = $rows2['id'];
										$sharedBilan = $userManager -> sharedBilan($userId, $docId);
										
										/* ------ removing specific character ----- */
											    $rows2['data'] = $rows2['data'];
												$rows2['data'] = substr_replace($rows2['data'],"",31, 1);
										/* ----- end removing specific character ----- */
									?>
										<tr>	
											<td><i class="fa-solid fa-file"></i> <b onclick="debugBase64('<?= $rows2['data'] ?>')"><?= $rows2['bilanName'] ?></b></td>
											<td><b><?= $rows2['publishedOn'] ?></b></td>
											<td><a href="<?= $rows2['data']?>" download><i class="fa-solid fa-download"></i></a></td>  
											<td><b>Indisponible</b></td>
											<td><b id="shareButton" style="color: black;"> Droit Indisponible</b></td>
										</tr>
									<?php

										while($rows3 = $sharedBilan -> fetch())
										{
											$shareTo = $rows3['shareTo'];

											$getPraticienNameThroughIdFromSharing = $userManager -> getPraticienNameThroughIdFromSharing($shareTo);
											while ($rows4 = $getPraticienNameThroughIdFromSharing -> fetch()) 
											{
												/* ------ removing specific character ----- */
											    	$rows2['data'] = $rows2['data'];
													$rows2['data'] = substr_replace($rows2['data'],"",31, 1);
												/* ----- end removing specific character ----- */
									?>

											<tr> 
											    <td><i class="fa-solid fa-file"></i> <b onclick="debugBase64('<?= $rows2['data'] ?>')">Test</b></td>  
											    <td><?= $rows2['publishedOn'] ?></td>
											    <td><a href="<?= $rows2['data'] ?>" download=""><i class="fa-solid fa-file-arrow-down"></i></a></td>
											    <td><b>Indisponible</b></td>
											    <td><b id="shareButton"><i class="fa fa-thin fa-share-nodes"></i></b></td>
											</tr><br>

												<!-- -------------Sharing document form -------------->
												
												<div id="myModal2" class="modal">
												  <div class="modal-content">
												    <div class="modal-header">
												      <span id="closing2" class="close">&times;</span>
												      <h2>Partager votre document</h2>
												    </div>
												    <div class="modal-body">
												      <h3>Veuillez choisir les praticiens avec qui vous souhaitez partager ce document</h3>
												    </div>
												    <form method="POST" action="index.php?action=uploadThisDocument" class="modal-footer" enctype="multipart/form-data">
												      <center id="deletingConfirmationButtonsParam">
												      	<b>Partagé Avec :</b>
												      		<input type='checkbox' value='' checked>
												      	<br><br><br>
												      	<input id="documentAddingConfirmButton" type="submit" value="Partager" name="confirmed">
												      	<input id="documentCalcelConfirmButton" type="submit" value="Annuler" name="denied">
												      </center>
												    </form>
												  </div>
												</div>
												<!-- -------- End sharing document form ------------->			
								<?php
											}
										}
									}
										/* ---------------------- END NATUROSHEET PUBLISHED BY PRATICIENS (CAN NOT BE MODIFIED BY CLIENTS) ------------ */

										/* --------------------------- DOCUMENTS PUBLISHED BY PRATICIENS (CAN NOT BE MODIFIED BY CLIENT) ---------- */
										$getAllOthersDocuments = $userManager -> getAllOthersDocuments($userId);
										while($others = $getAllOthersDocuments -> fetch())
										{
								?>
											<tr>
											<td><i class="fa-solid fa-file"></i> <b onclick="debugBase64('<?php echo '../praticien/' . $others['paths'] ?>')"><?= $others['documentName'] ?></b></td>
											<td><b><?= $others['publishedOn'] ?></b></td>
											<td><a href="<?php echo '../praticien/'.$others['paths']?>" download><i class="fa-solid fa-download"></i></a></td>  
											<td><b>Indisponible</b></td>
											<td><b style="color: black;">Droit Indisponible</b></td>
											</tr>
								<?php
										}
										/* --------------------------- END DOCUMENTS PUBLISHED BY PRATICIENS (NOT MODIFIED BY CLIENT) ------------------ */
								
										while ($rows5 = $myBilan2 -> fetch())
										{
											//$docId = $rows5['id'];
											//$sharedBilan = $userManager -> sharedBilan($userId, $docId);
											
											/* ------ removing specific character ----- */
												    $rows5['data'] = $rows5['data'];
													$rows5['data'] = substr_replace($rows5['data'],"",31, 1);
											/* ----- end removing specific character ----- */
								?>	
											<tr>
												<td><i class="fa-solid fa-file"></i> <b onclick="debugBase64('<?= $rows5['data'] ?>')"><?= $rows5['bilanName'] ?></b></td>
												<td><b><?= $rows5['publishedOn'] ?></b></td>
												<td><a href="<?= $rows5['data']?>" download><i class="fa-solid fa-download"></i></a></td>  
												<td><b>Droit Indisponible</b></td>
												<td><b id="shareButton" style="color: black;"> Indisponible</b></td>
											</tr>
								<?php
										}

										while ($rows6 = $myBilan3 -> fetch())
										{
											//$docId = $rows5['id'];
											//$sharedBilan = $userManager -> sharedBilan($userId, $docId);
											
											/* ------ removing specific character ----- */
												    $rows6['dnsTest'] = $rows6['dnsTest'];
													$rows6['dnsTest'] = substr_replace($rows6['dnsTest'],"",31, 1);
											/* ----- end removing specific character ----- */
								?>	
											<tr>
												<td><i class="fa-solid fa-file"></i> <b onclick="debugBase64('<?= $rows6['dnsTest'] ?>')"><?= $rows6['testName'] ?></b></td>
												<td><b><?= $rows6['date'] ?></b></td>
												<td><a href="<?= $rows6['dnsTest']?>" download><i class="fa-solid fa-download"></i></a></td>  
												<td><b>Droit Indisponible</b></td>
												<td><b id="shareButton" style="color: black;"> Droit Indisponible</b></td>
											</tr>
								<?php
										}

										while ($rows7 = $myBilan4 -> fetch())
										{
											//$docId = $rows5['id'];
											//$sharedBilan = $userManager -> sharedBilan($userId, $docId);
											
											/* ------ removing specific character ----- */
												    $rows7['gdsTest'] = $rows7['gdsTest'];
													$rows7['gdsTest'] = substr_replace($rows7['gdsTest'],"",31, 1);
											/* ----- end removing specific character ----- */
								?>	
											<tr>
												<td><i class="fa-solid fa-file"></i> <b onclick="debugBase64('<?= $rows7['gdsTest'] ?>')"><?= $rows7['testName'] ?></b></td>
												<td><b><?= $rows7['date'] ?></b></td>
												<td><a href="<?= $rows7['gdsTest']?>" download><i class="fa-solid fa-download"></i></a></td>  
												<td><b>Indisponible</b></td>
												<td><b id="shareButton" style="color: black;">Droit Indisponible</b></td>
											</tr>
								<?php
										}

										while ($rows8 = $myBilan5 -> fetch())
										{
											//$docId = $rows5['id'];
											//$sharedBilan = $userManager -> sharedBilan($userId, $docId);
											
											/* ------ removing specific character ----- */
												    $rows8['gdseTest'] = $rows8['gdseTest'];
													$rows8['gdseTest'] = substr_replace($rows8['gdseTest'],"",31, 1);
											/* ----- end removing specific character ----- */
								?>	
											<tr>
												<td><i class="fa-solid fa-file"></i> <b onclick="debugBase64('<?= $rows8['gdseTest'] ?>')"><?= $rows8['testName'] ?></b></td>
												<td><b><?= $rows8['date'] ?></b></td>
												<td><a href="<?= $rows8['gdseTest']?>" download><i class="fa-solid fa-download"></i></a></td>  
												<td><b>Indisponible</b></td>
												<td><b id="shareButton" style="color: black;">Droit Indisponible</b></td>
											</tr>
								<?php
										}

										while ($rows9 = $myBilan6 -> fetch())
										{
											//$docId = $rows5['id'];
											//$sharedBilan = $userManager -> sharedBilan($userId, $docId);
											
											/* ------ removing specific character ----- */
												    $rows9['data'] = $rows9['data'];
													$rows9['data'] = substr_replace($rows9['data'],"",31, 1);
											/* ----- end removing specific character ----- */
								?>	
											<tr>
												<td><i class="fa-solid fa-file"></i> <b onclick="debugBase64('<?= $rows9['data'] ?>')"><?= $rows9['phvName'] ?></b></td>
												<td><b><?= $rows9['publishedOn'] ?></b></td>
												<td><a href="<?= $rows9['data']?>" download><i class="fa-solid fa-download"></i></a></td>  
												<td><b>Indisponible</b></td>
												<td><b id="shareButton" style="color: black;">Droit Indisponible</b></td>
											</tr>
								<?php
										}

								?>
							</tbody> 
						</table> 
						<!-- ---------------------------------------- ADDING DOCUMENT FORM ------------------->
						<br>
						<div id="myModal" class="modal">
						  <div class="modal-content">
						    <div class="modal-header">
						      <span id="closing1" class="close">&times;</span>
						      <h2>Ajouter un document</h2>
						    </div>
						    <div class="modal-body">
						      <h3>Veuillez choisir votre document pour ajouter</h3>
						    </div>
						    <form method="POST" action="index.php?action=uploadThisDocument" class="modal-footer" enctype="multipart/form-data">
						      <center id="deletingConfirmationButtonsParam">
						      	<input type="file" name="documentInputData">
						      	<br><br><br>
						      	<b id="documentAddingConfirmFalseButton" onclick="showConditions()" style="font-family:segoe UI Light;">Télécharger</b>
						      	<br><br>
						      	<div id="conditionBloc">
						      		<div id="conditions">
						      			<p style="max-width: 60%;">
						      				Vous souhaitez télécharger un document à destination d'un professionnel de cette plateforme.Si votre document contient des données de santé (ex: ordonnance) vous comprenez que tous les praticiens ne sont pas forcement aptes à lire et interpréter ces données généralement destinées aux professionnels de santé - renseignez vous avant de télécharger.<br>Votre document sera stocké sur notre serveur spécialisé. Conformément à RGPD, vous avez accès à ce document pour le supprimer à tous moments.<br><br> En stockant votre document sur notre serveur à destination d'un professionnel de cette plateforme, vous consentez de façon éclairée aux recueils des dites données. Vous pouvez visiter notre page sur le consentement éclairé en cliquant ici
										<br><br><br></p>
						      		</div>
						      		<input id="documentAddingConfirmButton" type="submit" value="je consens" name="confirmed">
						      		<input id="documentCalcelConfirmButton" type="submit" value="Annuler" name="denied">
						      	</div>
						      </center>
						    </form>
						  </div>
						</div>
						<!-- -------------------------------------- END ADDING DOCUMENT FORM --------------------------->
						<button id="addADocumentButton">Ajouter un document</button>
					</center>
				</div>
			</div>
			<script type="text/javascript" src="view/documents/main.js"></script>
		</body>
	</html>

<?php
	}

	else
	{
		header("location:index.php");
	}


?>