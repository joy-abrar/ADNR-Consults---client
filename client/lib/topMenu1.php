<div id="topMenuNav">
	<div>
		<img id="logoImage" src="images/logo.png" alt="logo_png">
	</div>

	<div id="usernameTopNav">
	      <ul class="navbar">
	        <li>
	          <a id="usernameTopNavLink" href="#"><?= base64_decode($_SESSION['userName']) ?></a>
	        </li>
	      </ul>
	</div>

	<div id="searchBox">
		<form method="POST" action="../../index.php?action=mySearchResult">
			<input id="searchBoxTopNav" type="search" name="searchBox" autocomplete="off" placeholder="Recherchez vos praticiens...">
			<button><img src="../../lib/css/images/magnifier.png"></button>
		</form>
	</div>

	<div id="timeClock">
	 	<i id="clock" class="fa-solid fa-clock"></i>&nbsp;
		<p id="time"></p>&nbsp;
		<p id="day"></p>&nbsp;&nbsp;
		<p id="date"></p>
	</div>

	<div id="agenda">	
		<!--<a id="agendaLink" href="../../index.php?action=agenda"><i class="fa-solid fa-calendar-days" onclick="dashboardAppearence('rendezvous')"></i></a>-->
	</div>

	<div id="username">	
		<a id="usernameLink" href="../../index.php"><i class="fa-solid fa-user-tie"></i> <?= base64_decode($_SESSION['userName']) ?> </i></a>
	</div>

	<div id="logout">
		<a id="logoutLink" href="../../index.php?action=logout"><i class="fa-solid fa-power-off"></i></a>
	</div>
</div>