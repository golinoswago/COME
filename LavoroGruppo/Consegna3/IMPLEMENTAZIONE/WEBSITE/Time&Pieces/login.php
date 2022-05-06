	<!DOCTYPE HTML>
<!--
	Miniport by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
session_start();
if(isset($_SESSION["mail"])){
	echo '<script>
  alert("Mail inviata!");
</script>';
}
?>
<html>
	<head>
		<title>Time&Pieces - Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/login.css" />
		<style>

		</style>
	</head>
	<body class="is-preload">
	 
		<!-- Home -->
			<article>
				<div class="">
					<div class="row">
						<div class="col-7" style="background:url('images/login.jfif')">
						</div>
						<div class="col-5">
							<form action="index.php" method="post">

							  <div class="container">
								<label for="uname"><b>Username:</b></label>
								<input type="text" id="username" placeholder="Enter Username" name="uname" required>

								<label for="psw"><b>Password:</b></label>
								<input type="password" id="password" placeholder="Enter Password" name="psw" required>

								<button type="submit">Login</button>
								<label>
								  <input type="checkbox" checked="checked" name="remember"> Remember me:
								</label>
							  </div>

							  <div class="container" style="background-color:#f1f1f1">
								<button type="button" class="cancelbtn">Cancel</button>
								<span class="psw">Forgot <a href="http://localhost/Time&Pieces/forgot.php">password?</a></span>
							  </div>
							</form>
						</div>
					</div>
				</div>
			</article>

		<!-- Contact -->
				<article id="contact" class="wrapperfooter style4">
						<footer>
							<ul id="copyright">
								<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>$
							</ul>
						</footer>
					</div>
				</article>
			
							</div>
				<?php
				endwhile;
				

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

^
