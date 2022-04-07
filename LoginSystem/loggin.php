<?php
include 'connection.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $check = mysqli_query($conn, "select * from task4data where email='$email' and pasword='$password'");

    if (mysqli_num_rows($check) > 0) {
        // $_SESSION['email'] = $email;
        // echo "getting";
        echo json_encode(array("statusCode" => 200));
        //header("location:http://localhost/LoginRegisterPass/AdminLTE/index3.html");
    } else {
        echo json_encode(array("statusCode" => 201));
        // echo "not getting";
    }
    mysqli_close($conn);
}
