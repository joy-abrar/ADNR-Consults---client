<?php

	require('controller/controller_admin.php');


	if (isset($_GET['action'])) 
	{
		if ($_GET['action'] == "createAccount") 
		{
			$sexe = $_POST['sexe'];
			$firstname = base64_encode(ucfirst($_POST['firstname']));
			$lastname = base64_encode(ucfirst($_POST['lastname']));
			$email = base64_encode($_POST['mail']) ;
			$phoneNumber = base64_encode($_POST['phoneNumber']) ;
			$username = base64_encode($_POST['username']);
			$password = base64_encode($_POST['password']);
			$retypedPassword = base64_encode($_POST['retypedPassword']);
			$dob = $_POST['dateOfBirth'];

			$controls_admin = new Controls_Admin();
			$controls_admin -> createAccount($sexe, $firstname, $lastname, $email, $phoneNumber, $username, $password, $retypedPassword, $dob);
		}


		if ($_GET['action'] == "login") 
		{
			$username = base64_encode($_POST['username']);
			$password = base64_encode($_POST['password']);
			$controls_admin = new controls_Admin();
			$controls_admin -> login($username, $password);
		}

		if ($_GET['action'] == "dashboard") 
		{
			$controls_admin = new controls_Admin();
			$controls_admin -> dashboard();
		}

		if ($_GET['action'] == "checkEmailAndPasswordForRecovery") 
		{
			$code = rand("1000", "9999");
			$email = base64_encode($_POST['email']);
			$dateOfBirth = $_POST['dateOfBirth'];
			
			/*
			echo $dateOfBirth . "<br>";
			$yyyy = substr($dateOfBirth,0,4);
			$mm = substr($dateOfBirth,5,2);
			$dd = substr($dateOfBirth,8,2);
			$convertedDate = $yyyy."-".$mm."-".$dd;
			echo $convertedDate;
			*/
			if ($email && $dateOfBirth != null) 
			{
				$controls_admin = new controls_Admin();
				$controls_admin -> checkEmailAndPasswordForRecovery($email, $dateOfBirth, $code);		
			}

			else
			{
				
			}
		}

		if ($_GET['action'] == "checkInsertedCode") 
		{
			session_start();
			$recoveryEmail = $_SESSION['recoveryEmail'];
			$code = $_POST['code'];
			$controls_admin = new controls_Admin();
			$controls_admin -> checkInsertedCode($recoveryEmail, $code);
		}


		if ($_GET['action'] == "resetPassword") 
		{
			$password = base64_encode($_POST['password']);
			$retypedPassword = base64_encode($_POST['retypedPassword']);
			session_start();
			$recoveryEmail = $_SESSION['recoveryEmail'];

			$controls_admin = new controls_Admin();
			$controls_admin -> resetPassword($recoveryEmail, $password,$retypedPassword);
		}


		if ($_GET['action'] == "wrongPassword") 
		{
			header("location: view/wrongPassword/wrongPassword.php");		
		}

		if ($_GET['action'] == "settings") 
		{
			$controls_admin = new Controls_Admin();
			$controls_admin -> settings();
		}

		if ($_GET['action'] == "updateAccount") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}
			
			$userId = $_SESSION['userId'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$dob = $_POST['dob'];
			$password = $_POST['password'];
			$retypedPassword = $_POST['retypedPassword'];
			$controls_admin = new Controls_Admin();
			$controls_admin -> updateAccount($userId, $firstname, $lastname, $username, $email, $dob, $password, $retypedPassword);
		}

		if ($_GET['action'] == "deleteThisPatientAccount") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}

			if (isset($_POST['confirmed'])) 
			{
				$controls_admin = new Controls_Admin();
				$controls_admin -> deleteThisPatientAccount();
			}

			if (isset($_POST['denied'])) 
			{
				$controls_admin = new Controls_Admin();
			$controls_admin -> dashboard();
			}
		}

		if ($_GET['action'] == "aboutUs")
		{

			$controls_admin = new Controls_Admin();
			$controls_admin -> aboutUs();
		}


		if ($_GET['action'] == "logout")
		{

			$controls_admin = new Controls_Admin();
			$controls_admin -> logout();
		}

		if ($_GET['action'] == "forgetPassword") 
		{
			$controls_admin = new Controls_Admin();
			$controls_admin -> forgetPassword();
		}

		if ($_GET['action'] == "forgetIdentification") 
		{
			$controls_admin = new Controls_Admin();
			$controls_admin -> forgetIdentification();
		}

		if ($_GET['action'] == "goBack") 
		{
			$controls_admin = new Controls_Admin();
			$controls_admin -> goBack();
		}

		if ($_GET['action'] == "createAccountLink") 
		{
			$controls_admin = new Controls_Admin();
			$controls_admin -> createAccountLink();	
		}

		if ($_GET['action'] == "accueil") 
		{
			$controls_admin = new Controls_Admin();
			$controls_admin -> accueil();	
		}

		if ($_GET['action'] == "takeAnAppointment") 
		{
			$controls_admin = new Controls_Admin();
			$controls_admin -> takeAnAppointment();	
		}

		if ($_GET['action'] == "showPraticienAvailabilityForAppointment") 
		{

			if (isset($_POST['seeThisPraticienCalendar'])) 
			{
				if (session_status() === PHP_SESSION_NONE) 
				{
					session_start();
				}
				$_SESSION['userId'] = $_SESSION['userId'];
				$_SESSION['praticienId'] = $_POST['praticienId'];
			}

			$controls_admin = new Controls_Admin();
			$controls_admin -> showPraticienAvailabilityForAppointment();	

		}

		if ($_GET['action'] == "agenda") 
		{
			$controls_admin = new Controls_Admin();
			$controls_admin -> agenda();
		}

		if ($_GET['action'] == "gotoMails")
		{
			$controls_admin = new Controls_Admin();
			$controls_admin -> gotoMails();
		}

		if ($_GET['action'] == "sendThisMail") 
		{
			if (isset($_POST['envoyer'])) 
			{
				if (session_status() === PHP_SESSION_NONE) 
				{
					session_start();
				}

				$sendFrom = $_SESSION['userName'];
				$sendTo = base64_encode(htmlspecialchars($_POST['sendTo']));
				$mailSubject = base64_encode(htmlspecialchars($_POST['mailSubject']));
				$message = base64_encode(htmlspecialchars($_POST['message']));
				$mailStatus = "unread" ;

				$controls_admin = new Controls_Admin();
				$controls_admin -> sendThisMail($sendFrom, $sendTo, $mailSubject, $message, $mailStatus);
			}

			if (isset($_POST['cancel'])) 
			{
				$controls_admin = new Controls_Admin();
				$controls_admin -> cancel();	
			}
		}


		if ($_GET['action'] == "deleteThisSelectedMail") 
		{
			$id = $_GET['id'];
			$controls_admin = new Controls_Admin();
			$controls_admin -> deleteThisSelectedMail($id);
		}

		if ($_GET['action'] == "addAClient") 
		{
		  	$controls_admin = new Controls_Admin();
			$controls_admin -> addAClient();
		}

		 if ($_GET['action'] ==  "addThisClient") 
		{

		 	$clientSexe = $_POST['clientSexe'];
		 	if ($clientSexe == "man") 
		 	{
		 		$clientSexe = base64_encode("homme");
		 	}

		 	if ($clientSexe == "woman") 
		 	{
		 		$clientSexe = base64_encode("femme");
		 	}

		 	if ($clientSexe == "child") 
		 	{
		 		$clientSexe = base64_encode("enfant");
		 	}

		 	$clientFirstName = base64_encode(ucwords($_POST['clientFirstName']));
		 	$clientLastName = base64_encode(strtoupper($_POST['clientLastName']));
		 	$clientDateOfBirth = $_POST['clientDateOfBirth'];
		 	$clientEmail = base64_encode( $_POST['clientEmail']);
		 	$clientPhoneNumber = base64_encode($_POST['clientPhoneNumber']);
		 	$clientRoadNumber = base64_encode( $_POST['clientRoadNumber']);
		 	$clientRoadName = base64_encode( ucwords($_POST['clientRoadName']));
		 	$clientAddressAlternate = base64_encode( ucwords($_POST['clientAddressAlternate']));
		 	$clientPostalCode = base64_encode( $_POST['clientPostalCode']);
		 	$clientCity = base64_encode( ucwords($_POST['clientCity']));
		
			$controls_admin = new Controls_Admin();
			$controls_admin -> addThisClient($clientSexe, $clientFirstName, $clientLastName, $clientDateOfBirth, $clientEmail, $clientPhoneNumber, $clientRoadNumber, $clientRoadName, $clientAddressAlternate, $clientPostalCode, $clientCity);
		}

		if ($_GET['action'] == "showPraticiensList") 
		{
			$controls_admin = new Controls_Admin();
			$controls_admin -> showPraticiensList();
		}

		if ($_GET['action'] == "myDocuments") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}
			$userId = $_SESSION['userId'];
			$controls_admin = new Controls_Admin();
			$controls_admin -> myDocuments($userId);
		}

		if ($_GET['action'] == "uploadThisDocument") 
		{
			if (isset($_POST['confirmed'])) 
			{
				if (session_status() === PHP_SESSION_NONE) 
				{
					session_start();
				}
				$userId = $_SESSION['userId'];
				$fileName = $_FILES['documentInputData']['name'];
				$fileLocation = $_FILES['documentInputData']['tmp_name'];
				$folder = "view/documents/documents/" . $userId ."/";
				
				if (!file_exists('view/documents/documents/'.$userId)) 
		      	{
		         	mkdir('view/documents/documents/'.$userId, 0777, true);
		      	}

		      	move_uploaded_file($fileLocation,$folder.$fileName);
		      	$fullPath = $folder.$fileName;
				$controls_admin = new Controls_Admin();
				$controls_admin -> uploadThisDocument($userId, $fileName, $fullPath);

			}

			if (isset($_POST['denied'])) 
			{
				if (session_status() === PHP_SESSION_NONE) 
				{
					session_start();
				}
				$userId = $_SESSION['userId'];
				$controls_admin = new Controls_Admin();
				$controls_admin -> myDocuments($userId);
			 	
			}
		}

		if ($_GET['action'] == "sayWhomToShare") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}
			$userId = $_SESSION['userId'];

			$totalNumbers = $_POST['numbers'];
			for ($i=0; $i < $totalNumbers ; $i++) 
			{ 	
				$yesValue = str_replace('_yes', '', $_POST[$i]);

				$noValue = str_replace('_no', '', $_POST[$i]);

				if ($_POST[$i] === $yesValue.'_yes') 
				{
					$praticienId = $yesValue;
			
					$praticienToShareId = $praticienId;
					$documentId = $_POST['documentId'];
					
					$controls_admin = new Controls_Admin();
					$controls_admin -> sayWhomToShare($userId, $praticienToShareId, $documentId);
				}
				
				else
				{

					$praticienId = $noValue;

					$praticienToShareId = $praticienId;
					$documentId = $_POST['documentId'];
					
					$controls_admin = new Controls_Admin();
					$controls_admin -> sayWhomToNotShare($userId, $praticienToShareId, $documentId);
				}

				//$_POST[$i];
				
			}			
		}

		if ($_GET['action'] == "deleteThisClientDocument") 
		{
			$documentId = $_GET['id'];
			$paths = $_GET['paths'];
			$controls_admin = new Controls_Admin();
			$controls_admin -> deleteThisClientDocument($documentId, $paths);	
		}

		if ($_GET['action'] == "showMyPraticiens") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}
			$userId= $_SESSION['userId'];

			$controls_admin = new Controls_Admin();
			$controls_admin -> showMyPraticiens($userId);
		}

		if ($_GET['action'] == "showPraticienQuestionSheet") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}
			$userId= $_SESSION['userId'];

			$controls_admin = new Controls_Admin();
			$controls_admin -> showPraticienQuestionSheet($userId);
		}

		if ($_GET['action'] == "startThisQuestionSheet") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}
			$userId= $_SESSION['userId'];
			$questionSheetId = $_GET['questionSheetId'];
			$_SESSION['questionSheetId'] = $questionSheetId;

			$controls_admin = new Controls_Admin();
			$controls_admin -> startThisQuestionSheet();
		}

		if ($_GET['action'] == "saveThisQuestionSheetAnswerToDatabase") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}
			$userId = $_SESSION['userId'];
			$questionSheetId = $_SESSION['questionSheetId'];

			
			$controls_admin = new Controls_Admin();
			$controls_admin -> setQuestionSheetIdAtFirst($questionSheetId);

			$answer = null;
			$columnName = null;
			for ($i=1; $i <318 ; $i++) 
			{ 

				if (isset($_POST['answer'.$i])) 
				{
					$columnName = "answer".$i;
					$answer = $_POST['answer'.$i];
					$controls_admin -> saveThisQuestionSheetAnswerToDatabase($questionSheetId, $columnName, $answer);	
				}

			}

			$status = "submittedByClient";
			$controls_admin -> updateBilanNaturoTwoQuestionBlocStatus($questionSheetId, $status);

			header("location: index.php?action=showPraticienQuestionSheet");
		}


		if ($_GET['action'] == "chooseThisPraticienForMe") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}
			$clientId = $_SESSION['userId'];
			$praticienId = $_GET['id'];

			$controls_admin = new Controls_Admin();
			$controls_admin -> chooseThisPraticienForMe($clientId, $praticienId);
		}

		if ($_GET['action'] == "deleteThisPraticienForMe") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}

			$id = $_GET['id'];
			
			$controls_admin = new Controls_Admin();
			$controls_admin -> deleteThisPraticienForMe($id);
		}

		if ($_GET['action'] == "viewMoreOfThisPraticien") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}

			$userId = $_SESSION['userId'];
			$id = $_GET['id'];
			$controls_admin = new Controls_Admin();
			$controls_admin -> viewMoreOfThisPraticien($id);
		}
		

		if ($_GET['action'] == "modifyClientDetails") 
		{
				$id = $_GET['id'];
				$controls_admin = new controls_Admin();
				$controls_admin -> modifyClientDetails($id);
		}

		if ($_GET['action'] == "modifyClientDetailsAsThis") 
		{
				$id = $_GET['id'];
				$clientFirstName = base64_encode(ucwords($_POST['clientFirstName']));
				$clientLastName = base64_encode(strtoupper($_POST['clientLastName']));
				$clientDateOfBirth = $_POST['clientDateOfBirth'];
				$clientEmail = base64_encode($_POST['clientEmail']);
				$clientPhoneNumber = base64_encode($_POST['clientPhoneNumber']);
				$clientRoadNumber = base64_encode($_POST['clientRoadNumber']);
				$clientRoadName =  base64_encode(ucwords($_POST['clientRoadName']));
				$clientAddressAlternate = base64_encode( ucwords($_POST['clientAddressAlternate']));
				$clientPostalCode = base64_encode($_POST['clientPostalCode']);
				$clientCity = base64_encode(ucwords($_POST['clientCity']));

				$controls_admin = new controls_Admin();
				$controls_admin -> modifyClientDetailsAsThis($id, $clientFirstName, $clientLastName, $clientDateOfBirth, $clientEmail, $clientPhoneNumber, $clientRoadNumber, $clientRoadName, $clientPostalCode, $clientCity);
		}		


		if ($_GET['action'] == "clientDeletingConfirmed") 
		{
			if (isset($_POST['confirmed'])) 
			{
				$id = $_GET['id'];
				$controls_admin = new controls_Admin();
				$controls_admin -> deleteThisClientFolder($id);
			}

			if (isset($_POST['denied'])) 
			{
				$id = $_GET['id'];
				$controls_admin = new controls_Admin();
				$controls_admin -> getClientDetails($id);
			}
		}


		/* -------------------- FROM QUIZ --------------------------------- */
		if ($_GET['action'] == "settingsFromQuiz") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
    			session_start();
			}
			$userId = $_SESSION['userId'];

			$controls_admin = new Controls_Admin();		
			$controls_admin -> clear($userId);
			$controls_admin -> settings();
		}


		if ($_GET['action'] == "agendaFromQuiz") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
    			session_start();
			}
			$userId = $_SESSION['userId'];

			$controls_admin = new Controls_Admin();
			$controls_admin -> clear($userId);
			$controls_admin -> agenda();
		}

		if ($_GET['action'] == "showClientsListFromQuiz") 
		{

			if (session_status() === PHP_SESSION_NONE) 
			{
    			session_start();
			}
			$userId = $_SESSION['userId'];

			$controls_admin = new Controls_Admin();
			$controls_admin -> clear($userId);
			$controls_admin -> showClientsList();
		}

		if ($_GET['action'] == "showFemaleClientsFromQuiz") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
    			session_start();
			}
			$userId = $_SESSION['userId'];

			$controls_admin = new Controls_Admin();
			$controls_admin -> clear($userId);
			$controls_admin -> showFemaleClients();
		}

		if ($_GET['action'] == "showMaleClientsFromQuiz") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
    			session_start();
			}
			$userId = $_SESSION['userId'];

			$controls_admin = new Controls_Admin();
			$controls_admin -> clear($userId);
			$controls_admin -> showMaleClients();
		}

		if ($_GET['action'] == "showChildClientsFromQuiz") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
    			session_start();
			}
			$userId = $_SESSION['userId'];

			$controls_admin = new Controls_Admin();
			$controls_admin -> clear($userId);
			$controls_admin -> showChildClients();
		}


		if ($_GET['action'] == "addAClientFromQuiz") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
    			session_start();
			}
			$userId = $_SESSION['userId'];

		  	$controls_admin = new Controls_Admin();
		  	$controls_admin -> clear($userId);
			$controls_admin -> addAClient();
		}		

		if ($_GET['action'] == "gotoMailsFromQuiz")
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
    			session_start();
			}
			$userId = $_SESSION['userId'];

			$controls_admin = new Controls_Admin();
			$controls_admin -> clear($userId);
			$controls_admin -> gotoMails();
		}

		if ($_GET['action'] == "settingsFromQuiz") 
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
    			session_start();
			}
			$userId = $_SESSION['userId'];

			$controls_admin = new Controls_Admin();
			$controls_admin -> clear($userId);
			$controls_admin -> settings();
		}	

		if ($_GET['action'] == "logoutFromQuiz")
		{
		
			if (session_status() === PHP_SESSION_NONE) 
			{
    			session_start();
			}
			$userId = $_SESSION['userId'];
			
			$controls_admin = new Controls_Admin();
			$controls_admin -> clear($userId);
			$controls_admin -> logout();
		}

		if ($_GET['action'] == "completeMyAccountCreation")
		{
		
			if (session_status() === PHP_SESSION_NONE) 
			{
    			session_start();
			}

			$codedKey = base64_decode($_GET['sdkjgbsdkjfgyerskghxddkjg']);
			$_SESSION['codedKey'] = $codedKey;

			$controls_admin = new Controls_Admin();
			$controls_admin -> completeMyAccountCreation($codedKey);
		}


		if ($_GET['action'] == "accountCreationCompletedByClient")
		{
		
			if (session_status() === PHP_SESSION_NONE) 
			{
    			session_start();
			}

			$userId = $_GET['id'];

			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$phoneNumber = $_POST['phoneNumber'];
			$dob = $_POST['dob'];
			$password = $_POST['password'];
			$retypedPassword = $_POST['retypedPassword'];

			$controls_admin = new Controls_Admin();
			$controls_admin -> accountCreationCompletedByClient($userId, $firstname, $lastname, $username, $email, $phoneNumber, $dob, $password, $retypedPassword);
		}

		if ($_GET['action'] == "unmatchedPasswordToCompleteAccountCreateByClient")
		{
		
			if (session_status() === PHP_SESSION_NONE) 
			{
    			session_start();
			}

			$codedKey = $_SESSION['codedKey'];

			$controls_admin = new Controls_Admin();
			$controls_admin -> recompleteMyAccountCreation($codedKey);
		}

		/* -------------------- END FROM QUIZ -----------------------------*/


		if ($_GET['action'] == "help") 
		{
			echo "help found !" ;
		}
	}

	else
	{	
		if (session_status() === PHP_SESSION_NONE) 
		{
			session_start();
		}
		
		if ($_SESSION['sessionStatus'] == "online")
		{
			$controls_admin = new Controls_Admin();
			$controls_admin -> accueil();
		}
		
		else
		{
			header("location: view/home/home.php");
		}
	}

?>