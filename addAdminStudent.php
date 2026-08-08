<?php require_once __DIR__ . '/common/auth.php'; ?>
<script src="js/sweetAlert.js"></script>
<?php
if (isset($_POST)) {
    
    $comment = $_POST['comment'];
    $std = $_POST['student'];
}
require("connect.php");
if (isset($_FILES["my_work"])) {
    $errors = array();
    $image_name = $_FILES['my_work']['name'];
    $image_type = $_FILES['my_work']['type'];
    $image_tmp_name = $_FILES['my_work']['tmp_name'];
    $image_size = $_FILES['my_work']['size'];
    $image_error = $_FILES['my_work']['error'];
    $allowed_extensions = array(
        'jpg', 'gif', 'png', 'jpeg'
    );

    $image_extension_array = explode('.', $image_name);
    $image_extension = strtolower(end($image_extension_array));

    $target_file = "vpCourses/img/students/" . $image_name;

    if ($image_error == 4) {
        $errors[] = "<div>No file uploaded Yet</div>";
    } else {

        if ($image_size > 10000000) {
            $errors[] = "<div>File Can't be more than 10,000,000 bytes (10000 KB)</div>";
        }

        if (!in_array(
            $image_extension,
            $allowed_extensions
        )) {
            $errors[] = "<div>File is not valid</div>";
        }
    }

    if (empty($errors)) {
        if (file_exists($target_file)) {

            $count = 0;
            $file_name_without_extension = pathinfo($image_name, PATHINFO_FILENAME);
            $file_extension = pathinfo($image_name, PATHINFO_EXTENSION);

            while (file_exists("vpCourses/img/students/" . $image_name)) {
                $count++;
                $image_name = $file_name_without_extension . "-" . $count . "." . $file_extension;
                $target_file = "vpCourses/img/students/" . $image_name;
            }
        }

        $result = move_uploaded_file($_FILES['my_work']['tmp_name'], $target_file);
        if ($result) {
            $sql1 = "INSERT INTO `adminstudent`(`name`, `comment`, `std_image`)
             VALUES ('$std','$comment','$image_name')";

            if ($conn->query($sql1) === TRUE) {
                echo "0";
                echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'New Student Added successfully',
                                    // timer: 2000, // Show the alert for 2 seconds
                                    showConfirmButton: true
                                }).then(function() {
                                    window.location.href = 'adminStudent.php';
                                });
                        </script>";
            }
            $conn->close();
        } else {
            echo "Image Can't be uploaded";
        }
    } else {
        foreach ($errors as $error) {
            echo  $error;
        }
    }
}

?>