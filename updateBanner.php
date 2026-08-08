<?php require_once __DIR__ . '/common/auth.php'; ?>
<?php
$slider_id = $_POST['slider_id'];
$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];


include('connect.php');
$sql_user = "UPDATE `carusel` SET `descriptioin1`='$d1',`descriptioin2`='$d2',`descriptioin3`='$d3' WHERE slider_id='$slider_id'";
if ($conn->query($sql_user) === TRUE) {
    echo "New record created successfully";
    echo "<script>
        window.location.href = 'banner.php';
      </script>";
}
