<?php
require_once "Controller/DBManager.class.php";

$DBM = new DBManager();
$owner = $DBM->getOwner();


// Small form
if(isset($_POST['FormSubmit']) && $_POST['email']){

  $sub = $owner["firstname"] . " " . $owner["lastname"];

	$to = $_POST['email'];
	$subject = "You contacted " . $sub;
	$id = $_POST['name'];
	$content = $_POST['comment'];



  $headers = 'From: ' . $owner['email'] . " \r\n" .
    'Reply-To:' .$owner['email'] . "\r\n" .
    'Content-type: text/html; charset: utf8' . "\r\n" .
    'X-Mailer: PHP/' . phpversion() . "\r\n" .
    'MIME-Version: 1.0'. "\r\n" ;

	$msg = "
	<!DOCTYPE html>
	<html>
	<body>
	<h1>Hi, " . $id . "</h1>
	<p>You sent the following to the admin: " . $content . "</p>
	</body>
	</html>
	";

	$smallMailed = mail($to, $subject, $msg, $headers);

	$to2 = $owner["email"];
	$subject2 = $_POST['name'] . " has contacted you, admin admin!";
	$id2 = $owner["firstname"] . " " . $owner["lastname"];
	$content2 = $_POST['comment'];


  $headers2 = 'From: ' .$_POST['email'] . "\r\n" .
    'Reply-To:' .$_POST['email'] . "\r\n" .
    'Content-type: text/html; charset: utf8' . "\r\n" .
    'X-Mailer: PHP/' . phpversion() . "\r\n" .
    'MIME-Version: 1.0'. "\r\n" ;

    $phone = "";

    if( isset($_POST["telephone"]) && !empty($_POST["telephone"]) ) :
      $phone = "Phone number : " . $_POST["telephone"] ;
    else:
      $phone = "Phone number: Not Provided" ;
    endif;

	$msg2 = "
	<!DOCTYPE html>
	<html>
	<body>
	<h1>Hi, " . $id2 . "</h1>
  <p>". $phone . "</p>
	<p>" . $id . " said: " . $content2 . "</p>
	</body>
	</html>

	";

	$mailed = mail($to2, $subject2, $msg2, $headers2);

  if($mailed && $smallMailed):
    header("location: core.php?Mail=Success");
  else:
    header("location: core.php?Mail=Error");
  endif;
} else {
  header("location: core.php?Mail=Error");
}

?>
