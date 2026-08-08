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

$sql = "SELECT * FROM `admincourse`";
$result = $conn->query($sql);
$Courses = $result->fetch_all(MYSQLI_ASSOC);

$sql_config = "SELECT * FROM `config`";
$result_config = $conn->query($sql_config);
$config = $result_config->fetch_all(MYSQLI_ASSOC);
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
                    <h3>Courses</h3>
                    <a href="index.php" style="color: black;">
                        <p>Home
                    </a> <span style="color: #f6de64;"> / <a href="adminCourse.php" style="color:#f6de64">All
                            Courses</a></span></p>
                </div>
                <div class="card height-auto border-0">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Courses Data</h3>
                            </div>

                        </div>

                        <button type="button" class="btn float-end btn-width-sm text-dark" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #f6de64;color:white; border-radius:4px; letter-spacing:1px;font-weight:bold ">
                            + Add Course </button>
                        <div class="card-body">

                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <button type="button" class="btn-close x-style" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form action="addAdminCourse.php" method="post" enctype="multipart/form-data">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">Course</span>
                                                    <input type="text" class="form-control" id="userName" name="course" placeholder="Enter Course Name" required autocomplete="off">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">Instructor</span>
                                                    <input type="text" class="form-control" id="instructor" name="instructor" placeholder="Enter Instructor Name" required autocomplete="off">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">price</span>
                                                    <input type="number" class="form-control" id="userType" name="price" value="" placeholder="Enter Price" required autocomplete="off">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">Duration</span>
                                                    <input type="text" class="form-control" id="instructorName" name="duration" placeholder="Enter Duration " required autocomplete="off">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">Student Number</span>
                                                    <input type="number" class="form-control" id="phoneNumber" name="stdNbr" placeholder="Enter Student Number" required autocomplete="off">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="image" name="my_work" placeholder="Enter Image" required>
                                                </div>
                                                <br>
                                                <div class="d-flex align-items-center float-end">
                                                    <button type="submit" class="btn me-4 " style="background-color:red; border-radius:4px; letter-spacing:1px;font-weight:bold ">
                                                        <a href="adminCourse.php" style="color:white;">Close</a>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary float-end border-0" style="background-color: #f6de64;color:white; border-radius:4px; letter-spacing:1px;font-weight:bold ">Submit</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" row mt-4">
                            <div class="table-bordered table-responsive table-hover">
                                <table class="table display data-table text-nowrap table-striped" id="dataTable" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th hidden></th>
                                            <th class="sorting text-center" style="background-color: #f6de64;">Course Image</th>
                                            <th class="sorting text-center" style="background-color: #f6de64;">Course Name</th>
                                            <th class="sorting text-center" style="background-color: #f6de64;">Instructor Name</th>
                                            <th class="sorting text-center" style="background-color: #f6de64;">Price</th>
                                            <th class="sorting text-center" style="background-color: #f6de64;">Duration</th>
                                            <th class="sorting text-center" style="background-color: #f6de64;">Students Number</th>
                                            <th class="sorting text-center" style="background-color: #f6de64;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($Courses as $Course) {
                                        ?>
                                            <tr class="text-center">
                                                <td id="userIDCell" hidden><?php echo $Course['id']; ?></td>
                                                <td id="image">
                                                    <img src="vpCourses/img/courses/<?php echo $Course['course_image'] ?>" width="40%" alt="">
                                                </td>
                                                <td id="courseCell"><?php echo $Course['course_name']; ?></td>

                                                <td id="instructorCell"><?php echo $Course['instructor']; ?>
                                                </td>
                                                <td id="priceCell"><?php echo $Course['price'];
                                                                    echo $config[0]['value'] ?>
                                                </td>
                                                <td id="durationCell"><?php echo $Course['duration']; ?>
                                                </td>
                                                <td id="stdNbCell">
                                                    <?php echo $Course['student_number']; ?></td>
                                                <td>
                                                    <a href="#" onclick="confirmDelete(<?php echo $Course['id']; ?>, '<?php echo $Course['course_name']; ?>');">
                                                        <i class="fa-solid fa-trash" style="color: red; margin-right: 10px;" title="Delete"></i>
                                                    </a>
                                                    <script>
                                                        function confirmDelete(id, courseName) {
                                                            swal.fire({
                                                                title: 'Are you sure to delete ' + courseName + '?',
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#f6de64',
                                                                cancelButtonColor: 'red',
                                                                confirmButtonText: 'DELETE'
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    window.location.href = 'deleteAdminCourse.php?id=' + id;
                                                                }
                                                            });
                                                        }
                                                    </script>
                                                    <a href="updateFormAdminCourse.php?id=<?php echo $Course['id']; ?>" title="Update"><i class=" fa-solid fa-pen-to-square" style="color: green;"></i></a>
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