<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $subscriberEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($subscriberEmail, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address.'); history.back();</script>";
        exit;
    }

    $to = "asowemedia@gmail.com"; // 🔁 Replace with YOUR email address
    $subject = "New Newsletter Subscription";
    $message = "Someone has subscribed to your newsletter:\n\nEmail: $subscriberEmail";

    $headers = "From: \r\n";
    $headers .= "Reply-To: $subscriberEmail\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>
            alert('Thank you for subscribing!');
            window.location.href = './index.html';
        </script>";
    } else {
        echo "<script>
            alert('Failed to subscribe. Please try again later.');
            history.back();
        </script>";
    }
} else {
    echo "Invalid request.";
}
?>
