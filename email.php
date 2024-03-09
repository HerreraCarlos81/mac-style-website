<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = trim($_POST["subject"]);
    $recipient = "contato@codedneurons.com"; // CHANGE THIS TO YOUR EMAIL
    $headers = "Contato de: $name <$email>";

    // Email content
    $email_content = "Nome: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Assunto: $subject\n";

    // Send the email
    mail($recipient, $subject, $email_content, $headers);
    
    // Redirect to a thank-you page or back to the form
    header("Location: index.html");
} else {
    // Not a POST request, redirect to the form or error page
    header("Location: index.html");
    exit;
}
?>