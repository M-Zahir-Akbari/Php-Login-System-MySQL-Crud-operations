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

$studentName = "";
$subjectName = "";

$updateStudentId = "";
$updateStudentName = "";
$updateSubjectId = "";
$updateSubjectName = "";

$deleteStudentId = "";
$deleteSubjectId = "";

$message = "";

if (isset($_POST['addStudent'])) {
    $studentName = $_POST['studentName'];
    $sql = "INSERT INTO Students (student_name) VALUES ('$studentName')";
    if ($conn->query($sql) === TRUE) {
        $message = "Student added successfully.";
        $studentName = ""; // Clear the input field after successful submission
    } else {
        $message = "Error: " . $conn->error;
    }
}

if (isset($_POST['updateStudent'])) {
    $updateStudentId = $_POST['updateStudentId'];
    $updateStudentName = $_POST['updateStudentName'];
    $sql = "UPDATE Students SET student_name = '$updateStudentName' WHERE student_id = $updateStudentId";
    if ($conn->query($sql) === TRUE) {
        $message = "Student updated successfully.";
        $updateStudentName = ""; // Clear the input field after successful submission
    } else {
        $message = "Error: " . $conn->error;
    }
}

if (isset($_POST['deleteStudent'])) {
    $deleteStudentId = $_POST['deleteStudentId'];
    $sql = "DELETE FROM Students WHERE student_id = $deleteStudentId";
    if ($conn->query($sql) === TRUE) {
        $message = "Student deleted successfully.";
    } else {
        $message = "Error: " . $conn->error;
    }
}

if (isset($_POST['updateSubject'])) {
    $updateSubjectId = $_POST['updateSubjectId'];
    $updateSubjectName = $_POST['updateSubjectName'];
    $sql = "UPDATE Subjects SET subject_name = '$updateSubjectName' WHERE subject_id = $updateSubjectId";
    if ($conn->query($sql) === TRUE) {
        $message = "Subject updated successfully.";
        $updateSubjectName = ""; // Clear the input field after successful submission
    } else {
        $message = "Error: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="teacher_dashboard.css">
</head>

<body>
    <h1>Welcome, dear teacher</h1>
    <hr />

    <script>
        <?php if (!empty($message)) : ?>
            alert("<?php echo $message; ?>");
        <?php endif; ?>
    </script>

    <h2>Add Students:</h2>
    <form method="post" class="add_form">
        <input type="text" name="studentName" placeholder="Student Name" value="<?php echo $studentName; ?>" class="text">
        <button type="submit" name="addStudent" class="add_btn">Add Student</button>
    </form><br>

    <h2>Update Students:</h2>
    <form method="post" class="update_form">
        <select name="updateStudentId">
            <?php
            $studentQuery = $conn->query("SELECT * FROM Students");
            while ($row = $studentQuery->fetch_assoc()) {
                echo "<option value='" . $row['student_id'] . "'>" . $row['student_name'] . "</option>";
            }
            ?>
        </select>
        <input type="text" name="updateStudentName" placeholder="New Student Name" value="<?php echo $updateStudentName; ?>" class="text">
        <button type="submit" name="updateStudent" class="update_btn">Update Student</button>
    </form><br>

    <h2>Delete Students:</h2>
    <form method="post" class="delete_form">
        <select name="deleteStudentId">
            <?php
            $studentQuery = $conn->query("SELECT * FROM Students");
            while ($row = $studentQuery->fetch_assoc()) {
                echo "<option value='" . $row['student_id'] . "'>" . $row['student_name'] . "</option>";
            }
            ?>
        </select>
        <button type="submit" name="deleteStudent" class="delete_btn">Delete Student</button>
    </form>
    <br>
    <hr>


    <h2>Update Subjects:</h2>
    <form method="post" class="update_form">
        <select name="updateSubjectId">
            <?php
            $subjectQuery = $conn->query("SELECT * FROM Subjects");
            while ($row = $subjectQuery->fetch_assoc()) {
                echo "<option value='" . $row['subject_id'] . "'>" . $row['subject_name'] . "</option>";
            }
            ?>
        </select>
        <input type="text" name="updateSubjectName" placeholder="New Subject Name" value="<?php echo $updateSubjectName; ?>" class="text">
        <button type="submit" name="updateSubject" class="update_btn">Update Subject</button>
    </form><br>
    <br />
    <hr />
    <br />

    <a href="logout.html">Log out</a>

    <br />
    <br />
    <hr />
    <br />
</body>

</html>

<?php
$conn->close();
?>