<?php
$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_message = $_POST['message'];

    $conn = mysqli_connect("localhost", "root", "", "contact_db");

    $sql = "INSERT INTO contacts(name,email,message)
            VALUES('$name','$email','$user_message')";

    if(mysqli_query($conn, $sql)){
        $message = "Message Sent Successfully!";
    }else{
        $message = "Error!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="style.css">     
</head>
<body>

<div class="contact-form">
    <h2>Contact Us</h2>

    <p><?php echo $message; ?></p>

    <form method="POST">
        <input type="text" name="name" placeholder="Your Name" required>

        <input type="email" name="email" placeholder="Your Email" required>

        <textarea name="message" placeholder="Your Message" required></textarea>

        <button type="submit">Send Message</button>
    </form>
</div>

</body>
</html>