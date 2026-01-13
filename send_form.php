<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Destination Email
    $to = "b1wgod@live.com";
    
    // Sanitize Inputs
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject_type = $_POST["subject"];
    $message = trim($_POST["message"]);

    // Email Content
    $email_subject = "Padua.net Submission: $subject_type from $name";
    $email_body = "You have received a new message from Padua.net.\n\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Type: $subject_type\n\n".
                  "Message:\n$message";

    $headers = "From: $email";

    // Send Email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<h1>Thank you, $name.</h1><p>Your testimony has been received for the glory of God. <a href='index.html'>Click here to return home</a>.</p>";
    } else {
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    echo "There was a problem with your submission, please try again.";
}
?>