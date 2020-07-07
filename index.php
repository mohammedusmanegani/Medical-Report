<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Health Care</title>
    <link rel="icon" href="images/publichealth.png">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="row login-form">
        <div class="login-form-title">
            <h4>Login</h4>
        </div>
        <form action="php/login.php" method="POST" class="col s12">
          <div class="row">
            <div class="input-field col s12">
              <input id="patientuid" name="patientemail" type="email" class="validate" required>
              <label for="patientuid">E Mail</label>
            </div>
            <div class="input-field col s12">
                <input id="patientpassword" name="password" type="password" class="validate" required>
                <label for="patientpassword">Password</label>
            </div>
            <div class="login-form-submit-button">
                <button class="waves-effect waves-light btn" type="submit"><i class="fa fa-unlock-alt right" aria-hidden="true"></i>Login</button>
                <a href="sign-up.php" class="sign-up-button right">New to us Sign-up</a>
            </div>
          </div>
        </form>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <!--Scripts start-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="materialize/js/materialize.min.js"></script>
    <script src="materialize/js/init.js"></script>
    <script>
         $(document).ready(function() {
         M.updateTextFields();
         });
    </script>
    <!--Scripts End-->
</body>
</html>