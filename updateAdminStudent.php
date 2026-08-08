<?php require_once __DIR__ . '/common/auth.php'; ?>
<?php
if (isset($_POST)) {
 
    $id = $_POST['id'];
    $name = $_POST['name'];
    $cmt = $_POST['comment'];


    include('connect.php');

    $sql_course = "UPDATE `adminstudent` SET `name`='$name',`comment`='$cmt' WHERE adminstudent.id='$id';";

    if ($conn->query($sql_course) === TRUE) {
        echo "New record created successfully";
        echo "<script>
        window.location.href = 'adminStudent.php';
      </script>";
    }
}
