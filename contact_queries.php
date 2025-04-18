<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Save to the database
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "userinfo_database";
    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO contact_queries (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Send email notification (optional)
    $to = "your-email@example.com";  // Replace with your email
    $subject = "New Contact Us Query from $name";
    $email_message = "You have received a new query from:\n\nName: $name\nEmail: $email\nMessage: $message";
    $headers = "From: noreply@yourwebsite.com";

    if (mail($to, $subject, $email_message, $headers)) {
        echo "<script>alert('Your message has been sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('There was an error sending your message.'); window.location.href='index.html';</script>";
    }
}
?>
