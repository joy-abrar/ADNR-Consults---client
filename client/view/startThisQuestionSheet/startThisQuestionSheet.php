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
			<link rel="stylesheet" type="text/css" href="view/startThisQuestionSheet/style.css?version=1.0">
			<link rel="stylesheet" type="text/css" href="lib/css/styleMenubar.css">
			<link rel="icon" type="image/png" href="view/startThisQuestionSheet/images/logo.png" />
			<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
			<script src="https://cdn.tiny.cloud/1/wilusi6irx9wo5pjtz8vs3s76o223iueetyp8xxbrwwlr0z2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
			<script src="https://kit.fontawesome.com/1bd3419ec6.js" crossorigin="anonymous"></script>
			
			<!------- LOADING SCREEN SCRIPT------- -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
			<script type="text/javascript" src="view/startThisQuestionSheet/main2.js"></script>
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

			<script>
			    function enableBox(answerNumber)
			    {
			      document.getElementById("otheranswer"+answerNumber).disabled = false;
			    }
			    
			    function changeradioother(answerNumber) 
			    {
			      var other = document.getElementById("other"+answerNumber);
			      
			      other.value = document.getElementById("otheranswer"+answerNumber).value;	      
			    }
			</script>

			<div id="mainAppearence">


				<div id="fifthBloc">
					
					<center id="clientListTitle">
						<h2>Questionnaires Praticiens</h2>
					</center>
				</div>

				<form method="POST" action="index.php?action=saveThisQuestionSheetAnswerToDatabase">
				<div id="questionSheetBloc">	

					<center>
						<div id="bloc1">
							<h2>A PROPOS DU CLIENT</h2>
							<?php
								if ($bloc1 == 1) 
								{
							?>
									<label for="box1">1. Antécédents</label>
									<div id="blocOneContentShape">
										
										<div id="question">
											<h3>Prenez-vous un/des traitement(s) médicamenteux?</h3>
										</div>
										<div id="answer">
											<label for="answer1">Oui</label>
											<input type="radio" name="answer1" value="oui" >
											<label for="answer1">Non</label>
											<input type="radio" name="answer1" value="non" >	
										</div>

										<div id="question">
											<h3>Si oui, lesquels ? </h3>
										</div>
										<div id="answer">
											<label for="answer2">anxiolytiques </label>
											<input type="radio" name="answer2" value="anxiolytiques" >
											<label for="answer2">antidépresseurs </label>
											<input type="radio" name="answer2" value="antidépresseurs" >
											<label for="answer2">antalgique  </label>
											<input type="radio" name="answer2" value="antalgique" >
											<label for="answer2">anti-inflammatoire </label>
											<input type="radio" name="answer2" value="anti-inflammatoire" >
											<label for="answer2">somnifères</label>
											<input type="radio" name="answer2" value="somnifères" >
											<label for="answer2">laxatifs</label>
											<input type="radio" name="answer2" value="laxatifs" >
											<label for="answer2">autre</label>
											<input type="radio" name="answer2" value="autre" >	
										</div>

										<div id="question">
											<h3>Depuis combien de temps?</h3>
										</div>
										<div id="answer">
											<input type="text" name="answer3">	
										</div>

										<div id="question">
											<h3>Prenez-vous des compléments alimentaires ?</h3>
										</div>
										<div id="answer">
											<label for="answer4">Oui</label>
											<input type="radio" name="answer4" value="oui" >
											<label for="answer4">Non</label>
											<input type="radio" name="answer4" value="non" >	
										</div>

										<div id="question">
											<h3>Si oui, lesquels ? </h3>
										</div>
										<div id="answer">
											<label for="answer5">vitamines</label>
											<input type="radio" name="answer5" value="vitamines" >
											<label for="answer5">probiotiques</label>
											<input type="radio" name="answer5" value="probiotiques" >
											<label for="answer5">magnésium</label>
											<input type="radio" name="answer5" value="magnésium" >
											
											<label for="answer5">autre</label>
											<input type="radio" name="answer5" id="other5"  value="other" onclick="enableBox('5')">
											<input id="otheranswer5" type="text" onchange="changeradioother('5')" disabled>
										</div>

										<div id="question">
											<h3>Depuis combien de temps?</h3>
										</div>
										<div id="answer6">
											<input type="text" name="answer6" >	
										</div>

										<div id="question">
											<h3>Etes-vous suivi par un médecin généraliste?</h3>
										</div>
										<div id="answer">
											<label for="answer7">Oui</label>
											<input type="radio" name="answer7" value="oui" >
											<label for="answer7">Non</label>
											<input type="radio" name="answer7" value="non" >	
										</div>

										<div id="question">
											<h3>Quel est son nom?</h3>
										</div>
										<div id="answer8">
											<input type="text" name="answer8" >	
										</div>

										<div id="question">
											<h3>Combien de fois par an le consultez-vous ?</h3>
										</div>
										<div id="answer">
											<label for="answer9">moins d’une fois/an</label>
											<input type="radio" name="answer9" value="moins d’une fois/an" >
											<label for="answer9">plusieurs fois par an</label>
											<input type="radio" name="answer9" value="plusieurs fois par an" >
											<label for="answer9">1 fois par trimestre</label>
											<input type="radio" name="answer9" value="1 fois par trimestre" >
											<label for="answer9">1 fois par mois</label>
											<input type="radio" name="answer9" value="1 fois par mois" >	
										</div>

										<div id="question">
											<h3>Avez-vous fait un bilan sanguin dernièrement ?</h3>
										</div>
										<div id="answer">
											<label for="answer10">Oui</label>
											<input type="radio" name="answer10" value="oui" >
											<label for="answer10">Non</label>
											<input type="radio" name="answer10" value="non" >	
										</div>

										<div id="question">
											<h3>Quels ont été les résultats?</h3>
										</div>
										<div id="answer">
											<label for="answer11">Rien à signaler</label>
											<input type="radio" name="answer11" value="Rien à signaler" >
											<label for="answer11">cholestérol</label>
											<input type="radio" name="answer11" value="cholestérol" >
											<label for="answer11">diabète</label>
											<input type="radio" name="answer11" value="diabète" >
											<label for="answer11">carence en fer</label>
											<input type="radio" name="answer11" value="carence en fer" >
											<label for="answer11">autre</label>
											<input type="radio" name="answer11" id="other11"  value="other" onclick="enableBox('11')">
											<input id="otheranswer11" type="text" onchange="changeradioother('11')" disabled>
										</div>

										<div id="question">
											<h3>Vos vaccinations sont-elles à jour ? </h3>
										</div>
										<div id="answer">
											<label for="answer12">Oui</label>
											<input type="radio" name="answer12" value="oui" >
											<label for="answer12">Non</label>
											<input type="radio" name="answer12" value="non" >	
										</div>

										<div id="question">
											<h3>Avez-vous été souvent sous antibiothérapie ?</h3>
										</div>
										<div id="answer">
											<label for="answer13">Oui</label>
											<input type="radio" name="answer13" value="oui" >
											<label for="answer13">Non</label>
											<input type="radio" name="answer13" value="non" >	
										</div>

										<div id="question">
											<h3>Avez-vous pris des antibiotiques sur du long terme (plus de 3 semaines consécutives) ?</h3>
										</div>
										<div id="answer">
											<label for="answer14">Oui</label>
											<input type="radio" name="answer14" value="oui" >
											<label for="answer14">Non</label>
											<input type="radio" name="answer14" value="non" >	
										</div>

										<div id="question">
											<h3>Avez-vous réalisé des examens de santé durant les 6 derniers mois ?</h3>
										</div>
										<div id="answer">
											<label for="answer15">Oui</label>
											<input type="radio" name="answer15" value="oui" >
											<label for="answer15">Non</label>
											<input type="radio" name="answer15" value="non" >	
										</div>

										<div id="question">
											<h3>Pour quelles raisons? </h3>
										</div>
										<div id="answer">
											<label for="answer16">Précisez</label>
											<input type="text" name="answer16" placeholder="Précisez..." >
										</div>

										<div id="question">
											<h3>Etes-vous suivi par un/des spécialiste(s) ?</h3>
										</div>
										<div id="answer">
											<label for="answer17">Oui</label>
											<input type="radio" name="answer17" value="oui" >
											<label for="answer17">Non</label>
											<input type="radio" name="answer17" value="non" >	
										</div>

										<div id="question">
											<h3>Si oui, par quels spécialistes ?</h3>
										</div>
										<div id="answer">
											<label for="answer18">ostéopathe</label>
											<input type="radio" name="answer18" value="ostéopathe" >
											<label for="answer18">kinésiologue</label>
											<input type="radio" name="answer18" value="kinésiologue" >
											<label for="answer18">gastro-entérologue</label>
											<input type="radio" name="answer18" value="gastro-entérologue" >
											<label for="answer18">cendocrinologue</label>
											<input type="radio" name="answer18" value="endocrinologue" >
											<label for="answer18">kinésithérapeute</label>
											<input type="radio" name="answer18" value="kinésithérapeute" >
											<label for="answer18">cardiologue</label>
											<input type="radio" name="answer18" value="cardiologue" >
											<label for="answer18">psychologue</label>
											<input type="radio" name="answer18" value="psychologue" >
											<label for="answer18">psychiatre</label>
											<input type="radio" name="answer18" value="psychiatre" >
											<label for="answer18">autre</label>
											<input type="radio" name="answer18" id="other18"  value="other" onclick="enableBox('18')">
											<input id="otheranswer18" type="text" onchange="changeradioother('18')" disabled>
										</div>


										<div id="question">
											<h3>Quel est son nom ?</h3>
										</div>
										<div id="answer">
											<label for="answer19">Précisez</label>
											<input type="text" name="answer19" placeholder="Précisez..." >
										</div>

										<div id="question">
											<h3>Souffrez-vous d’une pathologie spécifique ?</h3>
										</div>
										<div id="answer">
											<label for="answer20">Oui</label>
											<input type="radio" name="answer20" value="oui" >
											<label for="answer20">Non</label>
											<input type="radio" name="answer20" value="non" >	
										</div>

										<div id="question">
											<h3>Si oui laquelle/lesquelles ?</h3>
										</div>
										<div id="answer">
											<label for="answer21">Précisez</label>
											<input type="text" name="answer21" placeholder="Précisez..." >
										</div>

										<div id="question">
											<h3>Avez-vous des allergies ?</h3>
										</div>
										<div id="answer">
											<label for="answer22">Oui</label>
											<input type="radio" name="answer22" value="oui" >
											<label for="answer22">Non</label>
											<input type="radio" name="answer22" value="non" >	
										</div> 

										<div id="question">
											<h3>Si oui, quelle(s) type(s) d’allergies?</h3>
										</div>
										<div id="answer">
											<label for="answer23">Alimentaires</label>
											<input type="radio" name="answer23" value="Alimentaires" >
											<label for="answer23">graminées</label>
											<input type="radio" name="answer23" value="graminées" >
											<label for="answer23">poils</label>
											<input type="radio" name="answer23" value="poils" >
											<label for="answer23">acariens</label>
											<input type="radio" name="answer23" value="acariens" >
											<label for="answer23">médicaments</label>
											<input type="radio" name="answer23" value="médicaments" >
											<label for="answer23">autre</label>
											<input type="radio" name="answer23" id="other23"  value="other" onclick="enableBox('23')">
											<input id="otheranswer23" type="text" onchange="changeradioother('23')" disabled>
										</div>

										<div id="question">
											<h3>Avez-vous déjà fait des séances de désensibilisation ?</h3>
										</div>
										<div id="answer">
											<label for="answer24">Oui</label>
											<input type="radio" name="answer24" value="oui" >
											<label for="answer24">Non</label>
											<input type="radio" name="answer24" value="non" >	
										</div>

										<div id="question">
											<h3>Si oui, quand ?</h3>
										</div>
										<div id="answer">
											<label for="answer25">Précisez</label>
											<input type="text" name="answer25" placeholder="Précisez..." >
										</div>


										<div id="question">
											<h3>Avez-vous subi des interventions chirurgicales sur les 6 derniers mois ?</h3>
										</div>
										<div id="answer">
											<label for="answer26">Oui</label>
											<input type="radio" name="answer26" value="oui" >
											<label for="answer26">Non</label>
											<input type="radio" name="answer26" value="non" >	
										</div>

										<div id="question">
											<h3>Si oui, précisez</h3>
										</div>
										<div id="answer">
											<label for="answer27">Précisez</label>
											<input type="text" name="answer27" placeholder="Précisez..." >
										</div>

										<div id="question">
											<h3>Avez-vous déjà eu un accident de la route ?</h3>
										</div>
										<div id="answer">
											<label for="answer28">Oui</label>
											<input type="radio" name="answer28" value="oui" >
											<label for="answer28">Non</label>
											<input type="radio" name="answer28" value="non" >	
										</div>

										<div id="question">
											<h3>Avez-vous déjà eu un accident de travail ?</h3>
										</div>
										<div id="answer">
											<label for="answer29">Oui</label>
											<input type="radio" name="answer29" value="oui" >
											<label for="answer29">Non</label>
											<input type="radio" name="answer29" value="non" >	
										</div>		


										<div id="question">
											<h3>Avez-vous vécu un évènement marquant ?</h3>
										</div>
										<div id="answer">
											<label for="answer30">Oui</label>
											<input type="radio" name="answer30" value="oui" >
											<label for="answer30">Non</label>
											<input type="radio" name="answer30" value="non" >	
										</div>

										<div id="question">
											<h3>Quels sont vos antécédents familiaux ?</h3>
										</div>
										<div id="answer">
											<label for="answer31">Cancer</label>
											<input type="radio" name="answer31" value="Cancer" >
											<label for="answer31">diabète</label>
											<input type="radio" name="answer31" value="diabète" >
											<label for="answer31">cholestérol</label>
											<input type="radio" name="answer31" value="cholestérol" >
											<label for="answer31">hypertension</label>
											<input type="radio" name="answer31" value="hypertension" >
											<label for="answer31">autre</label>
											<input type="radio" name="answer31" id="other31"  value="other" onclick="enableBox('31')">
											<input id="otheranswer31" type="text" onchange="changeradioother('31')" disabled>
										</div>

										<div id="question">
											<h3>Origine des antécédents ?</h3>
										</div>
										<div id="answer">
											<label for="answer32">Côté maternel</label>
											<input type="radio" name="answer32" value="Côté maternel" >
											<label for="answer32">côté paternel</label>
											<input type="radio" name="answer32" value="côté paternel" >	
										</div>
							<?php
								}
									
								if ($bloc2 == 1) 
								{
							?>

									<label for="box2">2. Lieu de vie, loisirs</label>

									<div id="question">
										<h3>Vous vivez :</h3>
									</div>
									<div id="answer">
										<label for="answer33">En ville</label>
										<input type="radio" name="answer33" value="En ville" >
										<label for="answer33">A la campagne</label>
										<input type="radio" name="answer33" value="A la campagne" >
										<label for="answer33">en bord de mer</label>
										<input type="radio" name="answer33" value="en bord de mer" >
										<label for="answer33">A la montagne</label>
										<input type="radio" name="answer33" value="A la montagne" >	
									</div>



									<div id="question">
										<h3>Vous êtes :</h3>
									</div>
									<div id="answer">
										<label for="answer34">En couple</label>
										<input type="radio" name="answer34" value="En couple" >
										<label for="answer34">Divorcé</label>
										<input type="radio" name="answer34" value="Divorcé" >
										<label for="answer34">Veuf(ve)</label>
										<input type="radio" name="answer34" value="Veuf(ve)" >
										<label for="answer34">A la montagne</label>
										<input type="radio" name="answer34" value="A la montagne" >	
									</div>


									<div id="question">
										<h3>Avez-vous des enfants ?</h3>
									</div>
									<div id="answer">
										<label for="answer35">Oui</label>
										<input type="radio" name="answer35" value="oui" >
										<label for="answer35">Non</label>
										<input type="radio" name="answer35" value="non" >	
									</div>


									<div id="question">
										<h3>Si oui, combien ?</h3>
									</div>
									<div id="answer">
										<label for="answer36">Précisez</label>
										<input type="number" name="answer36" placeholder="nombre d'enfants..." >
									</div>

									<div id="question">
										<h3>Quels âges ont-ils ?</h3>
									</div>
									<div id="answer">
										<label for="answer37">Précisez</label>
										<input type="text" name="answer37" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Avez-vous des animaux de compagnie ?</h3>
									</div>
									<div id="answer">
										<label for="answer38">Oui</label>
										<input type="radio" name="answer38" value="oui" >
										<label for="answer38">Non</label>
										<input type="radio" name="answer38" value="non" >	
									</div>

									<div id="question">
										<h3>Aimez-vous votre environnement de vie ?</h3>
									</div>
									<div id="answer">
										<label for="answer39">Oui</label>
										<input type="radio" name="answer39" value="oui" >
										<label for="answer39">Non</label>
										<input type="radio" name="answer39" value="non" >	
									</div>


									<div id="question">
										<h3>Rencontrez-vous un stress ou une pression dans votre environnement familial ?</h3>
									</div>
									<div id="answer">
										<label for="answer40">Oui</label>
										<input type="radio" name="answer40" value="oui" >
										<label for="answer40">Non</label>
										<input type="radio" name="answer40" value="non" >	
									</div>
									
									<div id="question">
										<h3>Décrivez une journée</h3>
									</div>
									<div id="answer">
										<label for="answer41">Décrivez</label>
										<input type="text" name="answer41" placeholder="Décrivez..." >
									</div>	


									<div id="question">
										<h3>Pensez-vous à aérer vos pièces de vie quotidiennement ?</h3>
									</div>
									<div id="answer">
										<label for="answer42">Oui</label>
										<input type="radio" name="answer42" value="oui" >
										<label for="answer42">Non</label>
										<input type="radio" name="answer42" value="non" >	
									</div>


									<div id="question">
										<h3>Utilisez-vous dans votre quotidien des produits naturels et/ou bio ?</h3>
									</div>
									<div id="answer">
										<label for="answer43">Oui</label>
										<input type="radio" name="answer43" value="oui" >
										<label for="answer43">Non</label>
										<input type="radio" name="answer43" value="non" >	
									</div>

									<div id="question">
										<h3>Prenez-vous du temps pour vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer44">Oui</label>
										<input type="radio" name="answer44" value="oui" >
										<label for="answer44">Non</label>
										<input type="radio" name="answer44" value="non" >	
									</div>

									<div id="question">
										<h3>Avez-vous des loisirs ?</h3>
									</div>
									<div id="answer">
										<label for="answer45">Oui</label>
										<input type="radio" name="answer45" value="oui" >
										<label for="answer45">Non</label>
										<input type="radio" name="answer45" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, lesquels ?</h3>
									</div>
									<div id="answer">
										<label for="answer46">Précisez</label>
										<input type="text" name="answer46" placeholder="Précisez..." >
									</div>


									<div id="question">
										<h3>A quelle fréquence, pratiquez-vous vos loisirs ?</h3>
									</div>
									<div id="answer">
										<label for="answer47">Quotidiennement</label>
										<input type="radio" name="answer47" value="Quotidiennement" >
										<label for="answer47">plusieurs fois par semaine</label>
										<input type="radio" name="answer47" value="plusieurs fois par semaine" >
										<label for="answer47">une fois par semaine</label>
										<input type="radio" name="answer47" value="une fois par semaine" >
										<label for="answer47">autre</label>
										<input type="radio" name="answer47" id="other47"  value="other" onclick="enableBox('47')">
										<input id="otheranswer47" type="text" onchange="changeradioother('47')" disabled>	
									</div>

									<div id="question">
										<h3>Pratiquez-vous une activité physique ?</h3>
									</div>
									<div id="answer">
										<label for="answer48">Oui</label>
										<input type="radio" name="answer48" value="oui" >
										<label for="answer48">Non</label>
										<input type="radio" name="answer48" value="non" >	
									</div>

									<div id="question">
										<h3>Laquelle/lesquelles ?</h3>
									</div>
									<div id="answer">
										<label for="answer49">Précisez</label>
										<input type="text" name="answer49" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Combien de fois par semaine ?</h3>
									</div>
									<div id="answer">
										<label for="answer50">Précisez</label>
										<input type="text" name="answer50" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Quelles sont vos activités en vacances ?</h3>
									</div>
									<div id="answer">
										<label for="answer51">Restaurants</label>
										<input type="radio" name="answer51" value="Restaurants" >
										<label for="answer51">Randonnée</label>
										<input type="radio" name="answer51" value="Randonnée" >
										<label for="answer51">promenade</label>
										<input type="radio" name="answer51" value="promenade" >
										<label for="answer51">ski</label>
										<input type="radio" name="answer51" value="ski" >
										<label for="answer51">plage</label>
										<input type="radio" name="answer51" value="plage" >
										<label for="answer51">massage</label>
										<input type="radio" name="answer51" value="massage" >
										<label for="answer51">détente</label>
										<input type="radio" name="answer51" value="détente" >
										<label for="answer51">autre</label>
										<input type="radio" name="answer51" id="other51"  value="other" onclick="enableBox('51')">
										<input id="otheranswer51" type="text" onchange="changeradioother('51')" disabled>	
									</div>

									<div id="question">
										<h3>Combien de fois par an prenez-vous des vacances ?</h3>
									</div>
									<div id="answer">
										<label for="answer52">Précisez</label>
										<input type="number" name="answer52" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Vous sentez vous reposé une fois rentrer de vacances ?</h3>
									</div>
									<div id="answer">
										<label for="answer52">Oui</label>
										<input type="radio" name="answer52" value="oui" >
										<label for="answer52">Non</label>
										<input type="radio" name="answer52" value="non" >	
									</div>

									<div id="question">
										<h3>Quels sont vos rêves, vos projets ?</h3>
									</div>
									<div id="answer">
										<label for="answer53">Précisez</label>
										<input type="number" name="answer53" placeholder="Précisez..." >
									</div>
							<?php
								}

								if ($bloc3 == 1) 
								{
							?>
									<label for="box3">3. Vie professionnelle</label>

									<div id="question">
										<h3>Quelle est votre profession ?</h3>
									</div>
									<div id="answer">
										<label for="answer54">Précisez</label>
										<input type="text" name="answer54" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Depuis quand l’exercez-vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer55">Précisez</label>
										<input type="text" name="answer55" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Quels sont vos précédentes activités professionnelles ?</h3>
									</div>
									<div id="answer">
										<label for="answer56">Précisez</label>
										<input type="text" name="answer56" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Etes-vous épanoui dans votre activité professionnelle ?</h3>
									</div>
									<div id="answer">
										<label for="answer57">Oui</label>
										<input type="radio" name="answer57" value="oui" >
										<label for="answer57">Non</label>
										<input type="radio" name="answer57" value="non" >	
									</div>

									<div id="question">
										<h3>Combien d’heures par semaine travaillez-vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer58">Précisez</label>
										<input type="number" name="answer58" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Quelle est l’amplitude horaire ?</h3>
									</div>
									<div id="answer">
										<label for="answer59">Précisez</label>
										<input type="text" name="answer59" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Vous travaillez :</h3>
									</div>
									<div id="answer">
										<label for="answer60">en extérieur</label>
										<input type="radio" name="answer60" value="en extérieur" >
										<label for="answer60">en intérieur</label>
										<input type="radio" name="answer60" value="en intérieur" >
										<label for="answer60">les deux</label>
										<input type="radio" name="answer60" value="les deux" >
									</div>

									<div id="question">
										<h3>Etes-vous en position assise toute la journée ?</h3>
									</div>
									<div id="answer">
										<label for="answer61">Oui</label>
										<input type="radio" name="answer61" value="oui" >
										<label for="answer61">Non</label>
										<input type="radio" name="answer61" value="non" >	
									</div>

									<div id="question">
										<h3>Bougez-vous régulièrement ?</h3>
									</div>
									<div id="answer">
										<label for="answer62">Oui</label>
										<input type="radio" name="answer62" value="oui" >
										<label for="answer62">Non</label>
										<input type="radio" name="answer62" value="non" >	
									</div>

									<div id="question">
										<h3>Etes-vous face à un écran toute la journée ?</h3>
									</div>
									<div id="answer">
										<label for="answer63">Oui</label>
										<input type="radio" name="answer63" value="oui" >
										<label for="answer63">Non</label>
										<input type="radio" name="answer63" value="non" >	
									</div>

									<div id="question">
										<h3>Etes-vous exposer à des produits chimiques ?</h3>
									</div>
									<div id="answer">
										<label for="answer64">Oui</label>
										<input type="radio" name="answer64" value="oui" >
										<label for="answer64">Non</label>
										<input type="radio" name="answer64" value="non" >	
									</div>

									<div id="question">
										<h3>Portez-vous des charges lourdes ?</h3>
									</div>
									<div id="answer">
										<label for="answer65">Oui</label>
										<input type="radio" name="answer65" value="oui" >
										<label for="answer65">Non</label>
										<input type="radio" name="answer65" value="non" >	
									</div>

									<div id="question">
										<h3>Est-ce que vous effectué des mouvements répétés ?</h3>
									</div>
									<div id="answer">
										<label for="answer66">Oui</label>
										<input type="radio" name="answer66" value="oui" >
										<label for="answer66">Non</label>
										<input type="radio" name="answer66" value="non" >	
									</div>

									<div id="question">
										<h3>Quels types de mouvements ?</h3>
									</div>
									<div id="answer">
										<label for="answer67">Précisez</label>
										<input type="text" name="answer67" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Ressentez-vous stress au travail ?</h3>
									</div>
									<div id="answer">
										<label for="answer68">Oui</label>
										<input type="radio" name="answer68" value="oui" >
										<label for="answer68">Non</label>
										<input type="radio" name="answer68" value="non" >	
									</div>

									<div id="question">
										<h3>Avez-vous une bonne relation avec vos collègues/client/hiérarchie ?</h3>
									</div>
									<div id="answer">
										<label for="answer69">Oui</label>
										<input type="radio" name="answer69" value="oui" >
										<label for="answer69">Non</label>
										<input type="radio" name="answer69" value="non" >	
									</div>

									<div id="question">
										<h3>Comment se passe le temps du déjeuner lorsque vous travaillez ?</h3>
									</div>
									<div id="answer">
										<label for="answer70">possibilité de restauration sur place (cantine, self)</label>
										<input type="radio" name="answer70" value="possibilité de restauration sur place (cantine, self)" >
										<label for="answer70">possibilité d’apporter votre repas</label>
										<input type="radio" name="answer70" value="possibilité d’apporter votre repas" >
										<label for="answer70">restaurants</label>
										<input type="radio" name="answer70" value="restaurants" >
										<label for="answer70">autre</label>
										<input type="radio" name="answer70" id="other70"  value="other" onclick="enableBox('70')">
										<input id="otheranswer70" type="text" onchange="changeradioother('70')" disabled>
									</div>
							<?php
								}

								if ($bloc4 == 1) 
								{
							?> 

									<h2>SYSTEME DIGESTIF</h2>
									<label for="box4">1. Alimentation</label>
									<div id="question">
										<h3>Comment réalisez-vous vos courses alimentaires ? </h3>
									</div>
									<div id="answer">
										<label for="answer71">sur internet</label>
										<input type="radio" name="answer71" value="sur internet" >
										<label for="answer71">en drive</label>
										<input type="radio" name="answer71" value="en drive" >
										<label for="answer71">en magasin</label>
										<input type="radio" name="answer71" value="en magasin" >
										<label for="answer71">au marché</label>
										<input type="radio" name="answer71" value="au marché" >
										<label for="answer71">directement chez le producteur</label>
										<input type="radio" name="answer71" value="directement chez le producteur" >
										<label for="answer71"></label>
									</div>

									<div id="question">
										<h3>Où achetez-vous vos compléments alimentaires ?</h3>
									</div>
									<div id="answer">
										<label for="answer72">pharmacie</label>
										<input type="radio" name="answer72" value="pharmacie" >
										<label for="answer72">parapharmacie</label>
										<input type="radio" name="answer72" value="parapharmacie" >
										<label for="answer72">magasin bio</label>
										<input type="radio" name="answer72" value="magasin bio" >
										<label for="answer72">internet</label>
										<input type="radio" name="answer72" value="internet" >
										<label for="answer72">autre</label>
										<input type="radio" name="answer72" id="other72"  value="other" onclick="enableBox('72')">
										<input id="otheranswer72" type="text" onchange="changeradioother('72')" disabled>
									</div>

									<div id="question">
										<h3>Suivez-vous un régime alimentaire particulier ?</h3>
									</div>
									<div id="answer">
										<label for="answer73">Oui</label>
										<input type="radio" name="answer73" value="oui" >
										<label for="answer73">Non</label>
										<input type="radio" name="answer73" value="non" >	
									</div>		

									<div id="question">
										<h3>Si oui lequel ?</h3>
									</div>
									<div id="answer">
										<label for="answer73">Végétarien</label>
										<input type="radio" name="answer73" value="Végétarien" >
										<label for="answer73">Végan</label>
										<input type="radio" name="answer73" value="Végan" >
										<label for="answer73">halal</label>
										<input type="radio" name="answer73" value="halal" >
										<label for="answer73">kärcher</label>
										<input type="radio" name="answer73" value="kärcher" >
										<label for="answer73">autre</label>
										<input type="radio" name="answer73" id="other73"  value="other" onclick="enableBox('73')">
										<input id="otheranswer73" type="text" onchange="changeradioother('73')" disabled>
									</div>			

									<div id="question">
										<h3>Manger est pour vous :</h3>
									</div>
									<div id="answer">
										<label for="answer74">un plaisir</label>
										<input type="radio" name="answer74" value="un plaisir" >
										<label for="answer74">une formalité</label>
										<input type="radio" name="answer74" value="une formalité" >
										<label for="answer74">une contrainte</label>
										<input type="radio" name="answer74" value="une contrainte" >
									</div> 

									<div id="question">
										<h3>Aimez-vous cuisiner ?</h3>
									</div>
									<div id="answer">
										<label for="answer75">Oui</label>
										<input type="radio" name="answer75" value="oui" >
										<label for="answer75">Non</label>
										<input type="radio" name="answer75" value="non" >	
									</div>

									<div id="question">
										<h3>Prenez-vous une collation/grignotage dans la journée ?</h3>
									</div>
									<div id="answer">
										<label for="answer76">Oui</label>
										<input type="radio" name="answer76" value="oui" >
										<label for="answer76">Non</label>
										<input type="radio" name="answer76" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, à quel moment ?</h3>
									</div>
									<div id="answer">
										<label for="answer77">le matin</label>
										<input type="radio" name="answer77" value="le matin" >
										<label for="answer77">l’après-midi</label>
										<input type="radio" name="answer77" value="l’après-midi" >
										<label for="answer77">les deux</label>
										<input type="radio" name="answer77" value="les deux" >
									</div> 


									<div id="question">
										<h3>Qu’avez-vous l’habitude de prendre comme collation ?</h3>
									</div>
									<div id="answer">
										<label for="answer78">plutôt salé (fromage, charcuterie, sandwich, etc.)</label>
										<input type="radio" name="answer78" value="plutôt salé (fromage, charcuterie, sandwich, etc.)" >
										<label for="answer78">plutôt sucré (yaourt, compote, fruits, biscuits industriels, viennoiserie, chocolat, etc.)</label>
										<input type="radio" name="answer78" value="plutôt sucré (yaourt, compote, fruits, biscuits industriels, viennoiserie, chocolat, etc.)" >
										<label for="answer78">les deux</label>
										<input type="radio" name="answer78" value="les deux" >
										<label for="answer78">autre</label>
										<input type="radio" name="answer78" id="other78"  value="other" onclick="enableBox('78')">
										<input id="otheranswer78" type="text" onchange="changeradioother('78')" disabled>
									</div>

									<div id="question">
										<h3>Dans quelles conditions prenez-vous votre repas ?</h3>
									</div>
									<div id="answer">
										<label for="answer79">au travail</label>
										<input type="radio" name="answer79" value="au travail" >
										<label for="answer79">à la maison</label>
										<input type="radio" name="answer79" value="à la maison" >
										<label for="answer79">dans le bruit</label>
										<input type="radio" name="answer79" value="dans le bruit" >
										<label for="answer79">dans le calme</label>
										<input type="radio" name="answer79" value="dans le calme" >
										<label for="answer79">à table</label>
										<input type="radio" name="answer79" value="à table" >
										<label for="answer79">plateau télé</label>
										<input type="radio" name="answer79" value="plateau télé" >
										<label for="answer79">autre</label>
										<input type="radio" name="answer79" id="other79"  value="other" onclick="enableBox('79')">
										<input id="otheranswer79" type="text" onchange="changeradioother('79')" disabled>
									</div>


									<div id="question">
										<h3>Quel est la durée moyenne de votre repas ?</h3>
									</div>
									<div id="answer">
										<label for="answer80">< 10 min</label>
										<input type="radio" name="answer80" value="< 10 min" >
										<label for="answer80">10-20 min</label>
										<input type="radio" name="answer80" value="10-20 min" >
										<label for="answer80">20-30min</label>
										<input type="radio" name="answer80" value="20-30min" >
										<label for="answer80">>30 min</label>
										<input type="radio" name="answer80" value=">30 min" >
									</div>

									<div id="question">
										<h3>Consommez-vous des plats industriels ?</h3>
									</div>
									<div id="answer">
										<label for="answer81">Oui</label>
										<input type="radio" name="answer81" value="oui" >
										<label for="answer81">Non</label>
										<input type="radio" name="answer81" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, fréquence ?</h3>
									</div>
									<div id="answer">
										<label for="answer82">Quotidiennement</label>
										<input type="radio" name="answer82" value="Quotidiennement" >
										<label for="answer82">fréquemment</label>
										<input type="radio" name="answer82" value="fréquemment" >
										<label for="answer82">occasionnellement</label>
										<input type="radio" name="answer82" value="occasionnellement" >
										<label for="answer82">très rarement</label>
										<input type="radio" name="answer82" value=">très rarement" >
									</div>

										<div id="question">
										<h3>Si oui, quels types ?</h3>
									</div>
									<div id="answer">
										<label for="answer83">plats surgelées</label>
										<input type="radio" name="answer83" value="plats surgelées" >
										<label for="answer83">plats préparés</label>
										<input type="radio" name="answer83" value="plats préparés" >
										<label for="answer83">poêlée surgelée</label>
										<input type="radio" name="answer83" value="poêlée surgelée" >
										<label for="answer83">autre</label>
										<input type="radio" name="answer83" id="other83"  value="other" onclick="enableBox('83')">
										<input id="otheranswer83" type="text" onchange="changeradioother('83')" disabled>
									</div>


									<div id="question">
										<h3>En moyenne, vous mangez dans les fast-foods ?</h3>
									</div>
									<div id="answer">
										<label for="answer84">plusieurs fois par semaine</label>
										<input type="radio" name="answer84" value="plusieurs fois par semaine" >
										<label for="answer84">plusieurs fois par mois</label>
										<input type="radio" name="answer84" value="plusieurs fois par mois" >
										<label for="answer84">quelques fois par an</label>
										<input type="radio" name="answer84" value="quelques fois par an" >
									</div>

									<div id="question">
										<h3>En moyenne, vous mangez au restaurant ?</h3>
									</div>
									<div id="answer">
										<label for="answer85">plusieurs fois par semaine</label>
										<input type="radio" name="answer85" value="plusieurs fois par semaine" >
										<label for="answer85">plusieurs fois par mois</label>
										<input type="radio" name="answer85" value="plusieurs fois par mois" >
										<label for="answer85">quelques fois par an</label>
										<input type="radio" name="answer85" value="quelques fois par an" >
									</div>

									<div id="question">
										<h3>En moyenne, vous mangez au restaurant d’entreprise ?</h3>
									</div>
									<div id="answer">
										<label for="answer86">tous les jours</label>
										<input type="radio" name="answer86" value="tous les jours" >
										<label for="answer86">plusieurs fois par semaine</label>
										<input type="radio" name="answer86" value="plusieurs fois par semaine" >
										<label for="answer86">une ou deux fois par semaine</label>
										<input type="radio" name="answer86" value="une ou deux fois par semaine" >
									</div>

									<div id="question">
										<h3>Utilisez-vous des coupes faim ? ou des substituts de repas ?</h3>
									</div>
									<div id="answer">
										<label for="answer87">Oui</label>
										<input type="radio" name="answer87" value="oui" >
										<label for="answer87">Non</label>
										<input type="radio" name="answer87" value="non" >	
									</div>

									<div id="question">
										<h3>En moyenne, combien de fois par semaine/par jour consommez-vous de la viande rouge ?</h3>
									</div>
									<div id="answer">
										<label for="answer88">Précisez</label>
										<input type="text" name="answer88" placeholder="précisez..." >	
									</div>

									<div id="question">
										<h3>Quel type de viandes rouges ?</h3>
									</div>
									<div id="answer">
										<label for="answer89">Précisez</label>
										<input type="text" name="answer89" placeholder="précisez..." >	
									</div>

									<div id="question">
										<h3>En moyenne, combien de fois par semaine/par jour consommez-vous du poisson/des fruits de mer ?</h3>
									</div>
									<div id="answer">
										<label for="answer90">Précisez</label>
										<input type="text" name="answer90" placeholder="précisez..." >	
									</div>

									<div id="question">
										<h3>Quel type de poissons ou fruits de mer ?</h3>
									</div>
									<div id="answer">
										<label for="answer91">Précisez</label>
										<input type="text" name="answer91" placeholder="précisez..." >	
									</div>

									<div id="question">
										<h3>En moyenne, combien de fois par semaine/par jour consommez-vous du lait ou/et des produits laitiers ?</h3>
									</div>
									<div id="answer">
										<label for="answer92">Précisez</label>
										<input type="text" name="answer92" placeholder="précisez..." >	
									</div>

									<div id="question">
										<h3>Ce sont des produits au lait de :</h3>
									</div>
									<div id="answer">
										<label for="answer93">vache</label>
										<input type="radio" name="answer93" value="vache" >
										<label for="answer93">brebis/chèvre</label>
										<input type="radio" name="answer93" value="brebis/chèvre" >
										<label for="answer93">autre</label>
										<input type="radio" name="answer93" id="other93"  value="other" onclick="enableBox('93')">
										<input id="otheranswer93" type="text" onchange="changeradioother('93')" disabled>
									</div>
									 
									<div id="question">
										<h3>En moyenne, combien de fois par semaine/par jour consommez-vous du pain ou des produits céréaliers ?</h3>
									</div>
									<div id="answer">
										<label for="answer94">Précisez</label>
										<input type="text" name="answer94" placeholder="précisez..." >	
									</div>

									<div id="question">
										<h3>En moyenne, combien de fois par semaine/par jour consommez-vous des légumineuses ?</h3>
									</div>
									<div id="answer">
										<label for="answer95">Précisez</label>
										<input type="text" name="answer95" placeholder="précisez..." >	
									</div>

									<div id="question">
										<h3>Consommez-vous des produits bio ?</h3>
									</div>
									<div id="answer">
										<label for="answer96">Oui</label>
										<input type="radio" name="answer96" value="oui" >
										<label for="answer96">Non</label>
										<input type="radio" name="answer96" value="non" >	
									</div>

									<div id="question">
										<h3>Quels types de produits bio ?</h3>
									</div>
									<div id="answer">
										<label for="answer97">Précisez</label>
										<input type="text" name="answer97" placeholder="précisez..." >	
									</div>

									<div id="question">
										<h3>Avez-vous des allergies alimentaires ?</h3>
									</div>
									<div id="answer">
										<label for="answer98">Oui</label>
										<input type="radio" name="answer98" value="oui" >
										<label for="answer98">Non</label>
										<input type="radio" name="answer98" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, lesquelles ?</h3>
									</div>
									<div id="answer">
										<label for="answer99">Précisez</label>
										<input type="text" name="answer99" placeholder="précisez..." >	
									</div>	

									<div id="question">
										<h3>Avez-vous des addictions alimentaires ?</h3>
									</div>
									<div id="answer">
										<label for="answer100">Oui</label>
										<input type="radio" name="answer100" value="oui" >
										<label for="answer100">Non</label>
										<input type="radio" name="answer100" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, lesquelles ?</h3>
									</div>
									<div id="answer">
										<label for="answer101">Précisez</label>
										<input type="text" name="answer101" placeholder="précisez..." >	
									</div>

									<div id="question">
										<h3>Quelle quantité d’eau buvez-vous au quotidien ?</h3>
									</div>
									<div id="answer">
										<label for="answer102">moins 1,5L/jour</label>
										<input type="radio" name="answer102" value="moins 1,5L/jour" >
										<label for="answer102">entre 1,5L et 2L/jour</label>
										<input type="radio" name="answer102" value="entre 1,5L et 2L/jour" >
										<label for="answer102">plus de 2L/jour</label>
										<input type="radio" name="answer102" value="plus de 2L/jour" >
									</div>

									<div id="question">
										<h3>Vous vous hydratez plutôt :</h3>
									</div>
									<div id="answer">
										<label for="answer103">pendant les repas</label>
										<input type="radio" name="answer103" value="pendant les repas" >
										<label for="answer103">en dehors de repas</label>
										<input type="radio" name="answer103" value="en dehors de repas" >
										<label for="answer103">les deux</label>
										<input type="radio" name="answer103" value="les deux" >
									</div>

									<div id="question">
										<h3>Quelles boissons consommez-vous au quotidien ?</h3>
									</div>
									<div id="answer">
										<label for="answer104">eau plate</label>
										<input type="radio" name="answer104" value="eau plate" >
										<label for="answer104">eau aromatisée</label>
										<input type="radio" name="answer104" value="eau aromatisée" >
										<label for="answer104">eau gazeuse</label>
										<input type="radio" name="answer104" value="eau gazeuse" >
										<label for="answer104">tisane</label>
										<input type="radio" name="answer104" value="tisane" >
										<label for="answer104">autre</label>
										<input type="radio" name="answer104" id="other104"  value="other" onclick="enableBox('104')">
										<input id="otheranswer104" type="text" onchange="changeradioother('104')" disabled>
									</div>	

									<div id="question">
										<h3>En moyenne à quelle fréquence consommez-vous des boissons sucrées ?</h3>
									</div>
									<div id="answer">
										<label for="answer105">Quotidiennement</label>
										<input type="radio" name="answer105" value="Quotidiennement" >
										<label for="answer105">fréquemment</label>
										<input type="radio" name="answer105" value="fréquemment" >
										<label for="answer105">occasionnellement</label>
										<input type="radio" name="answer105" value="occasionnellement" >
										<label for="answer105">très rarement</label>
										<input type="radio" name="answer105" value="très rarement" >
									</div>
									
									<div id="question">
										<h3>Y a-t-il des aliments que vous n’aimez pas du tout ?</h3>
									</div>
									<div id="answer">
										<label for="answer106">Précisez</label>
										<input type="text" name="answer106" placeholder="précisez..." >	
									</div>

									<div id="question">
										<h3>Etes-vous fumeur ?</h3>
									</div>
									<div id="answer">
										<label for="answer107">Oui</label>
										<input type="radio" name="answer107" value="oui" >
										<label for="answer107">Non</label>
										<input type="radio" name="answer107" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, depuis combien de temps ?</h3>
									</div>
									<div id="answer">
										<label for="answer108">Précisez</label>
										<input type="text" name="answer108" placeholder="précisez..." >	
									</div>

									<div id="question">
										<h3>Combien par jour ?</h3>
									</div>
									<div id="answer">
										<label for="answer109">Précisez</label>
										<input type="text" name="answer109" placeholder="précisez..." >	
									</div>

									<div id="question">
										<h3>Si non :</h3>
									</div>
									<div id="answer">
										<label for="answer110">arrêt récent (moins d’un an)</label>
										<input type="radio" name="answer110" value="arrêt récent (moins d’un an)" >
										<label for="answer110">arrêt depuis plusieurs années</label>
										<input type="radio" name="answer110" value="arrêt depuis plusieurs années" >
										<label for="answer110">vous n’avez jamais fumé</label>
										<input type="radio" name="answer110" value="vous n’avez jamais fumé" >
										<label for="answer110">très rarement</label>
										<input type="radio" name="answer110" value="très rarement" >
									</div>

									<div id="question">
										<h3>Quelle marque avez-vous l’habitude de consommer ?</h3>
									</div>
									<div id="answer">
										<label for="answer111">Malboro</label>
										<input type="radio" name="answer111" value="Malboro" >
										<label for="answer111">Lucky strike</label>
										<input type="radio" name="answer111" value="Lucky strike" >
										<label for="answer111">Camel</label>
										<input type="radio" name="answer111" value="Camel" >
										<label for="answer111">Gitanes maïs</label>
										<input type="radio" name="answer111" value="Gitanes maïs" >
										<label for="answer111">Vogue</label>
										<input type="radio" name="answer111" value="Vogue" >
										<label for="answer111">autre</label>
										<input type="radio" name="answer111" id="other111"  value="other" onclick="enableBox('111')">
										<input id="otheranswer111" type="text" onchange="changeradioother('111')" disabled>
									</div>

									<div id="question">
										<h3>Consommez-vous du café ?</h3>
									</div>
									<div id="answer">
										<label for="answer112">Oui</label>
										<input type="radio" name="answer112" value="oui" >
										<label for="answer112">Non</label>
										<input type="radio" name="answer112" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, combien par jour ?</h3>
									</div>
									<div id="answer">
										<label for="answer113">Précisez</label>
										<input type="text" name="answer113" placeholder="précisez..." >	
									</div>
									
									<div id="question">
										<h3>Consommez-vous du thé ?</h3>
									</div>
									<div id="answer">
										<label for="answer114">Oui</label>
										<input type="radio" name="answer114" value="oui" >
										<label for="answer114">Non</label>
										<input type="radio" name="answer114" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, combien par jour ?</h3>
									</div>
									<div id="answer">
										<label for="answer115">Précisez</label>
										<input type="text" name="answer115" placeholder="précisez..." >	
									</div>

									<div id="question">
										<h3>Consommez-vous de l’alcool ?</h3>
									</div>
									<div id="answer">
										<label for="answer116">Oui</label>
										<input type="radio" name="answer116" value="oui" >
										<label for="answer116">Non</label>
										<input type="radio" name="answer116" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui :</h3>
									</div>
									<div id="answer">
										<label for="answer117">quotidiennement</label>
										<input type="radio" name="answer117" value="quotidiennement" >
										<label for="answer117">régulièrement (au moins 1 fois/semaine)</label>
										<input type="radio" name="answer117" value="régulièrement (au moins 1 fois/semaine)" >
										<label for="answer117">occasionnellement (1 fois/mois)</label>
										<input type="radio" name="answer117" value="occasionnellement (1 fois/mois)" >
									</div>

									<div id="question">
										<h3>Quels types d’alcool consommez-vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer118">Bières</label>
										<input type="radio" name="answer118" value="Bières" >
										<label for="answer118">vins</label>
										<input type="radio" name="answer118" value="vins" >
										<label for="answer118">spiritueux</label>
										<input type="radio" name="answer118" value="spiritueux" >
									</div>

									<div id="question">
										<h3>Avez-vous déjà consommé des produits stupéfiants ?</h3>
									</div>
									<div id="answer">
										<label for="answer119">Oui</label>
										<input type="radio" name="answer119" value="oui" >
										<label for="answer119">Non</label>
										<input type="radio" name="answer119" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, à lesquels ?</h3>
									</div>
									<div id="answer">
										<label for="answer120">Cannabis</label>
										<input type="radio" name="answer120" value="Cannabis" >
										<label for="answer120">cocaïne</label>
										<input type="radio" name="answer120" value="cocaïne" >
										<label for="answer120">LSD</label>
										<input type="radio" name="answer120" value="LSD" >
										<label for="answer120">autre</label>
										<input type="radio" name="answer120" id="other120"  value="other" onclick="enableBox('120')">
										<input id="otheranswer120" type="text" onchange="changeradioother('120')" disabled>
									</div>

									<div id="question">
										<h3>Consommez-vous des produits stupéfiants ?</h3>
									</div>
									<div id="answer">
										<label for="answer121">Oui</label>
										<input type="radio" name="answer121" value="oui" >
										<label for="answer121">Non</label>
										<input type="radio" name="answer121" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, à quelle fréquence ?</h3>
									</div>
									<div id="answer">
										<label for="answer122">quotidiennement</label>
										<input type="radio" name="answer122" value="quotidiennement" >
										<label for="answer122">régulièrement (au moins 1 fois/semaine)</label>
										<input type="radio" name="answer122" value="régulièrement (au moins 1 fois/semaine)" >
										<label for="answer122">occasionnellement (1 fois/mois)</label>
										<input type="radio" name="answer122" value="occasionnellement (1 fois/mois)" >	
									</div>
							<?php
								}

								if ($bloc5 == 1) 
								{
							?>
									<label for="box5">2. Digestion - transit</label>
									
									<div id="question">
										<h3>Vous a-t-on diagnostiqué une pathologie digestive ?</h3>
									</div>
									<div id="answer">
										<label for="answer122">Oui</label>
										<input type="radio" name="answer122" value="oui" >
										<label for="answer122">Non</label>
										<input type="radio" name="answer122" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, laquelle ?</h3>
									</div>
									<div id="answer">
										<label for="answer123">SIBO</label>
										<input type="radio" name="answer123" value="SIBO" >
										<label for="answer123">SII</label>
										<input type="radio" name="answer123" value="SII" >
										<label for="answer123">MALADIE COELIAQUE</label>
										<input type="radio" name="answer123" value="MALADIE COELIAQUE" >
										<label for="answer123">maladie de Crohn</label>
										<input type="radio" name="answer123" value="maladie de Crohn" >
										<label for="answer123">rectocolite hémorragique</label>
										<input type="radio" name="answer123" value="rectocolite hémorragique" >	
									</div>

									<div id="question">
										<h3>Comment qualifieriez-vous votre digestion ?</h3>
									</div>
									<div id="answer">
										<label for="answer124">Bonne</label>
										<input type="radio" name="answer124" value="Bonne" >
										<label for="answer124">mauvaise</label>
										<input type="radio" name="answer124" value="mauvaise" >
										<label for="answer124">lente</label>
										<input type="radio" name="answer124" value="lente" >
										<label for="answer124">difficile</label>
										<input type="radio" name="answer124" value="difficile" >
										<label for="answer124">douloureuse</label>
										<input type="radio" name="answer124" value="douloureuse" >	
									</div>

									<div id="question">
										<h3>La digestion vous provoque-t-elle :</h3>
									</div>
									<div id="answer">
										<label for="answer125">des ballonnements</label>
										<input type="radio" name="answer125" value="des ballonnements" >
										<label for="answer125">gaz</label>
										<input type="radio" name="answer125" value="gaz" >
										<label for="answer125">flatulences</label>
										<input type="radio" name="answer125" value="flatulences" >
										<label for="answer125">bruit intestinaux</label>
										<input type="radio" name="answer125" value="bruit intestinaux" >
										<label for="answer125">autre</label>
										<input type="radio" name="answer125" id="other125"  value="other" onclick="enableBox('125')">
										<input id="otheranswer125" type="text" onchange="changeradioother('125')" disabled>
									</div>		

									<div id="question">
										<h3>Ressentez-vous des douleurs abdominales ?</h3>
									</div>
									<div id="answer">
										<label for="answer126">Oui</label>
										<input type="radio" name="answer126" value="oui" >
										<label for="answer126">Non</label>
										<input type="radio" name="answer126" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, fréquence ?</h3>
									</div>
									<div id="answer">
										<label for="answer127">quotidiennement</label>
										<input type="radio" name="answer127" value="quotidiennement" >
										<label for="answer127">régulièrement (au moins 1 fois/semaine)</label>
										<input type="radio" name="answer127" value="régulièrement (au moins 1 fois/semaine)" >
										<label for="answer127">occasionnellement (1 fois/mois)</label>
										<input type="radio" name="answer127" value="occasionnellement (1 fois/mois)" >
									</div>  

									<div id="question">
										<h3>Quelle est l’intensité ?</h3>
									</div>
									<div id="answer">
										<label for="answer128">faible</label>
										<input type="radio" name="answer128" value="faible" >
										<label for="answer128">modérée</label>
										<input type="radio" name="answer128" value="modérée" >
										<label for="answer128">intense</label>
										<input type="radio" name="answer128" value="intense" >
										<label for="answer128">extrêmement intense</label>
										<input type="radio" name="answer128" value="extrêmement intense" >
									</div>

									<div id="question">
										<h3>A quel endroit ?</h3>
									</div>
									<div id="answer">
										<label for="answer129">En bas, à droite</label>
										<input type="radio" name="answer129" value="En bas, à droite" >
										<label for="answer129">En bas, à gauche</label>
										<input type="radio" name="answer129" value="En bas, à gauche" >
										<label for="answer129">En haut, à droite</label>
										<input type="radio" name="answer129" value="En haut, à droite" >
										<label for="answer129">En haut, à gauche</label>
										<input type="radio" name="answer129" value="En haut, à gauche" >
										<label for="answer129">autre</label>
										<input type="radio" name="answer129" id="other129"  value="other" onclick="enableBox('129')">
										<input id="otheranswer129" type="text" onchange="changeradioother('129')" disabled>
									</div>

									<div id="question">
										<h3>Ressentez-vous des remontées acides ?</h3>
									</div>
									<div id="answer">
										<label for="answer130">Oui</label>
										<input type="radio" name="answer130" value="oui" >
										<label for="answer130">Non</label>
										<input type="radio" name="answer130" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, fréquence ?</h3>
									</div>
									<div id="answer">
										<label for="answer129">quotidiennement</label>
										<input type="radio" name="answer129" value="quotidiennement" >
										<label for="answer129">régulièrement (au moins 1 fois/semaine)</label>
										<input type="radio" name="answer129" value="régulièrement (au moins 1 fois/semaine)" >
										<label for="answer129">occasionnellement (1 fois/mois)</label>
										<input type="radio" name="answer129" value="occasionnellement (1 fois/mois)" >	
									</div>

									<div id="question">
										<h3>Quelle est l’intensité ?</h3>
									</div>
									<div id="answer">
										<label for="answer130">faible</label>
										<input type="radio" name="answer130" value="faible" >
										<label for="answer130">modérée</label>
										<input type="radio" name="answer130" value="modérée" >
										<label for="answer130">intense</label>
										<input type="radio" name="answer130" value="intense" >
										<label for="answer130">extrêmement intense</label>
										<input type="radio" name="answer130" value="extrêmement intense" >
									</div>

									<div id="question">
										<h3>Ressentez-vous des brûlures d’estomac ?</h3>
									</div>
									<div id="answer">
										<label for="answer131">Oui</label>
										<input type="radio" name="answer131" value="oui" >
										<label for="answer131">Non</label>
										<input type="radio" name="answer131" value="non" >	
									</div> 

									<div id="question">
										<h3>Si oui, fréquence ?</h3>
									</div>
									<div id="answer">
										<label for="answer132">quotidiennement</label>
										<input type="radio" name="answer132" value="quotidiennement" >
										<label for="answer132">régulièrement (au moins 1 fois/semaine)</label>
										<input type="radio" name="answer132" value="régulièrement (au moins 1 fois/semaine)" >
										<label for="answer132">occasionnellement (1 fois/mois)</label>
										<input type="radio" name="answer132" value="occasionnellement (1 fois/mois)" >	
									</div> 

									<div id="question">
										<h3>Si oui, fréquence ?</h3>
									</div>
									<div id="answer">
										<label for="answer133">quotidiennement</label>
										<input type="radio" name="answer133" value="quotidiennement" >
										<label for="answer133">régulièrement (au moins 1 fois/semaine)</label>
										<input type="radio" name="answer133" value="régulièrement (au moins 1 fois/semaine)" >
										<label for="answer133">occasionnellement (1 fois/mois)</label>
										<input type="radio" name="answer133" value="occasionnellement (1 fois/mois)" >	
									</div>

									<div id="question">
										<h3>Quelle est l’intensité ?</h3>
									</div>
									<div id="answer">
										<label for="answer134">faible</label>
										<input type="radio" name="answer134" value="faible" >
										<label for="answer134">modérée</label>
										<input type="radio" name="answer134" value="modérée" >
										<label for="answer134">intense</label>
										<input type="radio" name="answer134" value="intense" >
										<label for="answer134">extrêmement intense</label>
										<input type="radio" name="answer134" value="extrêmement intense" >
									</div>

									<div id="question">
										<h3>Ressentez une sensation d’inconfort après un repas copieux, gras, alcoolisé ?</h3>
									</div>
									<div id="answer">
										<label for="answer135">Oui</label>
										<input type="radio" name="answer135" value="oui" >
										<label for="answer135">Non</label>
										<input type="radio" name="answer135" value="non" >	
									</div>

									<div id="question">
										<h3>Etes-vous facilement sujet à des nausées, vomissements ?</h3>
									</div>
									<div id="answer">
										<label for="answer136">Oui</label>
										<input type="radio" name="answer136" value="oui" >
										<label for="answer136">Non</label>
										<input type="radio" name="answer136" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, fréquence ?</h3>
									</div>
									<div id="answer">
										<label for="answer137">quotidiennement</label>
										<input type="radio" name="answer137" value="quotidiennement" >
										<label for="answer137">régulièrement (au moins 1 fois/semaine)</label>
										<input type="radio" name="answer137" value="régulièrement (au moins 1 fois/semaine)" >
										<label for="answer137">occasionnellement (1 fois/mois)</label>
										<input type="radio" name="answer137" value="occasionnellement (1 fois/mois)" >	
									</div>

									<div id="question">
										<h3>A la suite d’un repas copieux, êtes-vous sujet à :</h3>
									</div>
									<div id="answer">
										<label for="answer138">des maux de têtes</label>
										<input type="radio" name="answer138" value="des maux de têtes" >
										<label for="answer138">une sensation de fatigue (somnolence)</label>
										<input type="radio" name="answer138" value="une sensation de fatigue (somnolence)" >
									</div>

									<div id="question">
										<h3>Avez-vous souvent la langue blanche, pâteuse ou une mauvaise haleine ?</h3>
									</div>
									<div id="answer">
										<label for="answer139">Oui</label>
										<input type="radio" name="answer139" value="oui" >
										<label for="answer139">Non</label>
										<input type="radio" name="answer139" value="non" >	
									</div>

									<div id="question">
										<h3>Concernant votre transit intestinal, vous direz que celui-ci est :</h3>
									</div>
									<div id="answer">
										<label for="answer139">régulier (1-2 fois/jour)</label>
										<input type="radio" name="answer139" value="régulier (1-2 fois/jour)" >
										<label for="answer139">tendance à la diarrhée (plusieurs fois/jour)</label>
										<input type="radio" name="answer139" value="tendance à la diarrhée (plusieurs fois/jour)" >
										<label for="answer139">tendance à la constipation (tous les 3-4 jours)</label>
										<input type="radio" name="answer139" value="tendance à la constipation (tous les 3-4 jours)" >
										<label for="answer139">tendance à la constipation chronique (supérieur à 5 jours)</label>
										<input type="radio" name="answer139" value="tendance à la constipation chronique (supérieur à 5 jours)" >
										<label for="answer139">alternance diarrhée constipation</label>
										<input type="radio" name="answer139" value="alternance diarrhée constipation" >
									</div> 


									<div id="question">
										<h3>Avez-vous déjà consommé des laxatifs (dulcolax, microlax, etc.) ou des compléments alimentaires (fucus, psyllium, etc.) ?</h3>
									</div>
									<div id="answer">
										<label for="answer140">Oui</label>
										<input type="radio" name="answer140" value="oui" >
										<label for="answer140">Non</label>
										<input type="radio" name="answer140" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, de manière :</h3>
									</div>
									<div id="answer">
										<label for="answer141">occasionnelle</label>
										<input type="radio" name="answer141" value="occasionnelle" >
										<label for="answer141">récurrente</label>
										<input type="radio" name="answer141" value="récurrente" >
										<label for="answer141">permanente</label>
										<input type="radio" name="answer141" value="permanente" >
									</div>
							<?php
								}

								if ($bloc6 == 1) 
								{

							?>
									<h2>III. SYSTEME RESPIRATOIRE - ORL</h2>
									<label for="box6">1. ORL</label>	 
									
									<div id="question">
										<h3>Avez-vous une sensibilité particulière aux infections hivernales ?</h3>
									</div>
									<div id="answer">
										<label for="answer142">Oui</label>
										<input type="radio" name="answer142" value="oui" >
										<label for="answer142">Non</label>
										<input type="radio" name="answer142" value="non" >	
									</div>

										 
									
									<div id="question">
										<h3>Si oui, quelle période ?</h3>
									</div>
									<div id="answer">
										<label for="answer143">Précisez</label>
										<input type="text" name="answer143" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Combien de fois/an ?</h3>
									</div>
									<div id="answer">
										<label for="answer144">Précisez</label>
										<input type="text" name="answer144" value="" placeholder="Précisez..." >
									</div>  

									<div id="question">
										<h3>Toussez-vous fréquemment ?</h3>
									</div>
									<div id="answer">
										<label for="answer145">Oui</label>
										<input type="radio" name="answer145" value="oui" >
										<label for="answer145">Non</label>
										<input type="radio" name="answer145" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui :</h3>
									</div>
									<div id="answer">
										<label for="answer146">Plutôt le matin</label>
										<input type="radio" name="answer146" value="Plutôt le matin" >
										<label for="answer146">l’après midi</label>
										<input type="radio" name="answer146" value="l’après midi" >
										<label for="answer146">en fin de journée</label>
										<input type="radio" name="answer146" value="en fin de journée" >
										<label for="answer146">la nuit</label>
										<input type="radio" name="answer146" value="la nuit" >
									</div>

									<div id="question">
										<h3>Est-ce plutôt une toux :</h3>
									</div>
									<div id="answer">
										<label for="answer147">grasse</label>
										<input type="radio" name="answer147" value="grasse" >
										<label for="answer147">sèche</label>
										<input type="radio" name="answer147" value="sèche " >
									</div> 

									<div id="question">
										<h3>Prenez-vous des sirops ou autres pour calmer cette toux ?</h3>
									</div>
									<div id="answer">
										<label for="answer148">toplexil</label>
										<input type="radio" name="answer148" value="toplexil" >
										<label for="answer148">humex</label>
										<input type="radio" name="answer148" value="humex" >
										<label for="answer148">clarix</label>
										<input type="radio" name="answer148" value="clarix" >
										<label for="answer148">autre</label>
										<input type="radio" name="answer148" id="other148"  value="other" onclick="enableBox('148')">
										<input id="otheranswer148" type="text" onchange="changeradioother('148')" disabled>
									</div> 

									<div id="question">
										<h3>Votre nez coule-t-il régulièrement ?</h3>
									</div>
									<div id="answer">
										<label for="answer149">Oui</label>
										<input type="radio" name="answer149" value="oui" >
										<label for="answer149">Non</label>
										<input type="radio" name="answer149" value="non" >	
									</div>

									<div id="question">
										<h3>L’écoulement est plutôt (plusieurs réponses possibles) :</h3>
									</div>
									<div id="answer">
										<label for="answer150">liquide</label>
										<input type="radio" name="answer150" value="liquide" >
										<label for="answer150">épais</label>
										<input type="radio" name="answer150" value="épais" >
										<label for="answer150">clair</label>
										<input type="radio" name="answer150" value="clair" >
										<label for="answer150">jaune</label>
										<input type="radio" name="answer150" value="jaune" >
									</div>

									<div id="question">
										<h3>Etes-vous souvent enrhumé ?</h3>
									</div>
									<div id="answer">
										<label for="answer151">Oui</label>
										<input type="radio" name="answer151" value="oui" >
										<label for="answer151">Non</label>
										<input type="radio" name="answer151" value="non" >	
									</div>

									<div id="question">
										<h3>Souffrez-vous souvent de sinusites ?</h3>
									</div>
									<div id="answer">
										<label for="answer152">Oui</label>
										<input type="radio" name="answer152" value="oui" >
										<label for="answer152">Non</label>
										<input type="radio" name="answer152" value="non" >	
									</div>

									<div id="question">
										<h3>Avez-vous des allergies ?</h3>
									</div>
									<div id="answer">
										<label for="answer153">Oui</label>
										<input type="radio" name="answer153" value="oui" >
										<label for="answer153">Non</label>
										<input type="radio" name="answer153" value="non" >	
									</div> 

									<div id="question">
										<h3>Si oui, quelle(s) type(s) d’allergies ?</h3>
									</div>
									<div id="answer">
										<label for="answer154">Alimentaires</label>
										<input type="radio" name="answer154" value="Alimentaires" >
										<label for="answer154">graminées</label>
										<input type="radio" name="answer154" value="graminées" >
										<label for="answer154">poils</label>
										<input type="radio" name="answer154" value="graminées" >
										<label for="answer154">acariens</label>
										<input type="radio" name="answer154" value="acariens" >
										<label for="answer154">médicaments</label>
										<input type="radio" name="answer154" value="médicaments" >
										<label for="answer154">autre</label>
										<input type="radio" name="answer154" id="other154"  value="other" onclick="enableBox('154')">
										<input id="otheranswer154" type="text" onchange="changeradioother('154')" disabled>
									</div>

									<div id="question">
										<h3>Prenez-vous des antihistaminiques ?</h3>
									</div>
									<div id="answer">
										<label for="answer155">Oui</label>
										<input type="radio" name="answer155" value="oui" >
										<label for="answer155">Non</label>
										<input type="radio" name="answer155" value="non" >	
									</div>

									<div id="question">
										<h3>Avez-vous déjà fait des séances de désensibilisation ?</h3>
									</div>
									<div id="answer">
										<label for="answer156">Oui</label>
										<input type="radio" name="answer156" value="oui" >
										<label for="answer156">Non</label>
										<input type="radio" name="answer156" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, quand ?</h3>
									</div>
									<div id="answer">
										<label for="answer157">Précisez</label>
										<input type="text" name="answer157" value="" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Etes-vous asthmatique ?</h3>
									</div>
									<div id="answer">
										<label for="answer158">Oui</label>
										<input type="radio" name="answer158" value="oui" >
										<label for="answer158">Non</label>
										<input type="radio" name="answer158" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, depuis quand ?</h3>
									</div>
									<div id="answer">
										<label for="answer159">Précisez</label>
										<input type="text" name="answer159" value="" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Prenez-vous de la Ventoline ?</h3>
									</div>
									<div id="answer">
										<label for="answer160">Oui</label>
										<input type="radio" name="answer160" value="oui" >
										<label for="answer160">Non</label>
										<input type="radio" name="answer160" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui à quelle fréquence ?</h3>
									</div>
									<div id="answer">
										<label for="answer161">Précisez</label>
										<input type="text" name="answer161" value="" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Etes-vous sensible aux maux de gorge, angines, bronchites, troubles pneumo ?</h3>
									</div>
									<div id="answer">
										<label for="answer162">Oui</label>
										<input type="radio" name="answer162" value="oui" >
										<label for="answer162">Non</label>
										<input type="radio" name="answer162" value="non" >	
									</div>

									<div id="question">
										<h3>Etes-vous sensible aux otites ?</h3>
									</div>
									<div id="answer">
										<label for="answer163">Oui</label>
										<input type="radio" name="answer163" value="oui" >
										<label for="answer163">Non</label>
										<input type="radio" name="answer163" value="non" >	
									</div>

									<div id="question">
										<h3>Ressentez-vous des difficultés à respirer ?</h3>
									</div>
									<div id="answer">
										<label for="answer164">Oui</label>
										<input type="radio" name="answer164" value="oui" >
										<label for="answer164">Non</label>
										<input type="radio" name="answer164" value="non" >	
									</div> 

									<div id="question">
										<h3>Si oui, depuis quand ?</h3>
									</div>
									<div id="answer">
										<label for="answer165">Précisez</label>
										<input type="text" name="answer165" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Etes-vous facilement essoufflé ?</h3>
									</div>
									<div id="answer">
										<label for="answer166">Oui</label>
										<input type="radio" name="answer166" value="oui" >
										<label for="answer166">Non</label>
										<input type="radio" name="answer166" value="non" >	
									</div> 

									<div id="question">
										<h3>Si oui, depuis quand ?</h3>
									</div>
									<div id="answer">
										<label for="answer167">Précisez</label>
										<input type="text" name="answer167" value="" placeholder="Précisez..." >
									</div>  

									<div id="question">
										<h3>A quel moment ?</h3>
									</div>
									<div id="answer">
										<label for="answer168">pendant un effort physique</label>
										<input type="radio" name="answer168" value="pendant un effort physique" >
										<label for="answer168">dans n’importe quelle situation</label>
										<input type="radio" name="answer168" value="dans n’importe quelle situation" >
									</div>

							<?php
								}

								if ($bloc7 == 1) 
								{

							?>

									<h2>IV.	SYSTEME CARDIOVASCULAIRE</h2>
									<label for="box7">1. ORL</label>	

									<div id="question">
										<h3>Etes-vous sujet aux malaises vagaux, vertiges, étourdissements ?</h3>
									</div>
									<div id="answer">
										<label for="answer169">Oui</label>
										<input type="radio" name="answer169" value="oui" >
										<label for="answer169">Non</label>
										<input type="radio" name="answer169" value="non" >	
									</div> 

									<div id="question">
										<h3>Etes-vous sujet aux troubles du rythme cardiaque (tachycardie, arythmie…) ?</h3>
									</div>
									<div id="answer">
										<label for="answer170">Oui</label>
										<input type="radio" name="answer170" value="oui" >
										<label for="answer170">Non</label>
										<input type="radio" name="answer170" value="non" >	
									</div>

									<div id="question">
										<h3>Souffrez-vous d’hypertension ?</h3>
									</div>
									<div id="answer">
										<label for="answer171">Oui</label>
										<input type="radio" name="answer171" value="oui" >
										<label for="answer171">Non</label>
										<input type="radio" name="answer171" value="non" >	
									</div>

									<div id="question">
										<h3>Souffrez-vous hypotension ?</h3>
									</div>
									<div id="answer">
										<label for="answer172">Oui</label>
										<input type="radio" name="answer172" value="oui" >
										<label for="answer172">Non</label>
										<input type="radio" name="answer172" value="non" >	
									</div> 

									<div id="question">
										<h3>Souffrez-vous d’une sensation de jambes lourdes ?</h3>
									</div>
									<div id="answer">
										<label for="answer173">Oui</label>
										<input type="radio" name="answer173" value="oui" >
										<label for="answer173">Non</label>
										<input type="radio" name="answer173" value="non" >	
									</div>  

									<div id="question">
										<h3>Etes-vous sujet à la rétention d’eau ?</h3>
									</div>
									<div id="answer">
										<label for="answer174">Oui</label>
										<input type="radio" name="answer174" value="oui" >
										<label for="answer174">Non</label>
										<input type="radio" name="answer174" value="non" >	
									</div> 

									<div id="question">
										<h3>A quel endroit ?</h3>
									</div>
									<div id="answer">
										<label for="answer175">Précisez</label>
										<input type="text" name="answer175" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Avez-vous de la cellulite ?</h3>
									</div>
									<div id="answer">
										<label for="answer176">Oui</label>
										<input type="radio" name="answer176" value="oui" >
										<label for="answer176">Non</label>
										<input type="radio" name="answer176" value="non" >	
									</div> 

									<div id="question">
										<h3>Si oui, plutôt localisée :</h3>
									</div>
									<div id="answer">
										<label for="answer177">sur les fessiers/cuisses</label>
										<input type="radio" name="answer177" value="sur les fessiers/cuisses" >
										<label for="answer177">sur le ventre/hanches/culotte de cheval</label>
										<input type="radio" name="answer177" value="sur le ventre/hanches/culotte de cheval" >
										<label for="answer177">sur les jambes</label>
										<input type="radio" name="answer177" value="sur les jambes" >
									</div> 

									<div id="question">
										<h3>Avez-vous des troubles circulatoires, type phlébite, varice ?</h3>
									</div>
									<div id="answer">
										<label for="answer178">Oui</label>
										<input type="radio" name="answer178" value="oui" >
										<label for="answer178">Non</label>
										<input type="radio" name="answer178" value="non" >	
									</div>

									<div id="question">
										<h3>Avez-vous déjà eu des hémorroïdes ?</h3>
									</div>
									<div id="answer">
										<label for="answer179">Oui</label>
										<input type="radio" name="answer179" value="oui" >
										<label for="answer179">Non</label>
										<input type="radio" name="answer179" value="non" >	
									</div> 

									<div id="question">
										<h3>Avez-vous déjà eu un ou plusieurs pontages / infarctus ?</h3>
									</div>
									<div id="answer">
										<label for="answer180">Oui</label>
										<input type="radio" name="answer180" value="oui" >
										<label for="answer180">Non</label>
										<input type="radio" name="answer180" value="non" >	
									</div>

									<div id="question">
										<h3>De quand date le dernier ?</h3>
									</div>
									<div id="answer">
										<label for="answer181">Précisez</label>
										<input type="text" name="answer181" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Avez-vous les extrémités froides ?</h3>
									</div>
									<div id="answer">
										<label for="answer182">Oui</label>
										<input type="radio" name="answer182" value="oui" >
										<label for="answer182">Non</label>
										<input type="radio" name="answer182" value="non" >	
									</div> 

									<div id="question">
										<h3>Avez-vous des picotements dans les extrémités (pieds, mains, nez) ?</h3>
									</div>
									<div id="answer">
										<label for="answer183">Oui</label>
										<input type="radio" name="answer183" value="oui" >
										<label for="answer183">Non</label>
										<input type="radio" name="answer183" value="non" >	
									</div>

									<div id="question">
										<h3>Etes-vous frileux(se) ?</h3>
									</div>
									<div id="answer">
										<label for="answer184">Oui</label>
										<input type="radio" name="answer184" value="oui" >
										<label for="answer184">Non</label>
										<input type="radio" name="answer184" value="non" >	
									</div> 

									<div id="question">
										<h3>Avez-vous des migraines ? maux de tête ?</h3>
									</div>
									<div id="answer">
										<label for="answer185">Oui</label>
										<input type="radio" name="answer185" value="oui" >
										<label for="answer185">Non</label>
										<input type="radio" name="answer185" value="non" >	
									</div> 

									<div id="question">
										<h3>Avez-vous des troubles de la concentration ? de la mémoire ?</h3>
									</div>
									<div id="answer">
										<label for="answer186">Oui</label>
										<input type="radio" name="answer186" value="oui" >
										<label for="answer186">Non</label>
										<input type="radio" name="answer186" value="non" >	
									</div> 

									<div id="question">
										<h3>Souffrez-vous de diabète ?</h3>
									</div>
									<div id="answer">
										<label for="answer187">Oui</label>
										<input type="radio" name="answer187" value="oui" >
										<label for="answer187">Non</label>
										<input type="radio" name="answer187" value="non" >	
									</div> 

									<div id="question">
										<h3>Souffrez-vous de cholestérol ?</h3>
									</div>
									<div id="answer">
										<label for="answer188">Oui</label>
										<input type="radio" name="answer188" value="oui" >
										<label for="answer188">Non</label>
										<input type="radio" name="answer188" value="non" >	
									</div> 

							<?php
								}
								if ($bloc8 == 1) 
								{
							?>
									<h2>V. SYSTEME URO-GENITAL</h2>
									<label for="box8">1. Système Uro-Génital</label>

									<div id="question">
										<h3>Etes-vous suivi par un gynécologue et/ou sage-femme ?</h3>
									</div>
									<div id="answer">
										<label for="answer189">Oui</label>
										<input type="radio" name="answer189" value="oui" >
										<label for="answer189">Non</label>
										<input type="radio" name="answer189" value="non" >	
									</div> 	

									<div id="question">
										<h3>Quel est votre moyen de contraception ?</h3>
									</div>
									<div id="answer">
										<label for="answer190">préservatifs</label>
										<input type="radio" name="answer190" value="préservatifs" >
										<label for="answer190">pilule : laquelle ?</label>
										<input type="text" name="answer190" value="" placeholder="Précisez..." >
										<label for="answer190">stérilet : quel type ?</label>
										<input type="text" name="answer190" value="" placeholder="Précisez..." >
										<label for="answer190">implant</label>
										<input type="radio" name="answer190" value="implant" >
										<label for="answer190">symptothermie</label>
										<input type="radio" name="answer190" value="symptothermie" >
										<label for="answer190">autre</label>
										<input type="text" name="answer190" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>A quel âge, avez-vous eu vos premières règles ?</h3>
									</div>
									<div id="answer">
										<label for="answer191">Précisez</label>
										<input type="text" name="answer191" value="" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Vos cycles sont-ils réguliers ?</h3>
									</div>
									<div id="answer">
										<label for="answer192">Oui</label>
										<input type="radio" name="answer192" value="oui" >
										<label for="answer192">Non</label>
										<input type="radio" name="answer192" value="non" >	
									</div>

									<div id="question">
										<h3>Vos règles sont-elles plutôt abondantes ?</h3>
									</div>
									<div id="answer">
										<label for="answer193">Oui</label>
										<input type="radio" name="answer193" value="oui" >
										<label for="answer193">Non</label>
										<input type="radio" name="answer193" value="non" >	
									</div>

									<div id="question">
										<h3>Quelle est leur durée ?</h3>
									</div>
									<div id="answer">
										<label for="answer194">Précisez</label>
										<input type="text" name="answer194" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Vous on-t-a diagnostiqué une pathologie liée à votre système urino-génital ?</h3>
									</div>
									<div id="answer">
										<label for="answer195">Oui</label>
										<input type="radio" name="answer195" value="oui" >
										<label for="answer195">Non</label>
										<input type="radio" name="answer195" value="non" >	
									</div>
									
									 
									<div id="question">
										<h3>Si oui, laquelle ?</h3>
									</div>
									<div id="answer">
										<label for="answer196">endométriose</label>
										<input type="radio" name="answer196" value="endométriose" >
										<label for="answer196">kyste ovarien</label>
										<input type="radio" name="answer196" value="kyste ovarien" >
										<label for="answer196">SOPK</label>
										<input type="radio" name="answer196" value="SOPK" >
										<label for="answer196">autre</label>
										<input type="radio" name="answer196" id="other196"  value="other" onclick="enableBox('196')">
										<input id="otheranswer196" type="text" onchange="changeradioother('196')" disabled>
									</div>

									<div id="question">
										<h3>Souffrez-vous de syndrome prémenstruel ?</h3>
									</div>
									<div id="answer">
										<label for="answer197">Irritabilité, anxiété, déprime</label>
										<input type="radio" name="answer197" value="Irritabilité, anxiété, déprime" >
										<label for="answer197">rétention d’eau</label>
										<input type="radio" name="answer197" value="rétention d’eau" >
										<label for="answer197">prise de poids passagère</label>
										<input type="radio" name="answer197" value="prise de poids passagère" >
										<label for="answer197">insomnie, agitation</label>
										<input type="radio" name="answer197" value="insomnie, agitation" >
										<label for="answer197">migraines</label>
										<input type="radio" name="answer197" value="migraines" >
										<label for="answer197">grosse fatigue physique</label>
										<input type="radio" name="answer197" value="grosse fatigue physique" >
										<label for="answer197">difficulté de concentration</label>
										<input type="radio" name="answer197" value="difficulté de concentration" >
										<label for="answer197">constipation, diarrhée</label>
										<input type="radio" name="answer197" value="constipation, diarrhée" >
										<label for="answer197">douleurs mammaires</label>
										<input type="radio" name="answer197" value="douleurs mammaires" >
										<label for="answer197">acné</label>
										<input type="radio" name="answer197" value="acné" >
										<label for="answer197">autre</label>
										<input type="text" name="answer197" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Souffrez-vous de troubles liés à votre ménopause ?</h3>
									</div>
									<div id="answer">
										<label for="answer198">Bouffées de chaleur</label>
										<input type="radio" name="answer198" value="Bouffées de chaleur" >
										<label for="answer198">troubles du sommeil</label>
										<input type="radio" name="answer198" value="troubles du sommeil" >
										<label for="answer198">prise de poids</label>
										<input type="radio" name="answer198" value="prise de poids" >
										<label for="answer198">sécheresse vaginale</label>
										<input type="radio" name="answer198" value="sécheresse vaginale" >
										<label for="answer198">autre</label>
										<input type="radio" name="answer198" id="other198"  value="other" onclick="enableBox('198')">
										<input id="otheranswer198" type="text" onchange="changeradioother('198')" disabled>
									</div>

									<div id="question">
										<h3>Souffrez-vous de cystites à répétition ?</h3>
									</div>
									<div id="answer">
										<label for="answer199">Oui</label>
										<input type="radio" name="answer199" value="oui" >
										<label for="answer199">Non</label>
										<input type="radio" name="answer199" value="non" >	
									</div> 


									<div id="question">
										<h3>Si oui, à quelle fréquence ?</h3>
									</div>
									<div id="answer">
										<label for="answer200">Précisez</label>
										<input type="text" name="answer200" value="" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Souffrez-vous de troubles de la libido ?</h3>
									</div>
									<div id="answer">
										<label for="answer201">Oui</label>
										<input type="radio" name="answer201" value="oui" >
										<label for="answer201">Non</label>
										<input type="radio" name="answer201" value="non" >	
									</div>

									<div id="question">
										<h3>Souffrez-vous de troubles de sécheresse vaginale ?</h3>
									</div>
									<div id="answer">
										<label for="answer202">Oui</label>
										<input type="radio" name="answer202" value="oui" >
										<label for="answer202">Non</label>
										<input type="radio" name="answer202" value="non" >	
									</div>

									<div id="question">
										<h3>Souffre-vous de pertes vaginales ?</h3>
									</div>
									<div id="answer">
										<label for="answer203">Oui</label>
										<input type="radio" name="answer203" value="oui" >
										<label for="answer203">Non</label>
										<input type="radio" name="answer203" value="non" >	
									</div> 

									<div id="question">
										<h3>Souffrez-vous de troubles érectiles ?</h3>
									</div>
									<div id="answer">
										<label for="answer204">Oui</label>
										<input type="radio" name="answer204" value="oui" >
										<label for="answer204">Non</label>
										<input type="radio" name="answer204" value="non" >	
									</div> 

									<div id="question">
										<h3>Combien de grossesses avez-vous eu ?</h3>
									</div>
									<div id="answer">
										<label for="answer205">Précisez</label>
										<input type="text" name="answer205" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Le/les accouchement(s) ont eu lieu :</h3>
									</div>
									<div id="answer">
										<label for="answer206">par voie basse</label>
										<input type="radio" name="answer206" value="par voie basse" >
										<label for="answer206">par césarienne</label>
										<input type="radio" name="answer206" value="par césarienne" >
									</div>

									<div id="question">
										<h3>Y a-t-il eu des complications ?</h3>
									</div>
									<div id="answer">
										<label for="answer207">Oui</label>
										<input type="radio" name="answer207" value="oui" >
										<label for="answer207">Non</label>
										<input type="radio" name="answer207" value="non" >	
									</div> 

									<div id="question">
										<h3>Avez-vous déjà fait des fausses couches ?</h3>
									</div>
									<div id="answer">
										<label for="answer208">Oui</label>
										<input type="radio" name="answer208" value="oui" >
										<label for="answer208">Non</label>
										<input type="radio" name="answer208" value="non" >	
									</div> 

									<div id="question">
										<h3>Quelle est la couleur de vos urines ?</h3>
									</div>
									<div id="answer">
										<label for="answer209">Précisez</label>
										<input type="text" name="answer209" value="" placeholder="Précisez..." >
									</div>
							<?php
								}
								if ($bloc9 == 1) 
								{
							?>
									<h2>VI.	SYSTEME OSSEUX, MUSCULAIRE ET ARTICULAIRE</h2>
									<label for="box9">musculaire & articulaire</label>

									<div id="question">
										<h3>Souffrez d’une pathologie spécifique ? (Arthrose, arthrite, polyarthrite rhumatoïde, sclérose en plaques, fibromyalgie…)</h3>
									</div>
									<div id="answer">
										<label for="answer210">Oui</label>
										<input type="radio" name="answer210" value="oui" >
										<label for="answer210">Non</label>
										<input type="radio" name="answer210" value="non" >	
									</div> 	

									<div id="question">
										<h3>Si oui, depuis quand ?</h3>
									</div>
									<div id="answer">
										<label for="answer211">Précisez</label>
										<input type="text" name="answer211" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Ressentez-vous des douleurs musculaires ?</h3>
									</div>
									<div id="answer">
										<label for="answer212">Oui</label>
										<input type="radio" name="answer212" value="oui" >
										<label for="answer212">Non</label>
										<input type="radio" name="answer212" value="non" >	
									</div> 

									<div id="question">
										<h3>Si oui, où ?</h3>
									</div>
									<div id="answer">
										<label for="answer213">Précisez</label>
										<input type="text" name="answer213" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Quelle est son intensité ?</h3>
									</div>
									<div id="answer">
										<label for="answer214">faible</label>
										<input type="radio" name="answer214" value="faible" >
										<label for="answer214">modérée</label>
										<input type="radio" name="answer214" value="modérée" >
										<label for="answer214">intense</label>
										<input type="radio" name="answer214" value="intense" >
										<label for="answer214">extrêmement intense</label>
										<input type="radio" name="answer214" value="extrêmement intense" >
									</div>

									<div id="question">
										<h3>La douleur est-elle :</h3>
									</div>
									<div id="answer">
										<label for="answer215">passagère</label>
										<input type="radio" name="answer215" value="passagère" >
										<label for="answer215">constante</label>
										<input type="radio" name="answer215" value="constante" >
									</div>


									<div id="question">
										<h3>Cette douleur est-elle :</h3>
									</div>
									<div id="answer">
										<label for="answer216">Augmentée la nuit</label>
										<input type="radio" name="answer216" value="Augmentée la nuit" >
										<label for="answer216">Augmentée la journée</label>
										<input type="radio" name="answer216" value="Augmentée la journée" >
										<label for="answer216">Permanente</label>
										<input type="radio" name="answer216" value="Permanente" >
										<label for="answer216">Pulsatile</label>
										<input type="radio" name="answer216" value="Pulsatile" >
										<label for="answer216">Générale</label>
										<input type="radio" name="answer216" value="Générale" >
										<label for="answer216">Localisée à un endroit précis</label>
										<input type="radio" name="answer216" value="Localisée à un endroit précis" >
										<label for="answer216">Comme une sensation de brûlure</label>
										<input type="radio" name="answer216" value="Comme une sensation de brûlure" >
										<label for="answer216">Comme une sensation de décharge électrique</label>
										<input type="radio" name="answer216" value="Comme une sensation de décharge électrique" >
										<label for="answer216">Augmentée par le froid</label>
										<input type="radio" name="answer216" value="Augmentée par le froid" >
										<label for="answer216">Augmentée par le chaud</label>
										<input type="radio" name="answer216" value="Augmentée par le chaud" >
									</div>

									<div id="question">
										<h3>Est-ce suite à un accident ? travail avec gestuelle répétée ? fractures ?</h3>
									</div>
									<div id="answer">
										<label for="answer217">Oui</label>
										<input type="radio" name="answer217" value="oui" >
										<label for="answer217">Non</label>
										<input type="radio" name="answer217" value="non" >	
									</div>  

									<div id="question">
										<h3>Avez-vous des maux de dos ?</h3>
									</div>
									<div id="answer">
										<label for="answer218">Oui</label>
										<input type="radio" name="answer218" value="oui" >
										<label for="answer218">Non</label>
										<input type="radio" name="answer218" value="non" >	
									</div> 

									<div id="question">
										<h3>A quel endroit ?</h3>
									</div>
									<div id="answer">
										<label for="answer219">En haut</label>
										<input type="radio" name="answer219" value="En haut" >
										<label for="answer219">au milieu</label>
										<input type="radio" name="answer219" value="au milieu" >
										<label for="answer219">en bas du dos</label>
										<input type="radio" name="answer219" value="en bas du dos" >
									</div>

									<div id="question">
										<h3>Sur une échelle de 1 à 10, quelle est l’intensité de la douleur ?</h3>
									</div>
									<div id="answer">
										<label for="answer220">Précisez</label>
										<input type="text" name="answer220" value="" placeholder="Précisez..." >
									</div> 


									<div id="question">
										<h3>Est-ce fréquent ?</h3>
									</div>
									<div id="answer">
										<label for="answer221">Oui</label>
										<input type="radio" name="answer221" value="oui" >
										<label for="answer221">Non</label>
										<input type="radio" name="answer221" value="non" >	
									</div> 

									<div id="question">
										<h3>Souffrez-vous d’une sciatique ? cruralgie ? sciatalgie ?</h3>
									</div>
									<div id="answer">
										<label for="answer222">Oui</label>
										<input type="radio" name="answer222" value="oui" >
										<label for="answer222">Non</label>
										<input type="radio" name="answer222" value="non" >	
									</div> 

									<div id="question">
										<h3>Si oui, depuis quand ?</h3>
									</div>
									<div id="answer">
										<label for="answer222">Précisez</label>
										<input type="text" name="answer222" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Quelle est son intensité ?</h3>
									</div>
									<div id="answer">
										<label for="answer223">faible</label>
										<input type="radio" name="answer223" value="faible" >
										<label for="answer223">modérée</label>
										<input type="radio" name="answer223" value="modérée" >
										<label for="answer223">intense</label>
										<input type="radio" name="answer223" value="intense" >
										<label for="answer223">extrêmement intense</label>
										<input type="radio" name="answer223" value="extrêmement intense" >
									</div>

									<div id="question">
										<h3>Est-ce constant ?</h3>
									</div>
									<div id="answer">
										<label for="answer224">Oui</label>
										<input type="radio" name="answer224" value="oui" >
										<label for="answer224">Non</label>
										<input type="radio" name="answer224" value="non" >	
									</div> 

									<div id="question">
										<h3>Souffrez-vous de névralgies ?</h3>
									</div>
									<div id="answer">
										<label for="answer225">Oui</label>
										<input type="radio" name="answer225" value="oui" >
										<label for="answer225">Non</label>
										<input type="radio" name="answer225" value="non" >	
									</div> 

									<div id="question">
										<h3>Si oui, depuis quand ?</h3>
									</div>
									<div id="answer">
										<label for="answer226">Précisez</label>
										<input type="text" name="answer226" value="" placeholder="Précisez..." >
									</div>  

									<div id="question">
										<h3>Où sont-elles situées ? </h3>
									</div>
									<div id="answer">
										<label for="answer227">Précisez</label>
										<input type="text" name="answer227" value="" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Avez-vous des douleurs articulaires ?</h3>
									</div>
									<div id="answer">
										<label for="answer228">Oui</label>
										<input type="radio" name="answer228" value="oui" >
										<label for="answer228">Non</label>
										<input type="radio" name="answer228" value="non" >	
									</div>

									<div id="question">
										<h3>Où exactement ?</h3>
									</div>
									<div id="answer">
										<label for="answer229">Précisez</label>
										<input type="text" name="answer229" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Depuis quand ?</h3>
									</div>
									<div id="answer">
										<label for="answer230">Précisez</label>
										<input type="text" name="answer230" value="" placeholder="Précisez..." >
									</div>  

									<div id="question">
										<h3>Est-ce une douleur constante ?</h3>
									</div>
									<div id="answer">
										<label for="answer231">Oui</label>
										<input type="radio" name="answer231" value="oui" >
										<label for="answer231">Non</label>
										<input type="radio" name="answer231" value="non" >	
									</div> 

									<div id="question">
										<h3>Avez-vous déjà eu ou avez-vous une tendinite ?</h3>
									</div>
									<div id="answer">
										<label for="answer232">Oui</label>
										<input type="radio" name="answer232" value="oui" >
										<label for="answer232">Non</label>
										<input type="radio" name="answer232" value="non" >	
									</div> 

									<div id="question">
										<h3>Où est-elle située ?</h3>
									</div>
									<div id="answer">
										<label for="answer233">Précisez</label>
										<input type="text" name="answer233" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Depuis quand l’avez-vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer234">Précisez</label>
										<input type="text" name="answer234" value="" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Souffrez-vous d’ostéoporose ?</h3>
									</div>
									<div id="answer">
										<label for="answer235">Oui</label>
										<input type="radio" name="answer235" value="oui" >
										<label for="answer235">Non</label>
										<input type="radio" name="answer235" value="non" >	
									</div> 
							<?php
								}
								if ($bloc10 == 1) 
								{
							?>
									<h2>VII. SYSTEME PEAU ET PHANERE </h2>
									<label for="box10">systeme peau et phanere</label>

									<div id="question">
										<h3>Quelle est votre type de peau ?</h3>
									</div>
									<div id="answer">
										<label for="answer236">normal</label>
										<input type="radio" name="answer236" value="normal" >
										<label for="answer236">sèche</label>
										<input type="radio" name="answer236" value="sèche" >
										<label for="answer236">grasse</label>
										<input type="radio" name="answer236" value="grasse" >
										<label for="answer236">mixte</label>
										<input type="radio" name="answer236" value="mixte" >
										<label for="answer236">acné</label>
										<input type="radio" name="answer236" value="acné" >
									</div>

									<div id="question">
										<h3>Comment la nettoyez-vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer237">lait nettoyant</label>
										<input type="radio" name="answer237" value="lait nettoyant" >
										<label for="answer237">crème nettoyante</label>
										<input type="radio" name="answer237" value="crème nettoyante" >
										<label for="answer237">huile nettoyante (jojoba, argan)</label>
										<input type="radio" name="answer237" value="huile nettoyante (jojoba, argan)" >
										<label for="answer237">gel nettoyant</label>
										<input type="radio" name="answer237" value="gel nettoyant" >
										<label for="answer237">autre</label>
										<input type="radio" name="answer237" id="other237"  value="other" onclick="enableBox('237')">
										<input id="otheranswer237" type="text" onchange="changeradioother('237')" disabled>
									</div>

									<div id="question">
										<h3>A quelle fréquence ?</h3>
									</div>
									<div id="answer">
										<label for="answer238">Précisez</label>
										<input type="text" name="answer238" value="" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Avec quels produits ?</h3>
									</div>
									<div id="answer">
										<label for="answer239">Précisez</label>
										<input type="text" name="answer239" value="" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Hydratez-vous la peau ?</h3>
									</div>
									<div id="answer">
										<label for="answer240">Oui</label>
										<input type="radio" name="answer240" value="oui" >
										<label for="answer240">Non</label>
										<input type="radio" name="answer240" value="non" >	
									</div>

									<div id="question">
										<h3>Avec quels produits ?</h3>
									</div>
									<div id="answer">
										<label for="answer241">Précisez</label>
										<input type="text" name="answer241" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Avez-vous la peau du corps sèche ?</h3>
									</div>
									<div id="answer">
										<label for="answer242">Oui</label>
										<input type="radio" name="answer242" value="oui" >
										<label for="answer242">Non</label>
										<input type="radio" name="answer242" value="non" >	
									</div>

									<div id="question">
										<h3>Souffrez-vous d’eczéma ?</h3>
									</div>
									<div id="answer">
										<label for="answer243">Oui</label>
										<input type="radio" name="answer243" value="oui" >
										<label for="answer243">Non</label>
										<input type="radio" name="answer243" value="non" >	
									</div> 

									<div id="question">
										<h3>Si oui, est-il plutôt :</h3>
									</div>
									<div id="answer">
										<label for="answer244">sec</label>
										<input type="radio" name="answer244" value="sec" >
										<label for="answer244">suintant</label>
										<input type="radio" name="answer244" value="suintant" >
									</div> 

									<div id="question">
										<h3>Souffrez- vous de psoriasis ?</h3>
									</div>
									<div id="answer">
										<label for="answer245">Oui</label>
										<input type="radio" name="answer245" value="oui" >
										<label for="answer245">Non</label>
										<input type="radio" name="answer245" value="non" >	
									</div> 

									<div id="question">
										<h3>Ressentez-vous des démangeaisons ?</h3>
									</div>
									<div id="answer">
										<label for="answer246">Oui</label>
										<input type="radio" name="answer246" value="oui" >
										<label for="answer246">Non</label>
										<input type="radio" name="answer246" value="non" >	
									</div> 

									<div id="question">
										<h3>Avez-vous des rougeurs, couperoses ?</h3>
									</div>
									<div id="answer">
										<label for="answer247">Oui</label>
										<input type="radio" name="answer247" value="oui" >
										<label for="answer247">Non</label>
										<input type="radio" name="answer247" value="non" >	
									</div> 

									<div id="question">
										<h3>Avec quoi vous lavez-vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer248">gel douche</label>
										<input type="radio" name="answer248" value="gel douche" >
										<label for="answer248">savon</label>
										<input type="radio" name="answer248" value="savon" >
										<label for="answer248">huile lavante</label>
										<input type="radio" name="answer248" value="huile lavante" >
										<label for="answer248">autre</label>
										<input type="radio" name="answer248" id="other248"  value="other" onclick="enableBox('248')">
										<input id="otheranswer248" type="text" onchange="changeradioother('248')" disabled>
									</div>

									<div id="question">
										<h3>Quelles marques utilisez-vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer249">Précisez</label>
										<input type="text" name="answer249" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Faites-vous des gommages régulièrement ?</h3>
									</div>
									<div id="answer">
										<label for="answer250">Oui</label>
										<input type="radio" name="answer250" value="oui" >
										<label for="answer250">Non</label>
										<input type="radio" name="answer250" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui, sur quelles parties du corps ?</h3>
									</div>
									<div id="answer">
										<label for="answer251">Précisez</label>
										<input type="text" name="answer251" value="" placeholder="Précisez..." >
									</div>  

									<div id="question">
										<h3>Quels types de produits utilisez-vous pour vos gommages (gant de crin, marc de café, produit cosmétique…) ?</h3>
									</div>
									<div id="answer">
										<label for="answer252">Précisez</label>
										<input type="text" name="answer252" value="" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>A quelle fréquence ?</h3>
									</div>
									<div id="answer">
										<label for="answer253">Précisez</label>
										<input type="text" name="answer253" value="" placeholder="Précisez..." >
									</div>  

									<div id="question">
										<h3>Faites-vous des brossages à sec ?</h3>
									</div>
									<div id="answer">
										<label for="answer254">Oui</label>
										<input type="radio" name="answer254" value="oui" >
										<label for="answer254">Non</label>
										<input type="radio" name="answer254" value="non" >	
									</div>

									<div id="question">
										<h3>Si oui à quelle fréquence ?</h3>
									</div>
									<div id="answer">
										<label for="answer255">Précisez</label>
										<input type="text" name="answer255" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Perdez-vous vos cheveux ?</h3>
									</div>
									<div id="answer">
										<label for="answer256">Oui</label>
										<input type="radio" name="answer256" value="oui" >
										<label for="answer256">Non</label>
										<input type="radio" name="answer256" value="non" >	
									</div>

									<div id="question">
										<h3>Depuis quand ?</h3>
									</div>
									<div id="answer">
										<label for="answer257">Précisez</label>
										<input type="text" name="answer257" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>A quel endroit ?</h3>
									</div>
									<div id="answer">
										<label for="answer258">Précisez</label>
										<input type="text" name="answer258" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Sont-ils cassants ?</h3>
									</div>
									<div id="answer">
										<label for="answer259">Oui</label>
										<input type="radio" name="answer259" value="oui" >
										<label for="answer259">Non</label>
										<input type="radio" name="answer259" value="non" >	
									</div>

									<div id="question">
										<h3>Sont-ils ternes ?</h3>
									</div>
									<div id="answer">
										<label for="answer260">Oui</label>
										<input type="radio" name="answer260" value="oui" >
										<label for="answer260">Non</label>
										<input type="radio" name="answer260" value="non" >	
									</div> 

									<div id="question">
										<h3>Avez-vous des pellicules ?</h3>
									</div>
									<div id="answer">
										<label for="answer261">Oui</label>
										<input type="radio" name="answer261" value="oui" >
										<label for="answer261">Non</label>
										<input type="radio" name="answer261" value="non" >	
									</div> 

									<div id="question">
										<h3>Quels shampoing et soin utilisez-vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer262">Précisez</label>
										<input type="text" name="answer262" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Faites-vous des couleurs ?</h3>
									</div>
									<div id="answer">
										<label for="answer263">Oui</label>
										<input type="radio" name="answer263" value="oui" >
										<label for="answer263">Non</label>
										<input type="radio" name="answer263" value="non" >	
									</div> 

									<div id="question">
										<h3>Si oui :</h3>
									</div>
									<div id="answer">
										<label for="answer264">coloration naturel</label>
										<input type="radio" name="answer264" value="coloration naturel" >
										<label for="answer264">coloration ammoniaque</label>
										<input type="radio" name="answer264" value="coloration ammoniaque" >
									</div>

									<div id="question">
										<h3>A quelle fréquence vous coupez-vous les cheveux ?</h3>
									</div>
									<div id="answer">
										<label for="answer265">Précisez</label>
										<input type="text" name="answer265" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Vos ongles sont plutôt : (plusieurs réponses possibles)</h3>
									</div>
									<div id="answer">
										<label for="answer266">cassants</label>
										<input type="radio" name="answer266" value="cassants" >
										<label for="answer266">dédoublés</label>
										<input type="radio" name="answer266" value="dédoublés" >
										<label for="answer266">durs</label>
										<input type="radio" name="answer266" value="durs" >
										<label for="answer266">mous</label>
										<input type="radio" name="answer266" value="mous" >
										<label for="answer266">striés</label>
										<input type="radio" name="answer266" value="striés" >
										<label for="answer266">tâches</label>
										<input type="radio" name="answer266" value="tâches" >
									</div>

									<div id="question">
										<h3>Posez-vous du vernis régulièrement ?</h3>
									</div>
									<div id="answer">
										<label for="answer267">Oui</label>
										<input type="radio" name="answer267" value="oui" >
										<label for="answer267">Non</label>
										<input type="radio" name="answer267" value="non" >	
									</div>  

									<div id="question">
										<h3>Si oui, quel type ?</h3>
									</div>
									<div id="answer">
										<label for="answer268">classique</label>
										<input type="radio" name="answer268" value="classique" >
										<label for="answer268">semi-permanent</label>
										<input type="radio" name="answer268" value="semi-permanent" >
										<label for="answer268">gel</label>
										<input type="radio" name="answer268" value="gel" >
										<label for="answer268">capsule</label>
										<input type="radio" name="answer268" value="capsule" >
										<label for="answer268">faux ongles</label>
										<input type="radio" name="answer268" value="faux ongles" >
										<label for="answer268">autre</label>
										<input type="radio" name="answer268" value="tâches" >
										<input type="radio" name="answer268" id="other268"  value="other" onclick="enableBox('268')">
										<input id="otheranswer268" type="text" onchange="changeradioother('268')" disabled>
									</div>



									<div id="question">
										<h3>Avez-vous déjà eu des mycoses aux pieds et/ou mains ?</h3>
									</div>
									<div id="answer">
										<label for="answer269">Oui</label>
										<input type="radio" name="answer269" value="oui" >
										<label for="answer269">Non</label>
										<input type="radio" name="answer269" value="non" >	
									</div> 

									<div id="question">
										<h3>Vous maquillez vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer270">Oui</label>
										<input type="radio" name="answer270" value="oui" >
										<label for="answer270">Non</label>
										<input type="radio" name="answer270" value="non" >	
									</div>   

									<div id="question">
										<h3>Quelles zones maquillez-vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer271">teint</label>
										<input type="radio" name="answer271" value="teint" >
										<label for="answer271">yeux</label>
										<input type="radio" name="answer271" value="yeux" >
										<label for="answer271">paupière</label>
										<input type="radio" name="answer271" value="paupière" >
										<label for="answer271">lèvre</label>
										<input type="radio" name="answer271" value="lèvre" >
									</div>

									<div id="question">
										<h3>Quelles marques utilisez-vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer272">bio</label>
										<input type="radio" name="answer272" value="bio" >
										<label for="answer272">grande distribution (L’Oréal, Gemey Maybeline, etc.)</label>
										<input type="radio" name="answer272" value="grande distribution (L’Oréal, Gemey Maybeline, etc.)" >
										<label for="answer272">magasin spécialisé (Sephora, Yves Rocher, Chanel, Dior, etc.)</label>
										<input type="radio" name="answer272" value="magasin spécialisé (Sephora, Yves Rocher, Chanel, Dior, etc.)" >
										<label for="answer272">pharmacie</label>
										<input type="radio" name="answer272" value="pharmacie" >
									</div> 

									<div id="question">
										<h3>Combien de fois par semaine ?</h3>
									</div>
									<div id="answer">
										<label for="answer273">Précisez</label>
										<input type="text" name="answer273" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Quels produits de maquillage utilisez-vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer274">Précisez</label>
										<input type="text" name="answer274" value="" placeholder="Précisez..." >
									</div>

									<div id="question">
										<h3>Etat général de votre dentition sur une échelle de 0 à 10 (0 très mauvais état, 10 excellent état) ?</h3>
									</div>
									<div id="answer">
										<label for="answer275">Précisez</label>
										<input type="text" name="answer275" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Vos dents sont-elles plutôt :</h3>
									</div>
									<div id="answer">
										<label for="answer276">sensibles</label>
										<input type="radio" name="answer276" value="sensibles" >
										<label for="answer276">fragiles</label>
										<input type="radio" name="answer276" value="fragiles" >
										<label for="answer276">cariées</label>
										<input type="radio" name="answer276" value="cariées" >
										<label for="answer276">autre</label>
										<input type="radio" name="answer276" id="other276"  value="other" onclick="enableBox('276')">
										<input id="otheranswer276" type="text" onchange="changeradioother('276')" disabled>
									</div>

									<div id="question">
										<h3>Avez-vous régulièrement des soucis au niveau des gencives (douleurs, saignements…) ?</h3>
									</div>
									<div id="answer">
										<label for="answer277">Oui</label>
										<input type="radio" name="answer277" value="oui" >
										<label for="answer277">Non</label>
										<input type="radio" name="answer277" value="non" >	
									</div>

									<div id="question">
										<h3>Avez-vous souvent des aphtes ?</h3>
									</div>
									<div id="answer">
										<label for="answer278">Oui</label>
										<input type="radio" name="answer278" value="oui" >
										<label for="answer278">Non</label>
										<input type="radio" name="answer278" value="non" >	
									</div>

									<div id="question">
										<h3>Avez-vous des amalgames dentaires, plombages ?</h3>
									</div>
									<div id="answer">
										<label for="answer279">Oui</label>
										<input type="radio" name="answer279" value="oui" >
										<label for="answer279">Non</label>
										<input type="radio" name="answer279" value="non" >	
									</div>   

									<div id="question">
										<h3>Si oui, combien ?</h3>
									</div>
									<div id="answer">
										<label for="answer280">Précisez</label>
										<input type="text" name="answer280" value="" placeholder="Précisez..." >
									</div>  
							<?php
								}
								if ($bloc11 == 1) 
								{
							?>
									<h2>VIII.	SYSTEME EMOTIONEL ET VIATLITE</h2>
									<label for="box11">systeme emotionel et vitalité</label>

									<div id="question">
										<h3>Sur une échelle de 1 à 10, comment évalueriez-vous votre vitalité ?</h3>
									</div>
									<div id="answer">
										<label for="answer281">Précisez</label>
										<input type="text" name="answer281" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Sur une échelle de 1 à 10, comment évalueriez-vous votre moral ?</h3>
									</div>
									<div id="answer">
										<label for="answer282">Précisez</label>
										<input type="text" name="answer282" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Sur une échelle de 1 à 10, comment évalueriez-vous votre stress ?</h3>
									</div>
									<div id="answer">
										<label for="answer283">Précisez</label>
										<input type="text" name="answer283" value="" placeholder="Précisez..." >
									</div>  

									<div id="question">
										<h3>Ressentez-vous du stress dans votre sphère professionnelle ? amicale ? familiale ?</h3>
									</div>
									<div id="answer">
										<label for="answer284">Précisez</label>
										<input type="text" name="answer284" value="" placeholder="Précisez..." >
									</div> 

									<div id="question">
										<h3>Comment ce stress ce manifeste-t-il ?</h3>
									</div>
									<div id="answer">
										<label for="answer285">tensions musculaires</label>
										<input type="radio" name="answer285" value="tensions musculaires" >
										<label for="answer285">problèmes digestifs et/ou intestinaux</label>
										<input type="radio" name="answer285" value="problèmes digestifs et/ou intestinaux" >
										<label for="answer285">troubles du sommeil</label>
										<input type="radio" name="answer285" value="troubles du sommeil" >
										<label for="answer285">fatigue</label>
										<input type="radio" name="answer285" value="fatigue" >
										<label for="answer285">maux de tête</label>
										<input type="radio" name="answer285" value="maux de tête" >
										<label for="answer285">migraine</label>
										<input type="radio" name="answer285" value="migraine" >
										<label for="answer285">autre</label>
										<input type="radio" name="answer285" id="other285"  value="other" onclick="enableBox('285')">
										<input id="otheranswer285" type="text" onchange="changeradioother('285')" disabled>
									</div>

									<div id="question">
										<h3>Comment vous sentez vous en ce moment ?</h3>
									</div>
									<div id="answer">
										<label for="answer286">fatigué(e)</label>
										<input type="radio" name="answer286" value="fatigué(e)" >
										<label for="answer286">sans motivation</label>
										<input type="radio" name="answer286" value="sans motivation" >
										<label for="answer286">en forme</label>
										<input type="radio" name="answer286" value="en forme" >
										<label for="answer286">motivé(e)</label>
										<input type="radio" name="answer286" value="motivé(e)" >
										<label for="answer286">enthousiaste</label>
										<input type="radio" name="answer286" value="enthousiaste" >
										<label for="answer286">résigné(e)</label>
										<input type="radio" name="answer286" value="résigné(e)" >
										<label for="answer286">soucieux(se)</label>
										<input type="radio" name="answer286" value="soucieux(se)" >
										<label for="answer286">à fleur de peau</label>
										<input type="radio" name="answer286" value="à fleur de peau" >
										<label for="answer286">autre</label>
										<input type="radio" name="answer286" id="other286"  value="other" onclick="enableBox('286')">
										<input id="otheranswer286" type="text" onchange="changeradioother('286')" disabled>
									</div>

									<div id="question">
										<h3>De manière générale, vous sentez vous épanoui dans votre vie ?</h3>
									</div>
									<div id="answer">
										<label for="answer287">Oui</label>
										<input type="radio" name="answer287" value="oui" >
										<label for="answer287">Non</label>
										<input type="radio" name="answer287" value="non" >	
									</div> 


									<div id="question">
										<h3>Comment vous caractérisez-vous de manière générale ?</h3>
									</div>
									<div id="answer">
										<label for="answer288">Anxieux(se)</label>
										<input type="radio" name="answer288" value="Anxieux(se)" >
										<label for="answer288">angoissé(e)</label>
										<input type="radio" name="answer288" value="angoissé(e)" >
										<label for="answer288">Serein(e)</label>
										<input type="radio" name="answer288" value="Serein(e)" >
										<label for="answer288">Optimiste</label>
										<input type="radio" name="answer288" value="Optimiste" >
										<label for="answer288">Pessimiste</label>
										<input type="radio" name="answer288" value="Pessimiste" >
										<label for="answer288">Joyeux(se)</label>
										<input type="radio" name="answer288" value="Joyeux(se)" >
										<label for="answer288">Triste</label>
										<input type="radio" name="answer288" value="Triste" >
										<label for="answer288">Nerveux(se)</label>
										<input type="radio" name="answer288" value="Nerveux(se)" >
										<label for="answer288">Calme</label>
										<input type="radio" name="answer288" value="Calme" >
										<label for="answer288">Introverti(e)</label>
										<input type="radio" name="answer288" value="Introverti(e)" >
										<label for="answer288">Extraverti(e)</label>
										<input type="radio" name="answer288" value="Extraverti(e)" >
										<label for="answer288">Dynamique</label>
										<input type="radio" name="answer288" value="Dynamique" >
										<label for="answer288">sans motivation</label>
										<input type="radio" name="answer288" value="sans motivation" >
										<label for="answer288">Fatigué</label>
										<input type="radio" name="answer288" value="Fatigué" >
										<label for="answer288">En pleine forme</label>
										<input type="radio" name="answer288" value="En pleine forme" >
									</div>

									<div id="question">
										<h3>Avez-vous déjà fait un burn-out ?</h3>
									</div>
									<div id="answer">
										<label for="answer289">Oui</label>
										<input type="radio" name="answer289" value="oui" >
										<label for="answer289">Non</label>
										<input type="radio" name="answer289" value="non" >	
									</div> 

									<div id="question">
										<h3>Êtes-vous sujet aux dépressions ?</h3>
									</div>
									<div id="answer">
										<label for="answer290">Oui</label>
										<input type="radio" name="answer290" value="oui" >
										<label for="answer290">Non</label>
										<input type="radio" name="answer290" value="non" >	
									</div> 

									<div id="question">
										<h3>Avez-vous déjà été traité pour dépression ?</h3>
									</div>
									<div id="answer">
										<label for="answer291">Oui</label>
										<input type="radio" name="answer291" value="oui" >
										<label for="answer291">Non</label>
										<input type="radio" name="answer291" value="non" >	
									</div>  

									<div id="question">
										<h3>Avez-vous déjà été suivi par un psychologue, psychiatre ?</h3>
									</div>
									<div id="answer">
										<label for="answer292">Oui</label>
										<input type="radio" name="answer292" value="oui" >
										<label for="answer292">Non</label>
										<input type="radio" name="answer292" value="non" >	
									</div> 
							<?php
								}
								if ($bloc12 == 1) 
								{
							?>
									<h2>IX.	SOMMEIL</h2>
									<label for="box12">sommeil</label>
									 
									 <div id="question">
										<h3>Sur une échelle de 1 à 10, concernant la qualité de votre sommeil, quelle note vous attribueriez-vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer293">Précisez</label>
										<input type="text" name="answer293" value="" placeholder="Précisez..." >	
									</div> 

									<div id="question">
										<h3>Sur une échelle de 1 à 10, quel est votre niveau d’énergie au réveil ?</h3>
									</div>
									<div id="answer">
										<label for="answer294">Précisez</label>
										<input type="text" name="answer294" value="" placeholder="Précisez..." >	
									</div> 

									<div id="question">
										<h3>A quelle heure vous couchez-vous en semaine ?</h3>
									</div>
									<div id="answer">
										<label for="answer295">Précisez</label>
										<input type="text" name="answer295" value="" placeholder="Précisez..." >	
									</div>

									<div id="question">
										<h3>le week-end ?</h3>
									</div>
									<div id="answer">
										<label for="answer296">Précisez</label>
										<input type="text" name="answer296" value="" placeholder="Précisez..." >	
									</div> 

									<div id="question">
										<h3>A quelle heure vous levez-vous en semaine ?</h3>
									</div>
									<div id="answer">
										<label for="answer297">Précisez</label>
										<input type="text" name="answer297" value="" placeholder="Précisez..." >	
									</div>  

									<div id="question">
										<h3>le week-end ?</h3>
									</div>
									<div id="answer">
										<label for="answer298">Précisez</label>
										<input type="text" name="answer298" value="" placeholder="Précisez..." >	
									</div> 

									<div id="question">
										<h3>Quelles sont vos habitudes précédant le coucher ?</h3>
									</div>
									<div id="answer">
										<label for="answer299">lecture</label>
										<input type="radio" name="answer299" value="lecture" >
										<label for="answer299">musique</label>
										<input type="radio" name="answer299" value="musique" >
										<label for="answer299">télévision</label>
										<input type="radio" name="answer299" value="télévision" >
										<label for="answer299">téléphone</label>
										<input type="radio" name="answer299" value="téléphone" >
										<label for="answer299">méditation</label>
										<input type="radio" name="answer299" value="méditation" >
										<label for="answer299">autre</label>
										<input type="radio" name="answer299" id="other299"  value="other" onclick="enableBox('299')">
										<input id="otheranswer299" type="text" onchange="changeradioother('299')" disabled>
									</div>

									<div id="question">
										<h3>Combien d’heures de sommeil pensez-vous avoir besoin pour être en forme ?</h3>
									</div>
									<div id="answer">
										<label for="answer300">Précisez</label>
										<input type="text" name="answer300" value="" placeholder="Précisez..." >	
									</div> 

									<div id="question">
										<h3>Avez-vous des problèmes de sommeil ?</h3>
									</div>
									<div id="answer">
										<label for="answer301">Oui</label>
										<input type="radio" name="answer301" value="oui" >
										<label for="answer301">Non</label>
										<input type="radio" name="answer301" value="non" >	
									</div>  

									<div id="question">
										<h3>Si oui lesquels ?</h3>
									</div>
									<div id="answer">
										<label for="answer302">difficultés d’endormissement</label>
										<input type="radio" name="answer302" value="difficultés d’endormissement" >
										<label for="answer302">réveils nocturnes fréquents</label>
										<input type="radio" name="answer302" value="réveils nocturnes fréquents" >
										<label for="answer302">réveil trop précoce</label>
										<input type="radio" name="answer302" value="réveil trop précoce" >
										<label for="answer302">sommeil de mauvaise qualité (agitation, cauchemars, etc.)</label>
										<input type="radio" name="answer302" value="sommeil de mauvaise qualité (agitation, cauchemars, etc.)" >
										<label for="answer302">ruminations mentales</label>
										<input type="radio" name="answer302" value="ruminations mentales" >
										<label for="answer302">autre</label>
										<input type="radio" name="answer302" id="other302"  value="other" onclick="enableBox('302')">
										<input id="otheranswer302" type="text" onchange="changeradioother('302')" disabled>
									</div>

									<div id="question">
										<h3>A quelle fréquence(en cas de réveils nocturnes)  ?</h3>
									</div>
									<div id="answer">
										<label for="answer303">plusieurs fois par nuit</label>
										<input type="radio" name="answer303" value="plusieurs fois par nuit" >
										<label for="answer303">une fois par nuit</label>
										<input type="radio" name="answer303" value="une fois par nuit" >
										<label for="answer303">plusieurs fois par semaine</label>
										<input type="radio" name="answer303" value="plusieurs fois par semaine" >
										<label for="answer303">une fois par semaine</label>
										<input type="radio" name="answer303" value="une fois par semaine" >
									</div> 


									<div id="question">
										<h3>À quelle heure ?</h3>
									</div>
									<div id="answer">
										<label for="answer304">Précisez</label>
										<input type="text" name="answer304" value="" placeholder="Précisez..." >	
									</div> 


									<div id="question">
										<h3>Y a-t-il des facteurs externes de réveils nocturnes (nourrissons, besoin d’aller aux toilettes, etc.) ?</h3>
									</div>
									<div id="answer">
										<label for="answer305">Oui</label>
										<input type="radio" name="answer305" value="oui" >
										<label for="answer305">Non</label>
										<input type="radio" name="answer305" value="non" >	
									</div> 

									<div id="question">
										<h3>Faites-vous une sieste pendant la journée ?</h3>
									</div>
									<div id="answer">
										<label for="answer306">Oui</label>
										<input type="radio" name="answer306" value="oui" >
										<label for="answer306">Non</label>
										<input type="radio" name="answer306" value="non" >	
									</div>  

									<div id="question">
										<h3>Si oui, combien de fois par semaine ?</h3>
									</div>
									<div id="answer">
										<label for="answer307">Précisez</label>
										<input type="text" name="answer307" value="" placeholder="Précisez..." >	
									</div> 

									<div id="question">
										<h3>Si oui, combien de temps en moyenne ?</h3>
									</div>
									<div id="answer">
										<label for="answer308">Précisez</label>
										<input type="text" name="answer308" value="" placeholder="Précisez..." >	
									</div>

									<div id="question">
										<h3>Ressentez-vous des moments de fatigue, au cours de votre journée ?</h3>
									</div>
									<div id="answer">
										<label for="answer309">Oui</label>
										<input type="radio" name="answer309" value="oui" >
										<label for="answer309">Non</label>
										<input type="radio" name="answer309" value="non" >	
									</div> 

									<div id="question">
										<h3>Si oui, à quel moment ?</h3>
									</div>
									<div id="answer">
										<label for="answer310">Précisez</label>
										<input type="text" name="answer310" value="" placeholder="Précisez..." >	
									</div> 

									<div id="question">
										<h3>Avez-vous recours à des médicaments (zolpidem, donormyl, etc.)  ou compléments alimentaires (mélatonine, valériane, camomille, etc.) pour dormir ?</h3>
									</div>
									<div id="answer">
										<label for="answer311">Oui</label>
										<input type="radio" name="answer311" value="oui" >
										<label for="answer311">Non</label>
										<input type="radio" name="answer311" value="non" >	
									</div> 

									<div id="question">
										<h3>Si oui, lequel/lesquels ?</h3>
									</div>
									<div id="answer">
										<label for="answer312">Précisez</label>
										<input type="text" name="answer312" value="" placeholder="Précisez..." >	
									</div> 

									<div id="question">
										<h3>Ronflez-vous ?</h3>
									</div>
									<div id="answer">
										<label for="answer313">Précisez</label>
										<input type="text" name="answer313" value="" placeholder="Précisez..." >	
									</div> 

									<div id="question">
										<h3>Faites-vous du bruxisme la nuit ?</h3>
									</div>
									<div id="answer">
										<label for="answer314">Oui</label>
										<input type="radio" name="answer314" value="oui" >
										<label for="answer314">Non</label>
										<input type="radio" name="answer314" value="non" >	
									</div> 

									<div id="question">
										<h3>Souffrez-vous du syndrome des jambes sans repos, crampes ?</h3>
									</div>
									<div id="answer">
										<label for="answer315">Oui</label>
										<input type="radio" name="answer315" value="oui" >
										<label for="answer315">Non</label>
										<input type="radio" name="answer315" value="non" >	
									</div>  

									<div id="question">
										<h3>Souffrez-vous d’apnée du sommeil ?</h3>
									</div>
									<div id="answer">
										<label for="answer316">Oui</label>
										<input type="radio" name="answer316" value="oui" >
										<label for="answer316">Non</label>
										<input type="radio" name="answer316" value="non" >	
									</div>   

									<div id="question">
										<h3>Si oui, êtes-vous appareillé ?</h3>
									</div>
									<div id="answer">
										<label for="answer317">Oui</label>
										<input type="radio" name="answer317" value="oui" >
										<label for="answer317">Non</label>
										<input type="radio" name="answer317" value="non" >	
									</div>   


								</div>
						<?php
							}
						?>
						</div>
					</center>

					<center>
						<input id="sendToPraticienButton" type="submit" name="sendThisToClient" value="ENVOYER AU PRATICIEN">
					</center>
				</div>
			</form>
			</div>
			<script type="text/javascript" src="view/startThisQuestionSheet/main.js"></script>
		</body>
	</html>

<?php
	}

	else
	{
		header("location:index.php");
	}


?>