<?php
session_start();
// Set session variables
$_SESSION["mail"] = $_POST["mail"];

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

$sql = "SELECT PASSWORD FROM utenti where EMAIL='".$_SESSION["mail"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	$_SESSION["password"]=$row["PASSWORD"];
  }
} else {
  echo "0 results";
}
$conn->close();
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
 
require './PHPMailer-master/src/Exception.php'; 
require './PHPMailer-master/src/PHPMailer.php'; 
require './PHPMailer-master/src/SMTP.php'; 
 
$mail = new PHPMailer; 
 
$mail->isSMTP();                      // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;               // Enable SMTP authentication 
$mail->Username = '';   // SMTP username 
$mail->Password = '';   // SMTP password 
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;                    // TCP port to connect to 
 
// Sender info 
$mail->setFrom('NOREPLY', 'TEAM TIME&PIECES'); 
$mail->addReplyTo('NOREPLY', 'TEAM TIME&PIECES'); 
 
// Add a recipient 
$mail->addAddress($_POST["mail"]); 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'Email di recupero TIME&PIECES'; 
 
// Mail body content 
$bodyContent = '<h1>Buongiorno</h1>'; 
$bodyContent .= '<p>La sua password è la seguente: <b>'.$_SESSION["password"].'</b></p>'; 
$mail->Body    = $bodyContent; 

// Send email 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
    echo 'Message has been sent.'; 
} 
header('Location: login.php');
?>