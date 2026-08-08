    <?php
    require('common/header.php');
    require('connect.php');
    $sql_courseType = "SELECT * FROM `coursestype`";
    $result_type = $conn->query($sql_courseType);
    $coursesType = $result_type->fetch_all(MYSQLI_ASSOC);


    $sql_courseCount = "SELECT COUNT(*) as course_count FROM `courses`";
    $result_courseCount = $conn->query($sql_courseCount);
    $courseCount = $result_courseCount->fetch_assoc();

    $sql_courses = "SELECT courses.instructor_id,coursestype.type_id, coursestype.image, courses.courses_id, courses.title, instructors.instructor_fullName FROM courses JOIN instructors ON courses.instructor_id = instructors.instructor_id JOIN coursestype ON courses.type_id = coursestype.type_id";
    $result_courses = $conn->query($sql_courses);
    $courses = $result_courses->fetch_all(MYSQLI_ASSOC);

    $sql_about = "SELECT * FROM `about`";
    $result_about = $conn->query($sql_about);
    $aboutUs = $result_about->fetch_all(MYSQLI_ASSOC);
    // var_dump($aboutUs[0]['title']);exit;

    $sql_popularCourses = "SELECT * from admincourse";
    $result_popularCourses = $conn->query($sql_popularCourses);
    $popularCourses = $result_popularCourses->fetch_all(MYSQLI_ASSOC);
    // var_dump($popularCourses);
    // exit;
    $sql_instructor = "SELECT * from admininstructor";
    $result_instructor = $conn->query($sql_instructor);
    $instructors = $result_instructor->fetch_all(MYSQLI_ASSOC);
    // var_dump($popularCourses);
    // exit;
    $sql_std = "SELECT * from adminstudent";
    $result_std = $conn->query($sql_std);
    $students = $result_std->fetch_all(MYSQLI_ASSOC);
    // var_dump($popularCourses);
    // exit;

    $sql_instructorCount = "SELECT COUNT(*) as instructor_count FROM `admininstructor`";
    $result_instructorCount = $conn->query($sql_instructorCount);
    $instructorCount = $result_instructorCount->fetch_assoc();


    $sql_courseCount = "SELECT COUNT(*) as course_count FROM `admincourse`";
    $result_courseCount = $conn->query($sql_courseCount);
    $courseCount = $result_courseCount->fetch_assoc();

    $sql_stdCount = "SELECT COUNT(*) as std_count FROM `adminstudent`";
    $result_stdCount = $conn->query($sql_stdCount);
    $stdCount = $result_stdCount->fetch_assoc();

    $sql_banner = "SELECT `slider_id`, `slider_iamge`, `descriptioin1`, `descriptioin2`, `descriptioin3` FROM `carusel` ";
    $result_banner = $conn->query($sql_banner);
    $banners = $result_banner->fetch_all(MYSQLI_ASSOC);

    ?>

    <body>
        <!-- < Spinner Start  -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div>
        </div>
        <!-- Spinner End -->
        <!-- Navbar Start -->
        <?php require('common/navbar.php'); ?>
        <!-- Navbar End -->
        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/banner/<?php echo $banners[0]['slider_iamge'] ?>" alt="">

                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-sm-10 col-lg-8">
                                    <h5 class="text-primary text-uppercase mb-3 animated slideInDown"><?php echo $banners[0]['descriptioin1'] ?></h5>
                                    <h1 class="display-3 text-white animated slideInDown"><?php echo $banners[0]['descriptioin2'] ?></h1>
                                    <p class="fs-5 text-white mb-4 pb-2"><?php echo $banners[0]['descriptioin3'] ?>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
        <!-- Service Start -->
        <div class="container-xxl py-5 text-white" >
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item text-center pt-3">
                            <div class="p-4"><i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                                <h5 class="mb-3 text-white">Instructors Number</h5>
                                <h6 class="mb-0 counter text-center text-white"><?php echo $instructorCount['instructor_count']; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item text-center pt-3">
                            <div class="p-4"><i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                                <h5 class="mb-3 text-white">Courses Number</h5>
                                <h6 class="mb-0 counter text-center text-white"><?php echo $courseCount['course_count']; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item text-center pt-3">
                            <div class="p-4"><i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                                <h5 class="mb-3 text-white">Student Number</h5>
                                <h6 class="mb-0 counter text-center text-white"><?php echo $stdCount['std_count']; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
        <!-- About Start -->
        <div class="container-xxl py-5" id="about">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="img-fluid position-absolute w-100 h-100" src="img/about/<?php echo $aboutUs[0]['about_img'] ?>" alt="" style="width:100%">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="row d-flex">
                            <div class="col-6 text-start">
                                <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                            </div>
                            <h1 class="mb-4" id="titleCell">Welcome to <?php echo $aboutUs[0]['title'] ?></h1>
                            <p class="mb-4" id="FirstDescriptionCell"><?php echo $aboutUs[0]['description1'] ?></p>
                            <p class="mb-4" id="secondDescriptionCell"><?php echo $aboutUs[0]['description2'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        <!-- Courses Start -->
        <div class="container-xxl py-5" id="courses">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                    <h1 class="mb-5">Popular Courses</h1>
                </div>
                <div class="row g-4 justify-content-center"><?php foreach ($popularCourses as $popCourses) { ?><div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="width: 285px;">
                            <div class="course-item bg-light">
                                <div class="position-relative overflow-hidden"><img class="img-fluid" src="img/courses/<?php echo $popCourses['course_image'] ?>" style=" object-fit: contain;" width="285px" height="250px" alt="">
                                </div>
                                <div class="text-center p-4 pb-0">
                                    <h3 class="mb-0"><?php echo $popCourses['price'] ?>$</h3>
                                    <div class="mb-3"><small class="fa fa-star text-primary"></small><small class="fa fa-star text-primary"></small><small class="fa fa-star text-primary"></small><small class="fa fa-star text-primary"></small><small class="fa fa-star text-primary"></small></div>
                                    <h5 class="mb-4"><?php echo $popCourses['course_name'] ?></h5>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-user-tie text-primary me-2"></i>
                                        <?php echo $popCourses['instructor'] ?>
                                    </small>
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-clock text-primary me-2"></i>
                                        <?php echo $popCourses['duration'] ?>
                                    </small><small class="flex-fill text-center py-2">
                                        <i class="fa fa-user text-primary me-2"></i>
                                        <?php echo $popCourses['student_number'] ?> Students
                                    </small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Courses End -->
        <!-- Team Start -->
        <div class="container-xxl py-5" id="team">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
                    <h1 class="mb-5">Expert Instructors</h1>
                </div>
                <div class="row g-4">
                    <?php foreach ($instructors as $i) { ?>
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="team-item bg-light">
                                <div class="overflow-hidden"><img class="img-fluid" src="img/instructors/<?php echo $i['image'] ?>" width="100%" alt=""></div>
                                <div class="text-center p-4">
                                    <h5 class="mb-0"><?php echo $i['name'] ?></h5><small><?php echo $i['course'] ?></small>
                                </div>
                            </div>
                        </div><?php } ?>
                </div>
            </div>
        </div>
        <!-- Team End -->
        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s" id="feedback">
            <div class="container">
                <div class="text-center">
                    <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                    <h1 class="mb-5">Our Students Say !</h1>
                </div>
                <div class="owl-carousel testimonial-carousel position-relative">
                    <?php foreach ($students as $std) { ?>
                        <div class="testimonial-item text-center"><img class="border rounded-circle p-2 mx-auto mb-3" src="img/students/<?php echo $std['std_image'] ?>" style="width: 80px; height: 80px;">
                            <h5 class="mb-0"><?php echo $std['name'] ?></h5>
                            <div class="testimonial-text bg-light text-center p-4">
                                <p class="mb-0"><?php echo $std['comment'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        <!-- Footer Start -->
        <?php require('common/footer.php'); ?>
        <!-- Footer End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        <?php require('common/script.php'); ?>
    </body>

    </html>