<?php
require('model/Manager/userManager.php');


	class controls_Admin
	{

		function createAccount($sexe, $firstname, $lastname, $email, $phoneNumber, $username, $password, $retypedPassword, $dob)
		{
			if ($password == $retypedPassword) 
			{
				$userManager = new userManager();
				$userManager -> createAccount($sexe, $firstname, $lastname, $email, $phoneNumber, $username, $password, $dob);

				session_start();
				$_SESSION['createAccountStatus'] = "created" ;
				
				include_once('view/createdAccount/createdAccountConfirmationMail/createdAccountConfirmationMail.php');	
				header("location:view/createdAccount/createdAccount.php");
			}

			else
			{
				$userManager = new userManager();

				$userManager -> missmatchedPassword();
			}
		}

		function login($username, $password)
		{
			$userManager = new userManager();
			$userManager -> login($username, $password);
		}

		function dashboard()
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}
			$userId = $_SESSION['userId'];

			$userManager = new userManager();
			$showMyPraticiensId = $userManager -> showMyPraticiensIdForDashboard($userId);
			$numberOfResults = $showMyPraticiensId -> rowCount();
	
			include_once('view/dashboard/dashboard.php');
		}

		function checkEmailAndPasswordForRecovery($email, $dateOfBirth, $code)
		{
			session_start();
			$_SESSION['recoveryEmail'] = $email;
			$_SESSION['recoveryCode'] = $code;
			$userManager = new userManager();
			$userManager -> checkEmailAndPasswordForRecovery($email, $dateOfBirth, $code);
			header('location:view/codeVerification/codeVerification.php');
			
		}


		function checkInsertedCode($recoveryEmail, $code)
		{
			$userManager = new userManager();
			$userManager -> checkInsertedCode($recoveryEmail, $code);
			
		}

		function resetPassword($recoveryEmail, $password,$retypedPassword)
		{
			if ($password == $retypedPassword) 
			{
				$userManager = new userManager();
				$userManager -> resetPassword($recoveryEmail, $password,$retypedPassword);
				header("location:index.php");
			}
			
			else 
			{
				echo "password didnt match";
			}			
		}

		function settings()
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
    			session_start();
			}

			if ($_SESSION['sessionStatus'] == "online" ) 
			{
				header("location: view/settings/settings.php");
			}

			else
			{
				header("location:index.php");
			}
		}

		function updateAccount($userId, $firstname, $lastname, $username, $email, $dob, $password, $retypedPassword)
		{
			if ($password == $retypedPassword) 
			{
				$firstname = base64_encode($firstname);
				$lastname = base64_encode($lastname);
				$username = base64_encode($username);
				$email = base64_encode($email);
				$password = base64_encode($password);

				$userManager = new userManager();
				$userManager -> updateAccount($userId, $firstname, $lastname, $username, $email, $dob, $password);
				header('location: index.php?action=logout');
			}

			else
			{
				header('location: view/settings/unmatchedPasswordsettings.php');
			}
		}


		function deleteThisPatientAccount()
		{
			$userManager = new userManager();
			$deleteThisPatientAccount = $userManager -> deleteThisPatientAccount($patientId);
			header('location: index.php?action=logout');
		}

		function aboutUs()
		{
			header('location: view/aboutUs/aboutUs.php');
			
		}


		function logout()
		{
			$userManager = new userManager();
			$userManager -> logout();
		}

		function forgetPassword()
		{
			$userManager = new userManager();
			$userManager -> forgetPassword();
		}

		function createAccountLink()
		{
			$userManager = new userManager();
			$userManager -> createAccountLink();
		}

		function forgetIdentification()
		{
			$userManager = new userManager();
			$userManager -> forgetIdentification();
		}

		function goBack()
		{
			$userManager = new userManager();
			$userManager -> goBack();
		}

		function accueil()
		{
			header("location: index.php?action=dashboard");
		}

		function takeAnAppointment()
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}
			$userId = $_SESSION['userId'];
			$userManager = new userManager();
			
			$showMyPraticiensId = $userManager -> showMyPraticiensId($userId);

			$numberOfResults = $showMyPraticiensId -> rowCount();
			
			include_once("view/takeAnAppointment/takeAnAppointment.php");
		}

		function showPraticienAvailabilityForAppointment()
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}
			$userId = $_SESSION['userId'];
			$userManager = new userManager();
			
			//$getPraticienIdByName = $userManager -> getPraticienId($userId, $praticienId);
			
			include_once("view/availabilityCalendar/availabilityCalendar.php");
		}

		function agenda()
		{
			header("location: view/agenda/agenda.php");
		}

		function gotoMails()
		{
			header("location: view/mails/mails.php");
		}

		function sendThisMail($sendFrom, $sendTo, $mailSubject, $message, $mailStatus)
		{
			if (session_status() == PHP_SESSION_NONE) 
			{
				session_start();
			}
			
			$userManager = new userManager();
			$userManager -> sendThisMail($sendFrom, $sendTo, $mailSubject, $message, $mailStatus);
			
			header("location: view/mails/mails.php");	
		}

		function cancel()
		{
			header("location: view/mails/mails.php");
		}

		function deleteThisSelectedMail($id)
		{
			$userManager = new userManager();
			$userManager -> deleteThisSelectedMail($id);
			header("location: view/mails/mails.php");
		}

		function addAClient()
		{
			header("location: view/addAClient/addAClient.php");	
		}

		function addThisClient($clientSexe, $clientFirstName, $clientLastName, $clientDateOfBirth, $clientEmail, $clientPhoneNumber, $clientRoadNumber, $clientRoadName, $clientAddressAlternate, $clientPostalCode, $clientCity)
		{
			$userManager = new userManager();
			$userManager -> addThisClient($clientSexe, $clientFirstName, $clientLastName, $clientDateOfBirth, $clientEmail, $clientPhoneNumber, $clientRoadNumber, $clientRoadName, $clientAddressAlternate, $clientPostalCode, $clientCity);
			header("location: index.php?action=showClientsList");
		}

		function showPraticiensList()
		{
			$userManager = new userManager();
			$showPraticiensList = $userManager -> showPraticiensList();
			
			include_once('view/praticiens/praticiens.php');
		}

		function myDocuments($userId)
		{
			
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}
			$userId = $_SESSION['userId'];
			
			$userManager = new userManager();
			$myDocuments = $userManager -> myDocuments($userId);

			//$getAllMyConnectionsForSharing = $userManager -> getAllMyConnectionsForSharing($userId);

			$myBilan = $userManager -> myBilan($userId);
			$myBilan2 = $userManager -> myBilan2($userId);
			$myBilan3 = $userManager -> myBilan3($userId);
			$myBilan4 = $userManager -> myBilan4($userId);
			$myBilan5 = $userManager -> myBilan5($userId);
			$myBilan6 = $userManager -> myBilan6($userId);

			//$getAllOthersDocuments = $userManager -> getAllOthersDocuments($userId);
			include_once('view/documents/documents.php');
			
			/* ----------------- END ORIGINAL COPY -------------- */
		}

		function uploadThisDocument($userId, $fileName, $fullPath)
		{
			$userManager = new userManager();

			$uploadThisDocument = $userManager -> uploadThisDocument($userId, $fileName, $fullPath);
			$numberOfResults = $uploadThisDocument -> rowCount();
			
			header('location:index.php?action=myDocuments');
		}

		function deleteThisClientDocument($documentId, $paths)
		{
			$userManager = new userManager();
			$deleteThisClientDocument = $userManager -> deleteThisClientDocument($documentId);
			unlink($paths);
			
			$deleteDocumentLinkFromSharing = $userManager -> deleteDocumentLinkFromSharing($documentId);
			header('location:index.php?action=myDocuments');
		}

		function sayWhomToShare($userId, $praticienToShareId, $documentId)
		{
			
			$userManager = new userManager();
			
			$getPraticienDetailsForSharingNotification = $userManager -> getPraticienDetailsForSharingNotification($praticienToShareId);

			while($rows = $getPraticienDetailsForSharingNotification -> fetch())
			{
				$praticienName = base64_decode($rows['firstname']) . " " . base64_decode($rows['lastname']);
				$praticienEmail = $rows['email'];
			}

			
			include_once('controller/notificationMail/sharingDocumentNotificationMail.php');

			$sayWhomToShare = $userManager -> sayWhomToShare($userId, $praticienToShareId, $documentId);
				
			$readStatus = 0;
			$userId = $_SESSION['userId'];
			$userFirstName = ucwords(base64_decode($_SESSION['firstName']));
			$userLastName = strtoupper(base64_decode($_SESSION['lastName']));
			$notificationSenderName = $userFirstName . " " . $userLastName;
			$notificationFor = "praticien";

			$notificationMessage = $userFirstName . " " . $userLastName . " vient de partager un document avec vous";
			echo $notificationMessage;
			$nowSendMyPraticienANotification = $userManager -> nowSendMyPraticienANotification($userId, $praticienToShareId, $notificationSenderName, $notificationFor, $notificationMessage, $readStatus);
			header("location:index.php?action=myDocuments");
		}

		function sayWhomToNotShare($userId, $praticienToShareId, $documentId)
		{
			
			$userManager = new userManager();
			$sayWhomToShare = $userManager -> sayWhomToNotShare($userId, $praticienToShareId, $documentId);
			header("location:index.php?action=myDocuments");
		}

		function showMyPraticiens($userId)
		{
			$userManager = new userManager();
			$showMyPraticiensId = $userManager -> showMyPraticiensId($userId);

			$numberOfResults = $showMyPraticiensId -> rowCount();

			include_once('view/showMyPraticiens/showMyPraticiens.php');
		}

		function showPraticienQuestionSheet($userId)
		{
			$userManager = new userManager();
			$showPraticienQuestionSheet = $userManager -> showPraticienQuestionSheet($userId);

			$numberOfResults = $showPraticienQuestionSheet -> rowCount();
			
			include_once('view/showPraticienQuestionSheet/showPraticienQuestionSheet.php');
		}

		function startThisQuestionSheet()
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}
			
			$questionSheetId = $_SESSION['questionSheetId'];
			
			$userManager = new userManager();
			$startThisQuestionSheet = $userManager -> startThisQuestionSheet($questionSheetId);

			$numberOfResults = $startThisQuestionSheet -> rowCount();

			while ($rows = $startThisQuestionSheet -> fetch()) 
			{
				$bloc1 = $rows['bloc1'];
				$bloc2 = $rows['bloc2'];
				$bloc3 = $rows['bloc3'];
				$bloc4 = $rows['bloc4'];
				$bloc5 = $rows['bloc5'];
				$bloc6 = $rows['bloc6'];
				$bloc7 = $rows['bloc7'];
				$bloc8 = $rows['bloc8'];
				$bloc9 = $rows['bloc9'];
				$bloc10 = $rows['bloc10'];
				$bloc11 = $rows['bloc11'];
				$bloc12 = $rows['bloc12'];
			}
			include_once('view/startThisQuestionSheet/startThisQuestionSheet.php');
		}

		function setQuestionSheetIdAtFirst($questionSheetId)
		{
			$userManager = new userManager();
			$setQuestionSheetIdAtFirst = $userManager -> setQuestionSheetIdAtFirst($questionSheetId);
			return $setQuestionSheetIdAtFirst; 
		}

		function saveThisQuestionSheetAnswerToDatabase($questionSheetId, $columnName, $answer)
		{
			$userManager = new userManager();
			$saveThisQuestionSheetAnswerToDatabase = $userManager -> saveThisQuestionSheetAnswerToDatabase($questionSheetId, $columnName, $answer);
		}

		function updateBilanNaturoTwoQuestionBlocStatus($questionSheetId, $status)
		{
			$userManager = new userManager();
			$updateBilanNaturoTwoQuestionBlocStatus = $userManager -> updateBilanNaturoTwoQuestionBlocStatus($questionSheetId, $status);
		}

		function chooseThisPraticienForMe($clientId, $praticienId)
		{
			$userManager = new userManager();
			$chooseThisPraticienForMe = $userManager -> chooseThisPraticienForMe($clientId, $praticienId);

			header('location:index.php?action=showMyPraticiens');
		}	

		function deleteThisPraticienForMe($id)
		{
			$userManager = new userManager();
			$deleteThisPraticienForMe = $userManager -> deleteThisPraticienForMe($id);

			header('location:index.php?action=showMyPraticiens');
		}	

		function viewMoreOfThisPraticien($id)
		{
			$userManager = new userManager();
			$getPraticienIdFromMyPraticienList = $userManager -> getPraticienIdFromMyPraticienList($id);

			$numberOfResult = $getPraticienIdFromMyPraticienList -> rowCount();
			
			while ($rows = $getPraticienIdFromMyPraticienList -> fetch()) 
			{
				$praticienId = $rows['praticienId'];
				$viewMoreOfThisPraticien = $userManager -> viewMoreOfThisPraticien($praticienId);		
			}
			
			include_once('view/showSelectedPraticienDetails/showSelectedPraticienDetails.php');
		}	

		function getClientDetails($id)
		{
			$userManager = new userManager();
			$getClientsDetails = $userManager -> getClientDetails($id);
			include_once("view/clientFolder/clientFolder.php");
		}

		function modifyClientDetails($id)
		{
			$userManager = new userManager();
			$modifyClientDetails = $userManager -> modifyClientDetails($id);
			include_once("view/modifyClientDetails/modifyClientDetails.php");
		}

		function modifyClientDetailsAsThis($id, $clientFirstName, $clientLastName, $clientDateOfBirth, $clientEmail, $clientPhoneNumber, $clientRoadNumber, $clientRoadName, $clientPostalCode, $clientCity)
		{
			$userManager = new userManager();
			$modifyClientDetailsAsThis = $userManager -> modifyClientDetailsAsThis($id, $clientFirstName, $clientLastName, $clientDateOfBirth, $clientEmail, $clientPhoneNumber, $clientRoadNumber, $clientRoadName, $clientPostalCode, $clientCity);
			header("location: index.php?action=getClientDetails&id=". $id);
		}

		function deleteThisClientFolder($id)
		{
			$userManager = new userManager();
			$deleteThisClientFolder = $userManager -> deleteThisClientFolder($id);
			header("location: index.php?action=showClientsList");
		}

		function clear($userId)
		{
			$userManager = new userManager();
			$userManager -> clear($userId);
		}

		function completeMyAccountCreation($codedKey)
		{
			$userManager = new userManager();
			
			$retreiveVerificationStatus = $userManager -> retreiveVerificationStatus($codedKey);

			while($status = $retreiveVerificationStatus -> fetch())
			{

				if ($status['userVerification'] == "unverified" && $status['verificationKey'] !== null) 
				{
					$retreiveAllDataToCreateMyAccount = $userManager -> retreiveAllDataToCreateMyAccount($codedKey);
					include_once('view/completeMyAccountCreation/completeMyAccountCreation.php');
				}

				else
				{
					echo "Votre compte a déja été validé !" . "<br>";
					echo "Vous pouvez maintenant <a href='https://adnr-consults.eu/consults/client'>connecter à votre compte</a>";
				}
			}
			
		}

		function accountCreationCompletedByClient($userId, $firstname, $lastname, $username, $email, $phoneNumber, $dob, $password, $retypedPassword)
		{
			if ($password == $retypedPassword) 
			{
				$firstname = base64_encode($firstname);
				$lastname = base64_encode($lastname);
				$username = base64_encode($username);
				$email = base64_encode($email);
				$phoneNumber = base64_encode($phoneNumber);
				$password = base64_encode($password);

				$userManager = new userManager();
				$userManager -> accountCreationCompletedByClient($userId, $firstname, $lastname, $username, $email, $phoneNumber, $dob, $password);
				
				include_once("accountCreationCompletedMail/accountCreationCompletedMail.php");

				header('location: index.php');
			}

			else
			{
				header('location: index.php?action=unmatchedPasswordToCompleteAccountCreateByClient');
			}
		}

		function recompleteMyAccountCreation($codedKey)
		{
			$userManager = new userManager();
			
			$retreiveVerificationStatus = $userManager -> retreiveVerificationStatus($codedKey);

			while($status = $retreiveVerificationStatus -> fetch())
			{

				if ($status['userVerification'] == "unverified" && $status['verificationKey'] !== null) 
				{
					$retreiveAllDataToCreateMyAccount = $userManager -> retreiveAllDataToCreateMyAccount($codedKey);
					include_once('view/completeMyAccountCreation/recompleteMyAccountCreation.php');
				}

				else
				{
					echo "Votre compte a déja été validé !" . "<br>";
					echo "Vous pouvez maintenant <a href='https://adnr-consults.eu/consults/client'>connecter à votre compte</a>";
				}
			}
			
		}
	}