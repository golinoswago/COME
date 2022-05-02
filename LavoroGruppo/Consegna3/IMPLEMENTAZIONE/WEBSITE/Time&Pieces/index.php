<?php
session_start();
// Set session variables
$_SESSION["uname"] = $_POST["uname"];
$_SESSION["psw"] = $_POST["psw"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tep";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT NOME, COGNOME, FOTO FROM utenti where USERNAME='".$_SESSION["uname"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	$_SESSION["nome"]=$row["NOME"];
	$_SESSION["cognome"]=$row["COGNOME"];
	$_SESSION["foto"]=$row["FOTO"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<!DOCTYPE HTML>
<!--
	Miniport by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Miniport by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Nav -->
			<nav id="nav">
				<ul class="container">
					<li><a href="#top">Time&Pieces Logo</a></li>
				</ul>
			</nav>

		<!-- Home -->
			<article id="top" class="wrapper style1">
				<div class="container">
					<div class="row">
						<div class="col-4 col-5-large col-12-medium">
							<span class="image fit"><img src="images/<?php echo ucfirst($_SESSION["foto"]);?>" alt="" /></span>
						</div>
						<div class="col-6 col-7-large col-12-medium">
							<header>
								<h1>Ciao <strong><?php echo ucfirst($_SESSION["nome"]); echo " ".ucfirst($_SESSION["cognome"]);?></strong>.</h1>
							</header>
							<p><strong>Benvenuto</strong>, gestisci i tuoi timesheet e le tue attività!</p>
						</div>
					</div>
					<div class="row aln-center">
						<div class="col-4 col-6-medium col-12-small">
							<section class="box style1">
								<span class="icon featured fa-comments"></span>
								<h3>Gestione Attività</h3>
							</section>
						</div>
						<div class="col-4 col-6-medium col-12-small">
							<section class="box style1">
								<span class="icon solid featured fa-camera-retro"></span>
								<h3>Resoconti</h3>
							</section>
						</div>
						<div class="col-4 col-6-medium col-12-small">
							<section class="box style1">
								<span class="icon featured fa-thumbs-up"></span>
								<h3>Pizza e fichi</h3>
							</section>
						</div>
					</div>
				</div>
			</article>

		<!-- Contact -->
			<article id="contact" class="wrapperfooter style4">
				<div class="container small">
					<footer>
						<ul id="copyright">
							<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</footer>
				</div>
			</article>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>