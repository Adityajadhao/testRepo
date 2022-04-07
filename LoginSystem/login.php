<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $check = mysqli_query($conn, "select * from task4data where email='$email' and pasword='$password'");

    if (mysqli_num_rows($check) > 0) {
      $_SESSION['email'] = $email;
      // echo "getting";
      $return = array(
        'statuscode' => 200,
        'message' => "login Sucessfull."
      );
      http_response_code(200);
      //echo json_encode(array("statusCode" => 200));
      //header("location:http://localhost/LoginRegisterPass/AdminLTE/index3.html");
    } else {
      $return = array(
        'statuscode' => 201,
        'message' => "invalid credentials."
      );
      http_response_code(201);
      //echo json_encode(array("statusCode" => 201));
      // echo "not getting";
    }
    print_r(json_encode($return));
    mysqli_close($conn);
  }
}


?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css" />
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="login.php" method="POST">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" id="email_log" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <span id="error" class="text-danger"></span>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password_log" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" />
                <label for="remember"> Remember Me </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">
                Sign In
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="http://localhost/LoginRegisterPass/AdminLTE/pages/examples/regi.php" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#submit').on('click', function() {
        var email = $('#email_log').value;
        var password = $('#password_log').value;
        if (email != "" && password != "") {
          $.ajax({
            url: "login.php",
            type: "POST",
            data: {

              "email": email,
              "password": password,
            },
            cache: false,
            success: function(data) {
              // console.log(response);
              // alert("hi");
              //exit;
              var status = $.parseJSON(data);
              if (data.statuscode == 200) {
                // window.location = "demopage.php";
                alert("login sucessfull");
              } else {
                // window.alert(data.message);

                document.getElementById("error").innerHTML = 'Invalid EmailId or Password !';

              }

            }
          });
        } else {
          alert('Please fill all the field !');
          return false;
        }
      });
    });
  </script>
</body>

</html>