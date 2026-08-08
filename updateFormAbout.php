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
$sql = "SELECT * FROM `about` WHERE id='$id' ";
$result = $conn->query($sql);
$about = $result->fetch_assoc();


if ($_POST) {
    if ($_FILES && $_FILES['images']['name']) {

        $target_dir = "vpCourses/img/about/";
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
            $sql = "UPDATE about SET about_img='$image_name' WHERE id = " . $about['id'];
            $conn->query($sql);
        }
    } elseif (isset($_POST['deleteImage'])) {
    $imageToDelete = basename($_POST['imageNameToDelete'] ?? '');
    $pathToDelete = __DIR__ . "/vpCourses/img/about/" . $imageToDelete;

    if ($imageToDelete !== '' && is_file($pathToDelete)) {
        unlink($pathToDelete);
    }

    $sql = "UPDATE about SET about_img=NULL WHERE id = " . $about['id'];
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
                            $sql = "SELECT about_img FROM about WHERE id = " . $about['id'];
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $imageName = $row['about_img'];
                                }
                            }
                            if ($imageName) {
                                echo "<div>";
                                echo "<img class='rounded' src='vpCourses/img/about/$imageName' alt='Uploaded Image'style='width: 100px;' ><br>";
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
                            <!-- ... Your existing code ... -->

                            <form action="updateAbout.php" method="post">

                                <div class="input-group mb-3" hidden>
                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;"> ID</span>
                                    <input type="text" class="form-control" id="#" name="about_id" value="<?php echo $about['id'] ?>" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">title</span>
                                    <input type="text" class="form-control" id="#" name="title" value="<?php echo $about['title'] ?>" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">First Description</span>
                                    <input type="text" class="form-control" id="#" name="d1" value="<?php echo $about['description1'] ?>" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">Second Description</span>
                                    <input type="text" class="form-control" id="#" name="d2" value="<?php echo $about['description2'] ?>" required>
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