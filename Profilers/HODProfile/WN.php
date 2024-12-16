<?php
session_start();

if (isset($_SESSION['husername'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "revised";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get form data
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $department = $_SESSION['department']; // Assuming session stores department

        // Get email addresses from students in the 'slogin' table
        $sql = "SELECT Email FROM basicdetails WHERE Branch= '$Branch'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Send email to each student
            while ($row = $result->fetch_assoc()) {
                $to = $row['email'];
                $headers = "From: abisha27004@example.com" . "\r\n" . "Content-Type: text/html; charset=UTF-8";
                $email_subject = "Notification: $subject";
                $email_message = "
                <html>
                <head><title>$subject</title></head>
                <body>
                <p>$message</p>
                </body>
                </html>
                ";

                // Send email
                if (!mail($to, $email_subject, $email_message, $headers)) {
                    echo "Error sending email to $to<br>";
                }
            }
            echo "Emails sent successfully!";
        } else {
            echo "No students found in this department.";
        }

        $conn->close();
    }
} else {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Notifications</title>
</head>
<body>
    <form action="WN.php" method="POST">
        <label for="subject">Subject:</label><br>
        <input type="text" id="subject" name="subject" required><br><br>
        
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="5" required></textarea><br><br>
        
        <button type="submit">Post Notification</button>
    </form>
</body>
</html>
