<?php
    require_once('functions.php');
    db_connect();
    $sql = "SELECT patientName,patientAge,patientSex,patientEmail,patientPhotoUrl FROM paitents WHERE patientId = ?";
    $statement = $conn->prepare($sql);
    echo $conn->error;
    $statement->bind_param('s',$_SESSION['patientId']);
    $statement->execute();
    $statement->store_result();
    $statement->bind_result($patientName,$patientAge,$patientSex,$patientEmail,$photoUrl);
    $statement->fetch();
    
?>
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
    <link rel="stylesheet" href="style/style_patient_portal.css">
</head>
<body>
    <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper">
            <a href="patient_portal.php" class="brand-logo">Health Care</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger right"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <ul class="right hide-on-med-and-down">
              <li><a class="modal-trigger" href="#modal3"><i class="fa fa-user left" aria-hidden="true"></i> Profile</a></li>
              <li><a href="php/logout.php"><i class="fa fa-power-off left" aria-hidden="true"></i> Logout</a></li>
            </ul>
          </div>
        </nav>
    </div>
      <!-- Modal Structure -->

      <div id="modal3" class="modal modal-fixed-footer">
            <div class="modal-content">
            <a href="#user"><img class="circle" src="<?php if(strcmp($photoUrl,"")==0){
                                                                    echo 'images/avatar.png';
                                                                }
                                                                else
                                                                {
                                                                    echo $photoUrl;
                                                                }?>" style="width:150px;height:150px;"></a>
            <h4>Name : <?php echo $patientName;?></h4>
            <p>Age : <?php echo $patientAge;?></p>
            <p>Sex : <?php 
                        if($patientSex=='M')
                        {
                            echo "Male";
                        }
                        else if($patientSex == 'F')
                        {
                            echo "Female";
                        }
                        else
                        {
                            echo "Rather Not Say";
                        }
                        ?>
            </p>
            <p>Email Id : <?php echo $patientEmail;?></p>
            </div>
            <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat tooltipped" data-position="top" data-tooltip="Done"><span class="done_button"><i class="fa fa-check" aria-hidden="true"></i></span></a>
            </div>
        </div>
        
    <ul class="sidenav" id="mobile-demo">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="images/doctor-software.png">
                </div>
                <a href="#user"><img class="circle" src="<?php if(strcmp($photoUrl,"")==0){
                                                                    echo 'images/avatar.png';
                                                                }
                                                                else
                                                                {
                                                                    echo $photoUrl;
                                                                }?>"></a>
                <a href="#name"><span class="white-text name"><?php echo $patientName;?></span></a>
                <a href="#email"><span class="white-text email"><?php echo $patientEmail;?></span></a>
            </div>
        </li>
        <li><a href="php/logout.php"><i class="fa fa-power-off left" aria-hidden="true"></i> Logout</a></li>
    </ul>
    <div class="center">
        <?php echo $patientName; ?>
    </div>
    <!--Cards Start-->
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
            <div class="card-content">
                <span class="card-title">Blood Sugar</span>
                <p>A fasting blood sugar level less than 100 mg/dL (5.6 mmol/L) is normal. A fasting blood sugar level from 100 to 125 mg/dL (5.6 to 6.9 mmol/L) is considered prediabetes. If it's 126 mg/dL (7 mmol/L) or higher on two separate tests, you have diabetes.</p>
                <div class="row">
                    <form class="col s12" action="php/addBSDetails.php" method = "POST">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="date-for-bs" type="text" name="date-of-bs" class="datepicker" required>
                                <label for="date-for-bs">Date</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="time-for-bs" type="text" name="time-of-bs" class="timepicker" required>
                                <label for="time-for-bs">Time</label>
                            </div>
                        <div class="input-field col s12">
                            <input id="fbs" name="fbs" type="text" class="validate">
                            <label for="fbs">Before Fasting Blood Sugar ( mg/dL )</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="ppbs" name="ppbs" type="text" class="validate">
                            <label for="ppbs">After Fasting Blood Sugar ( mg/dL )</label>
                        </div>
                        </div>
                        <div class="row">
                            <button class="waves-effect waves-light btn" type="submit"><i class="fa fa-check right" aria-hidden="true"></i>Done</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-action">
                <button id="getBSDetails" class="waves-effect waves-light btn">See Blood Sugar Report <i class="fa fa-eye right" aria-hidden="true"></i></button> 
                <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
              <h4>Blood Sugar</h4>
              <table class="highlight" id="BSTable"> 
                    <thead>
                      <tr>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Before Fasting</th>
                          <th>After Fasting</th>
                          <th class="delete_header">Delete</th>
                      </tr>
                    </thead>
            
                    <tbody>
                    </tbody>
                  </table>
                        
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat tooltipped" data-position="top" data-tooltip="Export to Excle"><i class="fa fa-file-excel-o excle_export_button" aria-hidden="true"></i><span class="excle_export_button"> Export</span></a>
              <a href="#!" class="modal-close waves-effect waves-green btn-flat tooltipped" data-position="top" data-tooltip="Close"><span class="close_button"><i class="fa fa-times" aria-hidden="true"></i></span></a>
            </div>
        </div>
            </div>
            </div>
        </div>
    </div>
    <!--Card Ends-->
    <!--Card starts-->
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
            <div class="card-content">
                <span class="card-title">Blood Pressure</span>
                <p>As a general guide: ideal blood pressure is considered to be between 90/60mmHg and 120/80mmHg. high blood pressure is considered to be 140/90mmHg or higher. low blood pressure is considered to be 90/60mmHg or lower.</p>
                <div class="row">
                    <form action="php/addBPDetails.php" method="POST" class="col s12">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="date-for-bs" type="text" name="date-of-bp" class="datepicker" required>
                                <label for="date-for-bs">Date</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="time-for-bs" type="text" name="time-of-bp" class="timepicker" required>
                                <label for="time-for-bs">Time</label>
                            </div>
                        
                        <div class="input-field col s12">
                            <input id="sys" name="sys" type="text" class="validate" required>
                            <label for="sys">Systole ( mmHg )</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="dia" name="dia" type="text" class="validate" required>
                            <label for="dia">Diastole ( mmHg )</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="pulse" name="pulse" type="text" class="validate" required>
                            <label for="pulse">Pulse ( /min )</label>
                        </div>
                        </div>
                        <div class="row">
                            <button class="waves-effect waves-light btn" type="submit"><i class="fa fa-check right" aria-hidden="true"></i>Done</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-action">
                <button id="getBPDetails" class="waves-effect waves-light btn">See Blood Pressure Report <i class="fa fa-eye right" aria-hidden="true"></i></button> 
            <div id="modal2" class="modal modal-fixed-footer">
                    <div class="modal-content">
                    <h4>Blood Pressure</h4>
                        <table id="BPTable" class="highlight"> 
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>SYS</th>
                                    <th>DIA</th>
                                    <th>Pulse</th>
                                    <th class="delete_header">Delete</th>
                                </tr>
                                </thead>
                        
                                <tbody>
                                
                                </tbody>
                            </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat tooltipped" data-position="top" data-tooltip="Export to Excle"><i class="fa fa-file-excel-o excle_export_button" aria-hidden="true"></i><span class="excle_export_button"> Export</span></a>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat tooltipped" data-position="top" data-tooltip="Close"><span class="close_button"><i class="fa fa-times" aria-hidden="true"></i></span></a>
                    </div>
            </div>
            </div>
            </div>
        </div>
    </div>

    <!--Cards End-->

    <!--Footer starts-->
    <footer class="page-footer">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">Health Care</h5>
              <p class="grey-text text-lighten-4">Health care, health-care, or healthcare is the maintenance or improvement of health via the prevention, diagnosis, and treatment of disease, illness, injury, and other physical and mental impairments in people. Health care is delivered by health professionals in allied health fields.</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Contact Us</h5>
              <a href="https://www.facebook.com/people/Mohammed-Usman/100036375136362" target="blank" class="fa my_social_media_icons fa-facebook"></a>
              <a href="https://in.linkedin.com/in/mohammed-usman-e-gani-aaab52170"target="blank" class="fa my_social_media_icons fa-linkedin"></a>
              <a href="https://www.instagram.com/ka.mohammedusman/"target="blank" class="fa my_social_media_icons fa-instagram"></a>
              <a href="https://twitter.com/Mohamme66957465"target="blank" class="fa my_social_media_icons fa-twitter"></a>
              <ul>
                  <li>ka.usmanegani@gmail.com</li>
                  <li>+91 8088611415</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
          © 2019 Copyright Health Care
          <a class="grey-text text-lighten-4 right" href="https://meet-usman.000webhostapp.com" target="blank">&#10084; Developed By : Mohammed Usman E Gani &#10084;</a>
          </div>
        </div>
      </footer>
    <!--Footer ends-->
    <!--JavaScript at end of body for optimized loading-->
    <!--Scripts start-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="materialize/js/materialize.min.js"></script>
    <script src="materialize/js/init.js"></script>
    <script>
        $(document).ready(function(){
            function getBSVars(data)
        {
            htmlVars = "<tr>";
            data = data.split('#');
            var numberOfEntries = data.splice(0,1);
            var k =0;
            for(var i=0;i<numberOfEntries;++i)
            {
                for(var j=0;j<4;++j)
                {
                    htmlVars += "<td> "+data[k++]+"</td>";
                } 
                htmlVars +="<td><a href='php/deleteTableRecordbs.php'><i class='fa fa-trash my_delete_button'></i></a></td></tr>";
            }    
            return htmlVars;
        }

        function getBPVars(data)
        {
            htmlVars = "<tr>";
            data = data.split('#');
            var numberOfEntries = data.splice(0,1);
            var k =0;
            for(var i=0;i<numberOfEntries;++i)
            {
                for(var j=0;j<5;++j)
                {
                    htmlVars += "<td> "+data[k++]+"</td>";
                } 
                htmlVars +="<td><a href='php/deleteTableRecordbp.php'><i class='fa fa-trash my_delete_button'></i></a></td></tr>";
            }    
            return htmlVars;
        }
        $('.sidenav').sidenav();
        $('.modal').modal();
        $('.timepicker').timepicker();
        $('.datepicker').datepicker();
        $('.tooltipped').tooltip();
        M.updateTextFields();

        $('#getBSDetails').click(function(){
                //Empty the table
                $('#BSTable tbody').empty();
                $.ajax({
                type: "POST",
                url:  "php/getBSDetails.php",
                data: 'data='+<?php echo $_SESSION['patientId']?>,
                success: function(data){
                    htmlVars = getBSVars(data);
                    
                    $('#BSTable > tbody:last-child').append(htmlVars);
                    
                    $('#modal1').modal('open');
                }
              });
        });

        $('#getBPDetails').click(function(){
            //Empty the table
            $('#BSTable tbody').empty();
                $.ajax({
                type: "POST",
                url:  "php/getBPDetails.php",
                data: 'data='+<?php echo $_SESSION['patientId']?>,
                success: function(data){
                    htmlVars = getBPVars(data);
                    
                    $('#BPTable > tbody:last-child').append(htmlVars);
                    
                    $('#modal2').modal('open');
                }
              });
        });
        
        });
    </script>
    <!--Scripts End-->
</body>
</html>