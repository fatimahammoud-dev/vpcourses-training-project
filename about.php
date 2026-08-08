<?php require_once __DIR__ . '/common/auth.php'; ?>
<script src="js/sweetAlert.js"></script>
<script src='js/jQuery.js'></script>
<style>
    .custom-confirm-button-class {
        background-color: #f6de64;
        color: white;
        width: 150px;
        height: 50px;
        font-size: 30px;
        font-weight: bolder;
    }
</style>
<?php include('connect.php');
require('common/header.php');
$user_id = $_SESSION['user_id'];
$sql_userType = "SELECT * FROM users where users.user_id = '$user_id'";
$result_userType = $conn->query($sql_userType);
$user = $result_userType->fetch_assoc();



$sql = "SELECT * FROM `about` ";
$result = $conn->query($sql);
$about = $result->fetch_all(MYSQLI_ASSOC);
$conn->close();
?>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <?php require('common/sidebar.php'); ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php require('common/navbar.php'); ?>
            <!-- Navbar End -->
            <!-- Blank Start -->
            <div class="container-fluid pt-4 min-vh-100 bg-light">
                <div class="row ms-2">
                    <h3>About Us</h3>
                    <a href="index.php" style="color: black;">
                        <p>Home
                    </a> <span style="color: #f6de64;"> / <a href="about.php" style="color:#f6de64">
                            About </a></span></p>
                </div>
                <div class="card height-auto border-0">
                    <div class="card-body">
                        <div class="heading-layout1 d-flex">
                            <div class="item-title col">
                                <h3>All About Us Data</h3>
                            </div>
                            <div class="col">
                                <button type="button" class="btn float-end btn-width-sm " style="background-color: #f6de64;color:white; border-radius:4px; letter-spacing:1px;font-weight:bold ">
                                    <a href="vpCourses/index.php" class="text-dark">View Page</a>
                                </button>
                            </div>
                        </div>

                        <div class=" row mt-4">
                            <div class="table-bordered table-responsive table-hover">
                                <table class="table display data-table text-nowrap table-striped" id="dataTable" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th hidden></th>
                                            <th class="sorting text-center" style="background-color: #f6de64;width:20px">Image</th>
                                            <th class="sorting text-center" style="background-color: #f6de64;">Title</th>
                                            <th class="sorting text-center" style="background-color: #f6de64;">First Description</th>
                                            <th class="sorting text-center" style="background-color: #f6de64;">Second Description</th>

                                            <th class="sorting text-center" style="background-color: #f6de64;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($about as $about) {
                                        ?>
                                            <tr class="text-center">
                                                <td id="userIDCell" hidden><?php echo $about['id']; ?></td>
                                                </td>
                                                <td id="image">
                                                    <img src="vpCourses/img/about/<?php echo $about['about_img'] ?>" width="100%" alt="">
                                                </td>
                                                <td id="userNameNameCell"><?php echo $about['title']; ?></td>

                                                <td id="studentNameCell"><?php echo $about['description1']; ?>
                                                <td id="studentNameCell"><?php echo $about['description2']; ?>
                                                </td>
                                                <td>
                                                    <a href="updateFormAbout.php?id=<?php echo $about['id']; ?>" title="Update"><i class=" fa-solid fa-pen-to-square" style="color: green;"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Blank End -->

            <!-- Footer Start -->
            <div class="container-fluid">
                <?php require('common/footer.php'); ?>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg  btn-lg-square back-to-top  bg-yellow" style="border-radius:0px"><i class="fa fa-angle-double-up" style="color: black;"></i></a>
    </div>

    <!-- script start -->
    <?php require('common/script.php'); ?>
    <!-- script End -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();

        });
    </script>
</body>

</html>