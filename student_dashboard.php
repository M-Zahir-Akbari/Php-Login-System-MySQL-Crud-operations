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

$studentsSql = "SELECT * FROM Students";
$studentsResult = $conn->query($studentsSql);

$teachersSql = "SELECT * FROM Teachers";
$teachersResult = $conn->query($teachersSql);

$subjectsSql = "SELECT * FROM Subjects";
$subjectsResult = $conn->query($subjectsSql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="student_dashboard.css" />
</head>

<body>
    <h1>Welcome, dear student!</h1>
    <br />
    <hr />
    <br />
    <div class="container">
        <div class="button-container">
            <button id="viewTeachers" class="teacher_btn">View Teachers</button>
            <button id="viewSubjects" class="subject_btn">View Subjects</button>
            <button id="viewStudents" class="student_btn">View Students</button>
        </div>

        <div id="teachersList" style="display: none">
            <h2 id="h21">Teachers List:</h2>
            <ol class="list">
                <?php
                while ($row = $teachersResult->fetch_assoc()) {
                    echo "
          <li>" . $row['teacher_name'] . "</li>
          ";
                } ?>
            </ol>
        </div>

        <div id="subjectsList" style="display: none">
            <h2 id="h22">Subjects List:</h2>
            <ol>
                <?php
                while ($row = $subjectsResult->fetch_assoc()) {
                    echo "
          <li>" . $row['subject_name'] . "</li>
          ";
                } ?>
            </ol>
        </div>

        <div id="studentsList" style="display: none">
            <h2 id="h23">Students List:</h2>
            <ol>
                <?php
                while ($row = $studentsResult->fetch_assoc()) {
                    echo "
          <li>" . $row['student_name'] . "</li>
          ";
                } ?>
            </ol>
        </div>
    </div>
    <br />
    <hr />
    <br />

    <a href="logout.html">Log out</a>

    <br />
    <br />
    <hr />
    <br />

    <script>
        document.getElementById("viewTeachers").addEventListener("click", function() {
            document.getElementById("teachersList").style.display = "block";
            document.getElementById("subjectsList").style.display = "none";
            document.getElementById("studentsList").style.display = "none";
        });

        document.getElementById("viewSubjects").addEventListener("click", function() {
            document.getElementById("teachersList").style.display = "none";
            document.getElementById("subjectsList").style.display = "block";
            document.getElementById("studentsList").style.display = "none";
        });

        document.getElementById("viewStudents").addEventListener("click", function() {
            document.getElementById("teachersList").style.display = "none";
            document.getElementById("subjectsList").style.display = "none";
            document.getElementById("studentsList").style.display = "block";
        });
    </script>
</body>

</html>