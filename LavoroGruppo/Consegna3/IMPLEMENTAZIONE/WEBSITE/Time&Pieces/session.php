<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["uname"] = $_POST["uname"];
$_SESSION["psw"] = $_POST["psw"];
echo "Session variables are set.";
echo $_SESSION["uname"];
echo "<br>".$_POST["uname"];
?>
</body>
</html>