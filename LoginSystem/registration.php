<?php
include 'connection.php';

if (isset($_POST['check_submit_btn'])) {
    $email = $_POST['email_id'];

    $email_query = "SELECT * FROM task4data WHERE email='$email' ";
    $email_query_run = mysqli_query($conn, $email_query);
    if (mysqli_num_rows($email_query_run) > 0) {
        echo "email taken already";
    }
} else {


    if (isset($_POST['submit']) == 'register') {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        //$cPassword = $_POST['cPassword'];




        // validation successfully
        //$hashed_password = md5($password);
        $stmt = $conn->prepare("insert into task4data(fullname, email, pasword) values(?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);
        $execval = $stmt->execute();
        // echo $execval;

        //header('Location:http://localhost/LoginRegisterPass/AdminLTE/pages/examples/regi.php');
        echo "Registered successfully Redirecting to log in page...... ";
?>
        <META HTTP-EQUIV="Refresh" CONTENT="2; URL=http://localhost/LoginRegisterPass/AdminLTE/pages/examples/login.php">
<?php


        $stmt->close();
        $conn->close();
    }
}


?>