<?php require_once __DIR__ . '/common/auth.php'; ?>
<style>
    #addNewImage {
        background-color: green;

    }

    #deleteImage {
        background-color: red;
    }

    #deleteImage,
    #addNewImage {
        border: 0px;
        color: white;
        padding: 10px;
    }
</style>
<?php 
require('common/header.php');
$id = $_GET['id'];
require('connect.php');
$sql = "SELECT * FROM `admincourse` WHERE admincourse.id = '$id' ";
$result = $conn->query($sql);
$courses = $result->fetch_assoc();
if ($_POST) {
    if ($_FILES && $_FILES['images']['name']) {
        $target_dir = "vpCourses/img/courses/";
        $extension = strtolower(pathinfo($_FILES["images"]["name"], PATHINFO_EXTENSION));
        $img_name = str_replace("." . $extension, "", basename($_FILES["images"]["name"]));
        $count = 0;
        $image_name = $_FILES["images"]["name"];
        while (file_exists($target_dir . $image_name)) {
            $count++;
            $image_name = $img_name . "-" . $count . "." . $extension;
        }

        $target_file = $target_dir . $image_name;

        $result = move_uploaded_file($_FILES['images']['tmp_name'], $target_file);

        if ($result) {
            $sql = "UPDATE admincourse SET course_image='$image_name' WHERE id = " . $courses['id'];
            $conn->query($sql);
        }
   } elseif (isset($_POST['deleteImage'])) {
    $imageToDelete = basename($_POST['imageNameToDelete'] ?? '');
    $pathToDelete = __DIR__ . "/vpCourses/img/courses/" . $imageToDelete;

    if ($imageToDelete !== '' && is_file($pathToDelete)) {
        unlink($pathToDelete);
    }

    $sql = "UPDATE admincourse SET course_image=NULL WHERE id = " . $courses['id'];
    $conn->query($sql);
}
}
?>


<body>

    <!-- Sidebar Start -->
    <?php require('common/sidebar.php'); ?>
    <!-- Sidebar End -->
    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <?php require('common/navbar.php'); ?>
        <!-- Navbar End -->
        <div class="container-fluid pt-4">

            <div class="row g-4 min-vh-100 rounded justify-content-center mx-0">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <div class="row">
                            <?php
                            require('connect.php');
                            $imageName = "";
                            $sql = "SELECT course_image FROM admincourse WHERE id = " . $courses['id'];
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $imageName = $row['course_image'];
                                }
                            }

                            if ($imageName) {
                                echo "<div>";
                                echo "<img class='' src='vpCourses/img/courses/$imageName' alt='Uploaded Image' width='100px' ><br>";
                                echo "<form action='' method='post' class='mt-2'>";
                                echo "<input type='hidden' name='imageNameToDelete' value='$imageName'>";
                                echo "<input type='submit' id='deleteImage' name='deleteImage' value='Delete Image'>";
                                echo "</form>";
                                echo "</div>";
                            } else {
                                echo "<form action='' method='post' enctype='multipart/form-data'>";
                                echo "<input type='file' class='mb-2'  name='images' id='fileToUpload'>";
                                echo "<br/>";
                                echo "<input type='submit'  value='Save' id='addNewImage' name='submit'>";
                                echo "</form>";
                            }
                            ?>

                            <form action="updateAdminCourse.php" method="post" class="mt-4">

                                <div class="input-group mb-3" hidden>
                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">ID</span>
                                    <input type="text" class="form-control" id="userID" name="id" value="<?php echo $courses['id'] ?>" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">Course Name</span>
                                    <input type="text" class="form-control" id="#" name="course" value="<?php echo $courses['course_name'] ?>" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">instructor Name</span>
                                    <input type="text" class="form-control" id="#" name="instructor" value="<?php echo $courses['instructor'] ?>" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">price</span>
                                    <input type="number" class="form-control" id="instructorID" name="price" value="<?php echo $courses['price'] ?>" required>
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">duration</span>
                                    <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $courses['duration'] ?>" required>
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">Student Number</span>
                                    <input type="number" class="form-control" id="phoneNumber" name="stdNbr" value="<?php echo $courses['student_number'] ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary float-end border-0" style="background-color: #f6de64;color:white; border-radius:4px; letter-spacing:1px;font-weight:bold ">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Start -->
        <?php
        $conn->close();
        require('common/footer.php')
        ?>
        <!-- Footer End -->
    </div>
    <!-- Content End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg  btn-lg-square back-to-top  bg-yellow" style="border-radius:0px"><i class="fa fa-angle-double-up" style="color: black;"></i></a>
    </div>
    <!-- JavaScript Libraries -->
    <!-- <?php require('common/script.php'); ?> -->
</body>

</html>