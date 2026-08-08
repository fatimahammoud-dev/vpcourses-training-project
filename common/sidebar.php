<div class="sidebar  pb-3" style="background-color: #042954;">
    <nav class="navbar  navbar-light">
        <a href="index.php" class=" mt-0 mb-3 courses-system" style="background-color: #f6de64; width:250px !important;">
            <h5 style="color: white !important; padding:10px"><img src="img/logo.png" alt="" width="15%"> Courses System</h5>
        </a>
        <div class="navbar-nav w-100">
            <div class="nav-item dropdown">
                    <a href="vpCourses/index.php" class="nav-link text-white  <?php echo basename($_SERVER['PHP_SELF']) == 'vpCourses/index.php' ? 'active' : ''; ?> ">
                        <i class="fa-solid fa-chalkboard-user me-2" style="color: #f6de64 !important; background-color:#042954 !important"></i>
                        Client Side</a>
                </div>
                <div class="nav-item dropdown">
                    <a href="banner.php" class="nav-link text-white  <?php echo basename($_SERVER['PHP_SELF']) == 'banner.php' ? 'active' : ''; ?> ">
                        <i class="fa-solid fa-calendar-days me-2" style="color: #f6de64 !important; background-color:#042954 !important"></i>
                        Banner</a>
                </div>
                <div class="nav-item dropdown">
                    <a href="about.php" class="nav-link text-white  <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' || basename($_SERVER['PHP_SELF']) == 'updateFormAbout.php' ? 'active' : ''; ?> ">
                        <i class="fa-solid fa-school me-2" style="color: #f6de64 !important; background-color:#042954 !important"></i>
                        About</a>
                </div>
                <div class="nav-item dropdown">
                    <a href="adminCourse.php" class="nav-link text-white  <?php echo basename($_SERVER['PHP_SELF']) == 'adminCourse.php' || basename($_SERVER['PHP_SELF']) == 'updateFormAdminCourse.php' ? 'active' : ''; ?> ">
                        <i class="fa-solid fa-book me-2" style="color: #f6de64 !important; background-color:#042954 !important"></i>
                        Courses</a>
                </div>
                <div class="nav-item dropdown">
                    <a href="adminInstructor.php" class="nav-link text-white  <?php echo basename($_SERVER['PHP_SELF']) == 'adminInstructor.php' || basename($_SERVER['PHP_SELF']) == 'updateFormAdminInstructor.php' ? 'active' : ''; ?> ">
                        <i class="fa-solid fa-user me-2" style="color: #f6de64 !important; background-color:#042954 !important"></i>
                        Instructors</a>
                </div>
                <div class="nav-item dropdown">
                    <a href="adminStudent.php" class="nav-link text-white  <?php echo basename($_SERVER['PHP_SELF']) == 'adminStudent.php' || basename($_SERVER['PHP_SELF']) == 'updateFormAdminStudent.php' ? 'active' : ''; ?> ">
                        <i class="fa-solid fa-graduation-cap me-2" style="color: #f6de64 !important; background-color:#042954 !important"></i>
                        Students</a>
                </div>
        </div>
    </nav>
</div>