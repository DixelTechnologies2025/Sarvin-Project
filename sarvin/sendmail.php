<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{

$name = strip_tags(trim($_POST["form_name"]));
$email = filter_var(trim($_POST["form_email"]), FILTER_SANITIZE_EMAIL);
$message = trim($_POST["form_message"]);

if(empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL))
{
echo "Please fill all required fields.";
exit;
}

$admin_email = "sarvinenterprises9@gmail.com";

$subject = "New Contact Message - Sarvin Enterprises";

/* ADMIN EMAIL TEMPLATE */

$admin_message = "
<html>
<head>
<title>New Contact Message</title>
</head>

<body style='font-family:Arial;'>

<h2>New Contact Form Message</h2>

<table style='border-collapse:collapse;' border='1' cellpadding='10'>

<tr>
<td><b>Name</b></td>
<td>$name</td>
</tr>

<tr>
<td><b>Email</b></td>
<td>$email</td>
</tr>

<tr>
<td><b>Message</b></td>
<td>$message</td>
</tr>

</table>

</body>
</html>
";

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=UTF-8\r\n";
$headers .= "From: Sarvin Enterprises <no-reply@sarvinenterprises.com>\r\n";

/* SEND MAIL TO ADMIN */

$mail_admin = mail($admin_email, $subject, $admin_message, $headers);

/* THANK YOU MAIL TO USER */

$user_subject = "Thank You for Contacting Sarvin Enterprises";

$user_message = "
<html>

<body style='font-family:Arial;background:#f5f5f5;padding:20px;'>

<div style='max-width:600px;margin:auto;background:#ffffff;padding:30px;border-radius:5px;'>

<h2 style='color:#1A4137;'>Thank You $name</h2>

<p>We received your message. Our team will contact you soon.</p>

<p><b>Your Message:</b></p>

<p>$message</p>

<hr>

<p>
<b>Sarvin Enterprises</b><br>
Flat no S-5,Sri Nilayam Apartment<br>
Yellareddy Guda, Ameerpet<br>
Hyderabad - 500073<br>
Phone : +91 9640011853
</p>

</div>

</body>

</html>
";

$user_headers  = "MIME-Version: 1.0\r\n";
$user_headers .= "Content-type:text/html;charset=UTF-8\r\n";
$user_headers .= "From: Sarvin Enterprises <no-reply@sarvinenterprises.com>\r\n";

$mail_user = mail($email, $user_subject, $user_message, $user_headers);

if($mail_admin)
{
echo "success";
}
else
{
echo "Mail sending failed.";
}

}

?>