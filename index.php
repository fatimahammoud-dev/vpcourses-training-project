<?php require_once __DIR__ . '/common/auth.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php

require('common/header.php');
if (!isset($_SESSION['userName'])) {
    echo " <script> window.location.href='signin.php';</script>;";
}
include('connect.php');
$sql_students = "SELECT * FROM `students`";
$result_students = $conn->query($sql_students);
$students = $result_students->fetch_all(MYSQLI_ASSOC);

$sql_studentCount = "SELECT COUNT(*) as student_count FROM `students`";
$result_studentCount = $conn->query($sql_studentCount);
$studentCount = $result_studentCount->fetch_assoc();

$sql_instructors = "SELECT * FROM instructors";
$result_instructors = $conn->query($sql_instructors);
$instructors = $result_instructors->fetch_all(MYSQLI_ASSOC);

$sql_instructorCount = "SELECT COUNT(*) as instructor_count FROM `instructors`";
$result_instructorCount = $conn->query($sql_instructorCount);
$instructorCount = $result_instructorCount->fetch_assoc();


$sql_courseCount = "SELECT COUNT(*) as course_count FROM `courses`";
$result_courseCount = $conn->query($sql_courseCount);
$courseCount = $result_courseCount->fetch_assoc();


$sql_card = "SELECT  courses.title, courses.courses_id,courses.type_id, courses.course_startDate,coursestype.image,
 courses.course_endDate, coursestype.type_id, coursestype.courseType_name FROM courses JOIN coursestype ON courses.type_id = coursestype.type_id";
$result_card = $conn->query($sql_card);
$cards = $result_card->fetch_all(MYSQLI_ASSOC);

$studentCountsByCourse = array();
foreach ($cards as $card) {
    $courseId = $card['courses_id'];
    $sql_studentCountByCourse = "SELECT course_id, COUNT(*) as student_count FROM `registrations` WHERE course_id = '$courseId'";
    $result_studentCountByCourse = $conn->query($sql_studentCountByCourse);
    $studentCountByCourse = $result_studentCountByCourse->fetch_assoc();
    $studentCountsByCourse[$card['title']] = $studentCountByCourse['student_count'];
}

$conn->close();
?>
<style>
    .projects .responsive-table {
        overflow-x: auto;
    }

    .projects table {
        min-width: 1000px;
        border-spacing: 0;
    }

    .projects thead td {
        background-color: #eee;
        font-weight: bold;
    }

    .projects table td {
        padding: 15px;
    }

    .projects tbody td {
        border-bottom: 1px solid #eee;
        border-left: 1px solid #eee;
        transition: 0.3s;
    }

    .projects table tbody tr td:last-child {
        border-right: 1px solid #eee;
    }

    .projects tbody tr:hover td {
        background-color: #faf7f7;
    }

    .projects table img {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        padding: 2px;
        background-color: white;
    }

    .projects table img:not(:first-child) {
        margin-left: -20px;
    }

    .projects table .label {
        font-size: 13px;
    }




    .counter {
        display: block;
        font-size: 32px;
        font-weight: 700;
        color: #042954;
        line-height: 28px
    }

</style>

<body>
    <div class="container-fluid position-relative  d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border " style="width: 5rem; height: 5rem; color:#f6de64" role="status">
                <span class="sr-only " style="color:#f6de64">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php require('common/sidebar.php'); ?>

        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content  bg-light">
            <!-- Navbar Start -->
            <?php require('common/navbar.php'); ?>
            <!-- Navbar End -->
            <div class="container-fluid pt-4 px-4">
                <div class="row ">
                    <h3>Dashboard</h3>
                    <a href="index.php" class="text-dark">
                        <p>Home
                    </a>
                    <span class="text-yellow"> / <a href="index.php" class="text-yellow">Dashboard</a></span>
                    </p>
                </div>
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-user fa-3x text-yellow"></i>
                            <div class=" ms-3">
                                <p class="mb-2">Students Number</p>
                                <h6 class="mb-0 counter text-center">
                                    <?php echo $studentCount['student_count']; ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class=" rounded d-flex align-items-center justify-content-between p-4" style="background-color: #042954;">
                            <i class="fa-solid fa-chalkboard-user fa-3x text-yellow"></i>
                            <div class="ms-3">
                                <p class="mb-2 " style="font-weight: bolder; color:white !important;font-size:16px">Instructor Nbrs</p>
                                <h6 class="mb-0 counter text-center text-white">
                                    <?php echo $instructorCount['instructor_count']; ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-book fa-3x text-yellow"></i>
                            <div class="ms-3">
                                <p class="mb-2">Courses Number</p>
                                <h6 class="mb-0 counter text-center">
                                    <?php echo $courseCount['course_count']; ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {

                            $('.counter').each(function() {
                                $(this).prop('Counter', 0).animate({
                                    Counter: $(this).text()
                                }, {
                                    duration: 4000,
                                    easing: 'swing',
                                    step: function(now) {
                                        $(this).text(Math.ceil(now));
                                    }
                                });
                            });

                        });
                    </script>
                </div>
            </div>
            <?php
            function getCourseStatus($startDate, $endDate)
            {
                $currentDate = date('Y-m-d');

                if ($currentDate >= $startDate && $currentDate <= $endDate) {
                    return 'Started';
                } elseif ($currentDate > $endDate) {
                    return 'Ended';
                } else {
                    return 'Active';
                }
            }

            function getBadgeClass($startDate, $endDate)
            {
                $status = getCourseStatus($startDate, $endDate);

                switch ($status) {
                    case 'Started':
                        return 'bg-success'; 
                    case 'Ended':
                        return 'bg-danger';
                    // case 'Active':
                    default:
                        return 'bg-info'; 
                }
            }
            ?>
            <!-- Courses Start-->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-white text-center rounded p-4">
                    <h1 class="mb-0 text-center mb-3" style="background-color: #042954; color:#f6de64 !important">Our Courses</h1>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        <?php foreach ($cards as $card) { ?>
                            <div class="col mb-4">
                                <div class="card p-2">
                                    <td id="image">
                                        <img src="img/courseType/<?php echo $card['image'] ?>" width="100%" alt="">
                                    </td>
                                    <hr>
                                    <div class="card-body text-start">
                                        <h4 class="card-title">
                                            Title: <?php echo $card['title'] ?>
                                            <span style="float:right" class="badge <?php echo getBadgeClass($card['course_startDate'], $card['course_endDate']); ?>" style="vertical-align: middle;">
                                                <?php echo getCourseStatus($card['course_startDate'], $card['course_endDate']); ?>
                                            </span>
                                        </h4>
                                        <p class="card-text">Type: <?php echo $card['courseType_name'] ?></p>
                                        <p class="card-text">Start: <?php echo $card['course_startDate'] ?></p>
                                        <p class="card-text">End: <?php echo $card['course_endDate'] ?></p>
                                        <p class="card-text">
                                            Number Of Students: <?php echo $studentCountsByCourse[$card['title']]; ?>
                                            <?php if (getCourseStatus($card['course_startDate'], $card['course_endDate']) === 'Active') : ?>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php   } ?>
                    </div>
                </div>
            </div>
            <!-- Courses End-->
            <!-- Footer Start -->
            <?php require('common/footer.php'); ?>
            <!-- Footer End -->
            <a href="#" class="btn btn-lg  btn-lg-square back-to-top  bg-yellow" style="padding:10px;border-radius:0px"><i class="fa fa-angle-double-up" style="color: black;"></i></a>

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
    </div>

    <!-- script start -->
    <?php require('common/script.php'); ?>
    <!-- script End -->
</body>

</html>