<?php
session_start();
require('common/header.php');

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('connect.php');

    $userName = trim($_POST['userName'] ?? '');
    $password = $_POST['userPassword'] ?? '';

    $stmt = $conn->prepare('SELECT user_id, user_name, user_password, user_Type FROM users WHERE user_name = ? LIMIT 1');
    $stmt->bind_param('s', $userName);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $passwordIsValid = false;
    if ($user) {
        // Supports the cleaned hashed database and automatically upgrades
        // a legacy plain-text training password after a successful login.
        if (password_verify($password, $user['user_password'])) {
            $passwordIsValid = true;
        } elseif (hash_equals((string) $user['user_password'], (string) $password)) {
            $passwordIsValid = true;
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            $upgrade = $conn->prepare('UPDATE users SET user_password = ? WHERE user_id = ?');
            $upgrade->bind_param('si', $newHash, $user['user_id']);
            $upgrade->execute();
        }
    }

    if ($user && $passwordIsValid) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['userName'] = $user['user_name'];
        $_SESSION['user_type'] = $user['user_Type'];
        $_SESSION['login'] = true;
        header('Location: index.php');
        exit;
    }

    $error = 'Invalid username or password.';
}
?>
<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }

</style>

<body >
    <div class="container-fluid">
        <center>
            <div>
                <h1 class="mt-2"> <span style="background-color: #f6de64; color:#042954;padding:10px">COURSES </span><span style="background-color: #042954; color:#f6de64;padding:10px">SYSTEM</span></h1>
            </div>
        </center>
    </div>
    <section class="vh-90">
        <div class="container-fluid h-custom" style=" height: calc(100vh - 64px) !important;">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="img/signin/signin.jpg" class="img-fluid" alt="Sample image" width="100%">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="signin.php" method="post">
                        <div class="mb-4"><h4 class="fw-bold mb-1">Admin Sign In</h4><p class="text-muted mb-0">Use your administrator credentials to access the training dashboard.</p></div>


                        <div class="input-group mb-3">
                            <span class="input-group-text w-120 text-center" style="width: 130px !important;">User Name</span>
                            <input type="text" class="form-control" id="userName" name="userName" placeholder="Username" autocomplete="off" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text w-120" style="width: 130px !important;"> user password</span>
                            <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Enter User Password" autocomplete="off" required>
                        </div>

                        <?php if ($error): ?><div class="alert alert-danger py-2"><?php echo htmlspecialchars($error); ?></div><?php endif; ?>
                        <div class="text-center text-lg-end mt-4 pt-2">
                            <button type="submit" class="btn bg-yellow btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- <div class="container-fluid pt-4 px-4 text-white " style="background-color:#042954;">
        <div class=" rounded-top p-4">
            <div class="row">
                <div class="col-12 col-sm-6 text-center text-sm-start">
                    &copy; <a href="#" style="color:#f6de64">COURSES SYSTEM</a>, All Right Reserved.
                </div>
                <div class="col-12 col-sm-6 text-center text-sm-end">
                    Designed By <a href="#" style="color: #f6de64 ;">KHALED ALHILAL</a>
                </div>
            </div>
        </div>
    </div> -->
</body>