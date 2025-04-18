<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "userinfo_database";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Asia/Kolkata'); // Use your timezone
$current_time = date('Y-m-d H:i');

$sql = "SELECT * FROM events WHERE reminder_time = '$current_time'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($event = $result->fetch_assoc()) {
        $to = $event['user_email'];
        $subject = "⏰ Event Reminder: " . $event['event_title'];
        $message = "Hi!\n\nThis is a reminder for your event:\n\n" .
                   "Title: " . $event['event_title'] . "\n" .
                   "Date: " . $event['event_date'] . "\n" .
                   "Description: " . $event['event_description'] . "\n\n" .
                   "Thanks,\nInteractive Calendar";
        $headers = "From: calendar@yourdomain.com";

        mail($to, $subject, $message, $headers);
    }
}

$conn->close();
?>
