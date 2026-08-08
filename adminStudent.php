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

$sql = "SELECT * FROM `adminstudent`";
$result = $conn->query($sql);
$std = $result->fetch_all(MYSQLI_ASSOC);
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
                    <h3>Instructors</h3>
                    <a href="index.php" style="color: black;">
                        <p>Home
                    </a> <span style="color: #f6de64;"> / <a href="adminStudent.php" style="color:#f6de64">All
                            Instructors</a></span></p>
                </div>
                <div class="card height-auto border-0">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Instructors Data</h3>
                            </div>

                        </div>

                        <button type="button" class="btn float-end btn-width-sm text-dark" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #f6de64;color:white; border-radius:4px; letter-spacing:1px;font-weight:bold ">
                            + Add Instructor </button>
                        <div class="card-body">

                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <button type="button" class="btn-close x-style text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form action="addAdminStudent.php" method="post" enctype="multipart/form-data">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">Student</span>
                                                    <input type="text" class="form-control" id="userName" name="student" placeholder="Enter Student Name" required autocomplete="off">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text w-120 text-center" style="width: 130px !important;">Comment</span>
                                                    <input type="text" class="form-control" id="comment" name="comment" placeholder="Enter Comment" required autocomplete="off">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="image" name="my_work" placeholder="Enter Image" required>
                                                </div>
                                                <br>
                                                <div class="d-flex align-items-center float-end">
                                                    <button type="submit" class="btn me-4 " style="background-color:red; border-radius:4px; letter-spacing:1px;font-weight:bold ">
                                                        <a href="adminStudent.php" style="color:white;">Close</a>
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
                                            <th class="sorting text-center" style="background-color: #f6de64;">Image</th>
                                            <th class="sorting text-center" style="background-color: #f6de64;">Student Name</th>
                                            <th class="sorting text-center" style="background-color: #f6de64;">Comment</th>
                                            <th class="sorting text-center" style="background-color: #f6de64;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($std as $std) {
                                        ?>
                                            <tr class="text-center">
                                                <td id="userIDCell" hidden><?php echo $std['id']; ?></td>
                                                <td id="image" style="width: 30%;">
                                                    <img src="vpCourses/img/students/<?php echo $std['std_image'] ?>" width="40%" alt="">
                                                </td>
                                                <td id=""><?php echo $std['name']; ?></td>

                                                <td id=""><?php echo $std['comment']; ?></td>
                                                <td>
                                                    <a href="#" onclick="confirmDelete(<?php echo $std['id']; ?>, '<?php echo $std['name']; ?>');">
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
                                                                    window.location.href = 'deleteAdminStudent.php?id=' + id;
                                                                }
                                                            });
                                                        }
                                                    </script>
                                                    <a href="updateFormAdminStudent.php?id=<?php echo $std['id']; ?>" title="Update"><i class=" fa-solid fa-pen-to-square" style="color: green;"></i></a>
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