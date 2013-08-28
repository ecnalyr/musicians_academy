<?php
$errors = '';
$myemail = 'ecnalyr@gmail.com';
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['question']))
{
    $errors .= "\n Error: Name, email, and question are required.";
}
 
$name = $_POST['name']; 
$email_address = $_POST['email'];
$source = $_POST['source'];
$question = $_POST['question']; 
 
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
 
{
 
$to = $myemail;
 
$email_subject = "Contact form submission: $name";
 
$email_body = "You have received a new question. ".
 
" Here are the details:\n Name: $name \n ".

"Source: $source \n".
 
"Email: $email_address\n Question \n $question";
 
$headers = "From: $myemail\n";
 
$headers .= "Reply-To: $email_address";
 
mail($to,$email_subject,$email_body,$headers);
 
//redirect to the 'thank you' page
 
header('Location: thank-you.html');
 
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>