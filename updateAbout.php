<?php require_once __DIR__ . '/common/auth.php'; ?>
<?php
$about_id = $_POST['about_id'];
$d1 = $_POST['d1'];
$title = $_POST['title'];
$d2 = $_POST['d2'];

include('connect.php');
$sql_user = "UPDATE `about` SET `title`='$title',`description1`='$d1',`description2`='$d2' WHERE id='$about_id'";
if ($conn->query($sql_user) === TRUE) {
    echo "New record created successfully";
    echo "<script>
        window.location.href = 'about.php';
      </script>";
}
?>