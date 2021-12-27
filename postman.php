<?php
if(isset($_POST['email'])) {

// Email and subject.
$email_to = "abel.fenykep@gmail.com";
$email_subject = $_POST['mifele']."_".$_POST['mennyiert'];      

$message = $_POST['msg']; // required
$phone = $_POST['telo'];
$email_from = $_POST['email']; // required

// create email content
$email_content = "From:"." ".$email_from."\n"."Message:"." ".$message; 

//mail
mail($email_to, $email_subject, $email_content);

}
//return to contact page after submit.
header("location:danke.html");
?>