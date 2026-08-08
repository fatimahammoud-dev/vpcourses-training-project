<?php require_once __DIR__ . '/common/auth.php'; ?>
<?php
if (isset($_POST)) {

    $id = $_POST['id'];
    $course = $_POST['course'];
    $instructor = $_POST['instructor'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];
    $stdNbr = $_POST['stdNbr'];


    include('connect.php');

    $sql_course = "UPDATE `admincourse` SET `instructor`='$instructor',`course_name`='$course',
        `price`='$price',`duration`='$duration',`student_number`='$stdNbr' WHERE id = '$id'";

    if ($conn->query($sql_course) === TRUE) {
        echo "New record created successfully";
        echo "<script>
        window.location.href = 'adminCourse.php';
      </script>";
    }
}
