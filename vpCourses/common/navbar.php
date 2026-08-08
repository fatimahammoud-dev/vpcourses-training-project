 <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
     <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
         <h3 class="m-0 text-primary">
         <img src="img/logo.png" width="8%" alt="Image not Found" class="d-small-none">VPCourses
           
         </h3>
     </a>
     <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
         <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarCollapse">
         <div class="navbar-nav ms-auto p-4 p-lg-0">
             <a href="index.php" class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Home</a>
             <a href="#about" class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">About</a>
             <a href="#courses" class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'courses.php' ? 'active' : ''; ?>">Courses</a>
               <a href="#team" class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'courses.php' ? 'active' : ''; ?>">Instructors</a>
                <a href="#feedback" class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'courses.php' ? 'active' : ''; ?>">Testimonial </a>
             <a href="#contact" class="nav-item nav-link">Contact</a>
         </div>
         <!-- <a href="" style="width: 230px;" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Register Now<i class="fa fa-arrow-right ms-3"></i></a> -->
     </div>
 </nav>