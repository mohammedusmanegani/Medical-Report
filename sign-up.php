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
            <h4>Sign-up</h4>
        </div>
        <form class="col s12" action = "php/signUp.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s12">
              <input id="patientname" name="patientname" type="text" class="validate" required>
              <label for="patientname">Patient Name</label>
            </div>
            <div class="input-field col s12">
                    <input id="patientage" name="patientage" type="text" class="validate" required>
                    <label for="patientage">Age</label>
            </div>
            
            <div class="input-field col s12">
                <select name="patientSex" required>
                    <option value="" disabled selected>Choose your option</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Rather not say</option>
                </select>
                <label>Sex</label>
            </div>
            <div class="input-field col s12">
                <input id="patientemail" name="patientemail" type="Email" class="validate" required>
                <label for="patientemail">Email</label>
            </div>
            <div class="input-field col s12">
                <input id="patientpassword" name="patientpassword" type="password" class="validate" required>
                <label for="patientpassword">Password</label>
            </div>
            <div class="input-field col s12">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Upload Photo<i class="fa fa-upload right" aria-hidden="true"></i> </span>
                        <input type="file" name="patientImage"> 
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload Patient's Photo">
                    </div>
                </div>
            </div>
            <div class="login-form-submit-button">
                <button class="waves-effect waves-light btn" type="submit"><i class="fa fa-user-plus right" aria-hidden="true"></i>Sign-up</button>
                <a href="index.php" class="sign-up-button right">Already have an account Login</a>
            </div>
          </div>
        </form>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <!--Scripts start-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="materialize/js/materialize.min.js"></script>
    <script>
         $(document).ready(function() {
         M.updateTextFields();
         $('select').formSelect();
         $('input#input_text, textarea#textarea2').characterCounter();
         M.autoInit();
         });
    </script>
    <!--Scripts End-->
</body>
</html>