<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $orderNumber = htmlspecialchars(trim($_POST["order-number"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Recipient email (change this to your email address)
    $to = "thesofadiseno@gmail.com";
    $subject = "New Contact Form Submission - Sofa DiseñO";

    // Email body
    $body = "You have received a new message from Sofa DiseñO contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Order Number: $orderNumber\n";
    $body .= "Message:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Thank you! Your message has been sent.'); window.history.back();</script>";
    } else {
        echo "<script>alert('Sorry! Something went wrong. Please try again later.'); window.history.back();</script>";
    }
} else {
    echo "Invalid Request";
}
?>
