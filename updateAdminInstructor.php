<?php require_once __DIR__ . '/common/auth.php'; ?>
<?php
if (isset($_POST)) {

    $id = $_POST['id'];
    $course = $_POST['course'];
    $instructor = $_POST['instructor'];
    

    include('connect.php');

    $sql_course = "UPDATE `admininstructor` SET `name`='$instructor',`course`='$course' WHERE id = '$id'";

    if ($conn->query($sql_course) === TRUE) {
        echo "New record created successfully";
        echo "<script>
        window.location.href = 'adminInstructor.php';
      </script>";
    }
}
