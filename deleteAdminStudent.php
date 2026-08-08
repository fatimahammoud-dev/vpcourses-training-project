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
 <?php
    if (isset($_GET)) {
        include('connect.php');
        $id = $_GET['id'];
        $sql = "DELETE FROM `adminstudent` where id='$id'";
        $query = mysqli_query($conn, $sql);
        if ($conn->query($sql) === TRUE) {
            echo " <script> window.location.href='adminStudent.php';</script>;";
        }

        $conn->close();
    }
    ?>