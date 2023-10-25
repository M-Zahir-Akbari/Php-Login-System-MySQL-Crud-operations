<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uni";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$enteredPassword = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['password'];

    if (password_verify($enteredPassword, $hashedPassword)) {
        $userType = ($username === 'teacher') ? 'teacher' : 'student';

        $_SESSION['usertype'] = $userType;

        if ($userType === "teacher") {
            header("Location: teacher_dashboard.php");
        } elseif ($userType === "student") {
            header("Location: student_dashboard.php");
        }
    } else {
        echo "<script>alert('Invalid password');</script>";
    }
} else {
    echo "<script>alert('User not found');</script>";
}

$conn->close();
?>