<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css" />
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css" />
  <link rel="stylesheet" href="../dist/css/errorMessage.css" />

</head>


<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo"><b>Admin</b>LTE</div>


    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="registration.php" method="post" onsubmit="return validation()">
          <div>
            <span id="nerror"></span>
          </div>
          <div class="input-group mb-3">

            <input type="text" class="form-control" placeholder="Full name" id="name" name="name" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>

            </div>
          </div>
          <p>
            <span id="fname" class="text-danger"></span>
          </p>
          <div>
            <span id="mailerror"></span>
            <div class="input-group mb-3">
              <input type="email" class="form-control checking_email" placeholder="Email" id="email" name="email" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <p>
              <span id="femail" class="text-danger"></span>
            </p>
          </div>
          <div class="input-group mb-3">
            <span id="perror"></span>
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <p>
            <span id="fpass" class="text-danger"></span>
          </p>
          <div class="input-group mb-3">
            <span id="cperror"></span>
            <input type="password" class="form-control" placeholder="Retype password" id="cPassword" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <p>
            <span id="fcpass" class="text-danger"></span>
          </p>
          <div class="row">
            <div class="col-8">
              <span id="fterms" class="text-danger"></span>
              <div class="icheck-primary">

                <input type="checkbox" id="agreeTerms" name="terms" value="agree" />
                <label for="agreeTerms">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>


            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">
                Register
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <a href="login.php" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>


  <script>
    $(document).ready(function() {
      $("#submit").click(function() {
        var name = $("#name").val();
        var email = $("#email").val();
        var pass = $("#pass").val();
        if (name != "" && email != "" && pass != "") {
          $.ajax({
            url: "registration.php",
            type: "POST",
            data: {
              name: name,
              email: email,
              pass: pass,

            },
            success: function(response) {

              $("#nerror").text(response);
            },


          });
        }
      });
    });

    function validation() {

      var name = document.getElementById("name").value;
      if (name == "") {
        document.getElementById("fname").innerHTML = "*enter username";
        return false;
      }

      if (name.length <= 2) {
        document.getElementById("fname").innerHTML = "*enter valid username";
        return false;

      }
      var email = document.getElementById("email").value;
      if (email == "") {
        document.getElementById("femail").innerHTML = "*enter email";
        return false;
      }
      var password = document.getElementById("password").value;
      if (password == "") {
        document.getElementById("fpass").innerHTML = "*enter valid password";
        return false;
      }
      var cPassword = document.getElementById("cPassword").value;
      if (cPassword == "") {
        document.getElementById("fcpass").innerHTML = "*enter password";
        return false;
      }
      if (password != cPassword) {
        document.getElementById("fcpass").innerHTML = "*password not matching";
        return false;
      }


      var checkbox = document.getElementById("agreeTerms").checked;
      if (!checkbox) {
        document.getElementById("fterms").innerHTML = "*agree terms";
        return false;
      }


    };

    $(document).ready(function() {

      $('.checking_email').keyup(function(e) {
        var email = $('.checking_email').val();

        $.ajax({
          type: "POST",
          url: "registration.php",
          data: {
            "check_submit_btn": 1,
            "email_id": email
          },
          success: function(response) {

            $("#femail").text(response);
          },



        });


      });


    });
  </script>



</body>


</html>