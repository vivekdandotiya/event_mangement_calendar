<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// DB connection
$conn = new mysqli("localhost", "root", "", "userinfo_database");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$date = $_POST['eventDate'] ?? '';
$title = $_POST['eventTitle'] ?? '';
$description = $_POST['eventDescription'] ?? '';
$reminder = $_POST['reminderTime'] ?? '';

// Insert data
$stmt = $conn->prepare("INSERT INTO events (event_date, title, description, reminder_time) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $date, $title, $description, $reminder);

if ($stmt->execute()) {
    echo "<script>
        alert('Event saved successfully!');
        window.location.href = 'calendar.html';
    </script>";
} else {
    echo "<script>
        alert('Failed to save event.');
        window.location.href = 'calendar.html';
    </script>";
}

$stmt->close();
$conn->close();
?>
