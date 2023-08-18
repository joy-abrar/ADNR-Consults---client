<?php
	
	require('Manager.php');

	class userManager extends Manager
	{

		public function createAccount($sexe, $firstname, $lastname, $email, $phoneNumber, $username, $password, $dob)
		{
			$status = "client";
			$verificationStatus = "confirmed";
			$db = $this->dbConnect();
			$createAccount = $db -> prepare('INSERT INTO user_client(sexe, firstname, lastname, email, phoneNumber, username, password, dob, status, verificationStatus) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ');
			$createAccount ->execute(array($sexe, $firstname, $lastname, $email, $phoneNumber, $username, $password, $dob, $status, $verificationStatus));
			return $createAccount;
		}

		public function missmatchedPassword()
		{
			header("location:index.php?action=wrongPassword");
		}

		public function login($username, $password)
		{
			$db = $this->dbConnect();
			$loginAccount = $db -> prepare('SELECT * FROM user_client WHERE username = ? AND password = ? ');
			$loginAccount ->execute(array($username, $password));
			
			$rows = $loginAccount->fetch(PDO::FETCH_ASSOC);		

			/*
				while($rows = $loginAccount -> fetch())
				{
				}
			*/
			$fromDatabaseId = $rows['id'];
			$fromDatabaseSexe = $rows['sexe'];
			$fromDatabaseFirstname = $rows['firstname'];
			$fromDatabaseLastname = $rows['lastname'];
			$fromDatabaseUsername = $rows['username'];
			$fromDatabasePassword = $rows['password'];
			$fromDatabaseUserEmail = $rows['email'];
			$fromDatabaseUserPhoneNumber = $rows['phoneNumber'];
			$fromDatabaseUserStatus = $rows['status'];
			$fromDatabaseDob = $rows['dob'];
			$fromDatabaseVerificationStatus = $rows['verificationStatus'];
			
			if ($loginAccount) 
			{
				if ($username == $fromDatabaseUsername && $password == $fromDatabasePassword) 
				{
					if ($fromDatabaseUserStatus == "client" && $fromDatabaseVerificationStatus == "confirmed") 
					{
						session_start();
						$_SESSION['sessionStatus'] = "online";
						$_SESSION['userId'] = $fromDatabaseId;
						$_SESSION['userSexe'] = $fromDatabaseSexe;
						$_SESSION['firstName'] = $fromDatabaseFirstname;
						$_SESSION['lastName'] = $fromDatabaseLastname;
						$_SESSION['userName'] = $fromDatabaseUsername;
						$_SESSION['userPassword'] = $fromDatabasePassword;
						$_SESSION['userEmail'] = $fromDatabaseUserEmail;
						$_SESSION['userPhoneNumber'] = $fromDatabaseUserPhoneNumber;
						$_SESSION['userDob'] = $fromDatabaseDob;
						$_SESSION['userStatus'] = $fromDatabaseUserStatus;

						$dateOfBirth = $_SESSION['userDob'];
  						$today = date("Y-m-d");
  						$diff = date_diff(date_create($dateOfBirth), date_create($today));
					  	$_SESSION['userAge'] = $diff->format('%y');


						header('location:index.php?action=dashboard');
					}

					else 
					{
						header("location:index.php");					
					}
				}
				
			
				else
				{
					header("location:index.php");
				}
			}

			else
			{
				echo "fetch didnt worked for login";
			}
		}

		public function showMyPraticiensIdForDashboard($userId)
		{
			$db = $this -> dbConnect();
			$showMyPraticiensId = $db -> prepare('SELECT * FROM myconnections WHERE clientId = ? LIMIT 4');
			$showMyPraticiensId -> execute(array($userId));
			return $showMyPraticiensId;
		}

		public function showMyPraticiensDetailsForDashboard($praticienId)
		{
			$db = $this -> dbConnect();
			$showMyPraticiensDetails = $db -> prepare('SELECT * FROM user_praticien WHERE id = ? LIMIT 4');
			$showMyPraticiensDetails -> execute(array($praticienId));
			return $showMyPraticiensDetails;
		}

		public function checkEmailAndPasswordForRecovery($email, $dateOfBirth, $code)
		{
			$db = $this->dbConnect();
			$checkForVerification = $db -> prepare('SELECT * FROM user_client WHERE email = ? AND dob = ? ');
			$checkForVerification ->execute(array($email, $dateOfBirth));
			
			$rows = $checkForVerification->fetch(PDO::FETCH_ASSOC);				
			
			$idFromDb = $rows['id'];
			$emailFromDb = $rows['email'];
			$dobFromDb = $rows['dob'];
			$usernameFromDb = $rows['username'];
		
			if ($checkForVerification -> rowCount() > 0) 
			{
				echo "verification success !" ;

				if ($emailFromDb == $email && $dobFromDb == $dateOfBirth) 
				{
					$inputCode = $db -> prepare('UPDATE user_client SET code = ? WHERE email = ? AND dob = ?');
					$inputCode ->execute(array($code, $email, $dateOfBirth));				
					include_once('view/sendPassword/sendPassword.php');
					return $inputCode;
				}
		
				else
				{
					header("location view/index.php");
				}	
			}
			
			else
			{
				echo "didnt match with db !" ;
			}	
		}

		public function checkInsertedCode($recoveryEmail, $code)
		{
			$db = $this->dbConnect();
			$checkInsertedCode = $db -> prepare('SELECT * FROM user_client WHERE email = ?');
			$checkInsertedCode ->execute(array($recoveryEmail));

			$rows = $checkInsertedCode->fetch(PDO::FETCH_ASSOC);	
			$codeFromDb = $rows['code'];

			if ($codeFromDb == $code) 
			{
				header("location:view/resetPassword/resetPassword.php");
			}

			else
			{
				echo "the code didn't match !" ;
			}
		}

		public function resetPassword($recoveryEmail, $password,$retypedPassword)
		{
			$db = $this->dbConnect();
			$resetPassword = $db -> prepare('UPDATE user_client SET password = ? WHERE email = ?');
			$resetPassword ->execute(array($password, $recoveryEmail));
		}

		public function forgetPassword()
		{
			header("location: view/forgetPassword/forgetPassword.php");
		}

		public function createAccountLink()
		{
			header("location: view/createAccountPage/createAccountPage.php");
		}

		public function forgetIdentification()
		{
			header("location: view/forgetIdentification/forgetIdentification.php");
		}

		public function updateAccount($userId, $firstname, $lastname, $username, $email, $dob, $password)
		{
			$db = $this->dbConnect();
			$updateAccount = $db -> prepare('UPDATE user_client SET email = ?, firstname = ?, lastname = ?, password = ?, dob = ?, username = ? WHERE id = ?');
			$updateAccount -> execute(array($email, $firstname, $lastname, $password, $dob, $username, $userId));
		}

		public function deleteThisPatientAccount($patientId)
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}
			$patientId = $_SESSION['userId'];
			
			$db = $this->dbConnect();
			$deleteThisPatientAccount = $db -> prepare('DELETE FROM user_client WHERE id = ?');
			$deleteThisPatientAccount -> execute(array($patientId));	
			session_destroy();
			return $deleteThisPatientAccount;
		}

		public function logout()
		{
			session_start();
			$_SESSION['sessionStatus'] == "offline" ;
			$_SESSION['userId'] = null;
			$_SESSION['userName'] = null;
			$_SESSION['userPassword'] = null;
			$_SESSION['userSexe'] = null;
			$_SESSION['firstName'] = null;
			$_SESSION['lastName'] = null;
			$_SESSION['userEmail'] = null;
			$_SESSION['userPhoneNumber'] = null;
			$_SESSION['userDob'] = null;
			$_SESSION['userStatus'] = null;
			session_unset();
			header("location: view/home/home.php");
		}

		public function goBack()
		{
			header("location: view/index.php");

		}

		public function sendThisMail($sendFrom, $sendTo, $mailSubject, $message, $mailStatus)
		{

			$db = $this -> dbConnect();
			$sendThisMail = $db -> prepare('INSERT INTO mails(senderMail, receiverMail, mailTitle, mailContent, mailStatus) VALUES(?, ?, ?, ?, ?)');
			$sendThisMail -> execute(array($sendFrom, $sendTo, $mailSubject, $message, $mailStatus));
			return $sendThisMail;
		}

		public function deleteThisSelectedMail($id)
		{
			$db = $this -> dbConnect();
			$deleteThisSelectedMail = $db -> prepare('DELETE FROM mails WHERE id = ?');
			$deleteThisSelectedMail -> execute(array($id));
			return $deleteThisSelectedMail;

		}

		public function addThisClient($clientSexe, $clientFirstName, $clientLastName, $clientDateOfBirth, $clientEmail, $clientPhoneNumber, $clientRoadNumber, $clientRoadName, $clientAddressAlternate, $clientPostalCode, $clientCity)
		{
			$db = $this -> dbConnect();
			$addThisClient = $db -> prepare('INSERT INTO patientlist(clientSexe, clientFirstName, clientLastName, clientDateOfBirth, clientEmail, clientPhoneNumber, clientRoadNumber, clientRoadName, clientAddressAlternate, clientPostalCode, clientCity) VALUES(?, ?, ?, ?, ? ,?,? , ?, ?, ?, ?)');
			$addThisClient -> execute(array($clientSexe, $clientFirstName, $clientLastName, $clientDateOfBirth, $clientEmail, $clientPhoneNumber, $clientRoadNumber, $clientRoadName, $clientAddressAlternate, $clientPostalCode, $clientCity));
			return $addThisClient;
		}

		public function showPraticiensList()
		{
			$status = "praticien";
			$verificationStatus = "confirmed";
			$db = $this -> dbConnect();
			$showPraticiensList = $db -> prepare('SELECT * FROM user_praticien WHERE status = ? AND verificationStatus = ?');
			$showPraticiensList -> execute(array($status, $verificationStatus));
			return $showPraticiensList;
		}

		public function myDocuments($userId)
		{
			$db = $this -> dbConnect();
			$myDocuments = $db -> prepare('SELECT * FROM documents WHERE userId = ?');
			$myDocuments -> execute(array($userId));
			return $myDocuments;
		}

		public function myBilan($userId)
		{
			$shareWithClient = 1;
			$db = $this -> dbConnect();
			$myBilan = $db -> prepare('SELECT * FROM naturosheet WHERE bilanFor = ? AND shareWithClient = ?');
			$myBilan->execute(array($userId, $shareWithClient));
			return $myBilan;
		}

		public function myBilan2($userId)
		{
			$shareWithClient = 1;
			$db = $this -> dbConnect();
			$myBilan2 = $db -> prepare('SELECT * FROM fleurssheet WHERE bilanFor = ? AND shareWithClient = ?');
			$myBilan2->execute(array($userId, $shareWithClient));
			return $myBilan2;
		}

		public function myBilan3($userId)
		{
			$shareWithClient = 1;
			$db = $this -> dbConnect();
			$myBilan3 = $db -> prepare('SELECT * FROM dnsResults WHERE clientId = ? AND shareWithClient = ?');
			$myBilan3->execute(array($userId, $shareWithClient));
			return $myBilan3;
		}

		public function myBilan4($userId)
		{
			$shareWithClient = 1;
			$db = $this -> dbConnect();
			$myBilan4 = $db -> prepare('SELECT * FROM gdsResults WHERE clientId = ? AND shareWithClient = ?');
			$myBilan4->execute(array($userId, $shareWithClient));
			return $myBilan4;
		}

		public function myBilan5($userId)
		{
			$shareWithClient = 1;
			$db = $this -> dbConnect();
			$myBilan5 = $db -> prepare('SELECT * FROM gdseResults WHERE clientId = ? AND shareWithClient = ?');
			$myBilan5->execute(array($userId, $shareWithClient));
			return $myBilan5;
		}	

		public function myBilan6($userId)
		{
			$shareWithClient = 1;
			$db = $this -> dbConnect();
			$myBilan6 = $db -> prepare('SELECT * FROM phvDocuments WHERE phvFor = ? AND shareWithClient = ?');
			$myBilan6->execute(array($userId, $shareWithClient));
			return $myBilan6;
		}		

		public function sharedBilan($userId, $docId)
		{
			$category = "bilan";
			$db = $this -> dbConnect();
			$sharedBilan = $db -> prepare('SELECT * FROM sharing WHERE shareFrom = ? AND category = ? AND documentId = ?');
			$sharedBilan -> execute(array($userId, $category, $docId));
			return $sharedBilan;
		}

		public function getAllOthersDocuments($userId)
		{
			$db = $this -> dbConnect();
			$getAllOthersDocuments = $db -> prepare('SELECT * FROM documents WHERE myClientId = ?');
			$getAllOthersDocuments -> execute(array($userId));
			return $getAllOthersDocuments;	
		}

		public function getAllMyConnectionsForSharing($userId)
		{
			$db = $this -> dbConnect();
			$getAllMyConnectionsForSharing = $db -> prepare('SELECT * FROM myconnections WHERE clientId = ?');
			$getAllMyConnectionsForSharing -> execute(array($userId));
			return $getAllMyConnectionsForSharing;
		}

		public function getPraticienNameThroughIdFromSharing($shareTo)
		{
			$db = $this -> dbConnect();
			$getPraticienNameThroughIdFromSharing = $db -> prepare('SELECT * FROM user_praticien WHERE id = ?');
			$getPraticienNameThroughIdFromSharing -> execute(array($shareTo));
			return $getPraticienNameThroughIdFromSharing;
		}

		public function checkIfthisDocumentIsAlreadyShared($documentId, $userId, $praticienId)
		{
			$db = $this -> dbConnect();
			$checkIfthisDocumentIsAlreadyShared = $db -> prepare('SELECT * FROM sharing WHERE documentId = ? AND shareFrom = ? AND shareTo = ?');
			$checkIfthisDocumentIsAlreadyShared -> execute(array($documentId, $userId, $praticienId));
			return $checkIfthisDocumentIsAlreadyShared;
		}

		public function uploadThisDocument($userId, $fileName, $fullPath)
		{
			$db = $this -> dbConnect();
			$myDocuments = $db -> prepare('INSERT INTO documents(userId, documentName, paths ) VALUES(?, ?, ?)');
			$myDocuments -> execute(array($userId,$fileName,$fullPath));
			return $myDocuments;
		}

		public function nowSendMyPraticienANotification($userId, $praticienToShareId, $notificationSenderName, $notificationFor, $notificationMessage, $readStatus)
		{
			$db = $this -> dbConnect();
			$nowSendMyPraticienANotification = $db -> prepare('INSERT INTO notifications(praticienId, clientId, notificationFor, notificationSenderName, notificationMessage, readStatus) VALUES(?, ?, ?, ?, ?, ?)');
			$nowSendMyPraticienANotification -> execute(array($praticienToShareId, $userId, $notificationFor, $notificationSenderName, $notificationMessage, $readStatus));
			return $nowSendMyPraticienANotification;
		}

		public function deleteThisClientDocument($documentId)
		{
			$db = $this -> dbConnect();
			$deleteThisClientDocument = $db -> prepare('DELETE FROM documents WHERE id = ?');
			$deleteThisClientDocument -> execute(array($documentId));
			return $deleteThisClientDocument;
		}

		public function deleteDocumentLinkFromSharing($documentId)
		{
			$db = $this -> dbConnect();
			$deleteDocumentLinkFromSharing = $db -> prepare('DELETE FROM sharing WHERE documentId = ?');
			$deleteDocumentLinkFromSharing -> execute(array($documentId));
			return $deleteDocumentLinkFromSharing;
		}

		
		public function getPraticienDetailsForSharingNotification($praticienToShareId)
		{
			$db = $this -> dbConnect();
			$getPraticienDetailsForSharingNotification = $db -> prepare('SELECT * FROM user_praticien WHERE id = ?');
			$getPraticienDetailsForSharingNotification -> execute(array($praticienToShareId));
			return $getPraticienDetailsForSharingNotification;
		}

		public function sayWhomToShare($userId, $praticienToShareId, $documentId)
		{
			$category = "client_publishing";
			$db = $this -> dbConnect();
			$sayWhomToShare = $db -> prepare('INSERT IGNORE INTO sharing(shareFrom, shareTo, documentId, category) VALUES(?, ?, ?, ?)');
			$sayWhomToShare -> execute(array($userId, $praticienToShareId, $documentId, $category));
			return $sayWhomToShare;
		}

		public function sayWhomToNotShare($userId, $praticienToShareId, $documentId)
		{
			echo $userId, $praticienToShareId, $documentId;
			$category = "client_publishing";
			$db = $this -> dbConnect();
			$sayWhomToNotShare = $db -> prepare('DELETE FROM sharing WHERE shareFrom = ? AND shareTo = ? AND documentId = ? AND category = ?');
			$sayWhomToNotShare -> execute(array($userId, $praticienToShareId, $documentId, $category));
			return $sayWhomToNotShare;
		}

		public function showMyPraticiensId($userId)
		{
			$db = $this -> dbConnect();
			$showMyPraticiensId = $db -> prepare('SELECT * FROM myconnections WHERE clientId = ?');
			$showMyPraticiensId -> execute(array($userId));
			return $showMyPraticiensId;
		}

		public function showPraticienQuestionSheet($userId)
		{
			$db = $this -> dbConnect();
			$showPraticienQuestionSheet = $db -> prepare('SELECT * FROM bilanNaturoTwoForThisClientBlocSelection WHERE clientId = ?');
			$showPraticienQuestionSheet -> execute(array($userId));
			return $showPraticienQuestionSheet;
		}

		public function getPraticienNameForQuestionSheet($praticienId)
		{
			$db = $this -> dbConnect();
			$getPraticienNameForQuestionSheet = $db -> prepare('SELECT * FROM user_praticien WHERE id = ?');
			$getPraticienNameForQuestionSheet -> execute(array($praticienId));
			return $getPraticienNameForQuestionSheet;
		}

		public function startThisQuestionSheet($questionSheetId)
		{
			$db = $this -> dbConnect();
			$startThisQuestionSheet = $db -> prepare('SELECT * FROM bilanNaturoTwoForThisClientBlocSelection WHERE id = ?');
			$startThisQuestionSheet -> execute(array($questionSheetId));
			return $startThisQuestionSheet;
		}

		public function setQuestionSheetIdAtFirst($questionSheetId)
		{
			$db = $this -> dbConnect();
			$setQuestionSheetIdAtFirst = $db -> prepare("INSERT INTO  bilanNaturoTwoQuestionSheetAnswer(QuestionBlocId) VALUES(?)");
			$setQuestionSheetIdAtFirst -> execute(array($questionSheetId));
			return $setQuestionSheetIdAtFirst;
		}

		public function saveThisQuestionSheetAnswerToDatabase($questionSheetId, $columnName, $answer)
		{
			$db = $this -> dbConnect();
			$saveThisQuestionSheetAnswerToDatabase = $db -> prepare('UPDATE bilanNaturoTwoQuestionSheetAnswer SET ' . $columnName . ' = ? WHERE QuestionBlocId = ?');
			$saveThisQuestionSheetAnswerToDatabase -> execute(array($answer, $questionSheetId));
			return $saveThisQuestionSheetAnswerToDatabase;
		}

		public function updateBilanNaturoTwoQuestionBlocStatus($questionSheetId, $status)
		{
			$db = $this -> dbConnect();
			$updateBilanNaturoTwoQuestionBlocStatus = $db -> prepare('UPDATE bilanNaturoTwoForThisClientBlocSelection SET bilanStatus = ? WHERE id = ?');
			$updateBilanNaturoTwoQuestionBlocStatus -> execute(array($status, $questionSheetId));
			return $updateBilanNaturoTwoQuestionBlocStatus;
		}

		public function showMyPraticiensDetails($praticienId)
		{
			$db = $this -> dbConnect();
			$showMyPraticiensDetails = $db -> prepare('SELECT * FROM user_praticien WHERE id = ?');
			$showMyPraticiensDetails -> execute(array($praticienId));
			return $showMyPraticiensDetails;
		}

		public function chooseThisPraticienForMe($clientId, $praticienId)
		{
			$db = $this -> dbConnect();
			
			$checkIfAlreadyExists = $db -> prepare('SELECT * FROM myconnections WHERE clientId = ? AND praticienId = ?');
			$checkIfAlreadyExists -> execute(array($clientId, $praticienId));

			$numberOfResult = $checkIfAlreadyExists -> rowCount();

			if ($numberOfResult == 0) 
			{
				$chooseThisPraticienForMe = $db -> prepare('INSERT INTO myconnections(clientId, praticienId) VALUES(?, ?)');
				$chooseThisPraticienForMe -> execute(array($clientId, $praticienId));
				return $chooseThisPraticienForMe;
			}

			else
			{
				return $checkIfAlreadyExists;
			}
		}

		public function deleteThisPraticienForMe($id)
		{
			$db = $this -> dbConnect();

			$deleteThisPraticienForMe = $db -> prepare('DELETE FROM myconnections WHERE id = ?');
			$deleteThisPraticienForMe -> execute(array($id));
			return $deleteThisPraticienForMe;
		}

		public function getPraticienIdFromMyPraticienList($id)
		{
			$db = $this -> dbConnect();
			$getPraticienIdFromMyPraticienList = $db -> prepare('SELECT * FROM myconnections WHERE id = ?');
			$getPraticienIdFromMyPraticienList -> execute(array($id));
			return $getPraticienIdFromMyPraticienList;
		}

		public function viewMoreOfThisPraticien($praticienId)
		{
			$db = $this -> dbConnect();
			$viewMoreOfThisPraticien = $db -> prepare('SELECT * FROM user_praticien WHERE id = ? ');
			$viewMoreOfThisPraticien -> execute(array($praticienId));
			return $viewMoreOfThisPraticien;
		}

		public function getClientDetails($id)
		{
			$db = $this -> dbConnect();
			$getClientsDetails = $db -> prepare('SELECT * FROM patientlist WHERE id = ?');
			$getClientsDetails -> execute(array($id));
			return $getClientsDetails;
		}
		

		public function modifyClientDetails($id)
		{
			$db = $this -> dbConnect();
			$modifyClientDetails = $db -> prepare('SELECT * FROM patientlist WHERE id = ?');
			$modifyClientDetails -> execute(array($id));
			return $modifyClientDetails;
		}

		public function modifyClientDetailsAsThis($id, $clientFirstName, $clientLastName, $clientDateOfBirth, $clientEmail, $clientPhoneNumber, $clientRoadNumber, $clientRoadName, $clientPostalCode, $clientCity)
		{
			$db = $this -> dbConnect();
			$modifyClientDetailsAsThis = $db -> prepare('UPDATE patientlist SET clientFirstName = ?, clientLastName = ?, clientDateOfBirth = ?, clientEmail = ?, clientPhoneNumber = ?, clientRoadNumber = ?, clientRoadName = ?, clientPostalCode = ?, clientCity = ?  WHERE id = ?');
			$modifyClientDetailsAsThis -> execute(array($clientFirstName, $clientLastName, $clientDateOfBirth, $clientEmail, $clientPhoneNumber, $clientRoadNumber, $clientRoadName, $clientPostalCode, $clientCity, $id));
			return $modifyClientDetailsAsThis;
		}

		public function deleteThisClientFolder($id)
		{
			$db = $this -> dbConnect();
			$deleteThisClientFolder = $db -> prepare('DELETE FROM patientList WHERE id = ?');
			$deleteThisClientFolder -> execute(array($id));
			return $deleteThisClientFolder;
		}

		public function clear($userId)
		{
			$flowerTableName = "flowers_". $userId ;
			$descriptionTableName = "groupdescription_". $userId;

			$db = $this -> dbConnect();
			$dropFlowersTables = $db -> prepare('DROP TABLE ' . $flowerTableName);
			$dropFlowersTables -> execute(array()); 

			$dropDescriptionTables = $db -> prepare('DROP TABLE ' . $descriptionTableName);
			$dropDescriptionTables -> execute(array());
			return $dropDescriptionTables;
		}

		public function retreiveVerificationStatus($codedKey)
		{
			$db = $this -> dbConnect();
			$retreiveVerificationStatus = $db -> prepare('SELECT * FROM user_client WHERE id = ?');
			$retreiveVerificationStatus -> execute(array($codedKey)); 
			return $retreiveVerificationStatus;
		}

		public function retreiveAllDataToCreateMyAccount($codedKey)
		{
			$db = $this -> dbConnect();
			$retreiveAllDataToCreateMyAccount = $db -> prepare('SELECT * FROM user_client WHERE id = ?');
			$retreiveAllDataToCreateMyAccount -> execute(array($codedKey)); 
			return $retreiveAllDataToCreateMyAccount;
		}

		public function accountCreationCompletedByClient($userId, $firstname, $lastname, $username, $email, $phoneNumber, $dob, $password)
		{
			$userVerification = "verified";
			$verificationKey = null;
			$verificationStatus = "confirmed";
			$status = "client";

			$db = $this->dbConnect();
			$accountCreationCompletedByClient = $db -> prepare('UPDATE user_client SET email = ?, phoneNumber = ?, firstname = ?, lastname = ?, password = ?, dob = ?, username = ?, status = ?, userVerification = ?, verificationKey = ?, verificationStatus = ? WHERE id = ?');
			$accountCreationCompletedByClient -> execute(array($email, $phoneNumber, $firstname, $lastname, $password, $dob, $username, $status, $userVerification, $verificationKey, $verificationStatus, $userId));
			return $accountCreationCompletedByClient;
		}

		public function getNotifications()
		{
			if (session_status() === PHP_SESSION_NONE) 
			{
				session_start();
			}

			$db = $this->dbConnect();
			$getNotifications = $db -> prepare('SELECT * FROM notifications WHERE clientId = ? AND notificationFor = ? AND readStatus = ? ORDER BY updatedOn DESC LIMIT 5');
			$getNotifications ->execute(array($_SESSION['userId'], "client", 0));
			return $getNotifications;
		}
		

















		public function test($username, $password)
		{
			$db = $this->dbConnect();
			$check = $db -> prepare('INSERT INTO user_client(username, password) VALUES(?, ?) ');
			$check ->execute(array($username, $password));
			return $check;
		}

		public function emailCheck($email)
		{
			$db = $this->dbConnect();
			$check = $db -> prepare('SELECT email FROM user_client WHERE email = ?');
			$check ->execute(array($email));
			return $check;
		}
		


	}
?>