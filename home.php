<?php
require_once("config.php");
error_reporting(0);
?>
<link rel="stylesheet" href="css.css">
<!DOCTYPE html>
<html lang="en">
<head>
  <title>J.A.R.V.I.S.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" >J.A.R.V.I.S</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li class="active"><a href="home.php">Home</a></li>
          <li><a href="#">Profile</a></li>
          <li><a href="parking_instructions.pdf">Info</a></li>
     
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="stulogin.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  <?php 
$sid = $_REQUEST['sid'];
$password = $_REQUEST['password'];

?>
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
    	
      <p>       <a href="change_password.php?_id=<?php echo $sid; ?>&_password=<?php echo $password; ?>">Change Password</a>
</p>
      
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Welcome to J.A.R.V.I.S.
<?php 
$sid = $_REQUEST['sid'];
?>
<?php
$query = mysqli_query($con,"SELECT * FROM student where sid='".$sid."'");
//echo " $sid ";
?>
<?php
while($row=mysqli_fetch_array($query))
{

$email= $row['email'];
$sid=$row['sid'];
$password=$row['password'];
$name=$row['name'];
echo $name;
}
 ?>
      </h1>

      <p></p>
      <hr>
        <form action="reg_form.php" method="post" >
            <h1>Owner Data Form</h1>

            <div class="contentform">
                <div id="sendmessage"> Your message has been sent successfully. Thank you. </div>


                <div class="leftcontact">
                    <div class="form-group">
                        <p>Full Name<span>*</span></p>
                        <span class="icon-case"><i class="fa fa-male"></i></span>
                        <input type="text" name="name" id="name" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné."/>
                        <div class="validation"></div>
                    </div>

                    <div class="form-group">
                        <p>Father's Name <span>*</span></p>
                        <span class="icon-case"><i class="fa fa-user"></i></span>
                        <input type="text" name="father_name" id="father_name" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Prénom' doit être renseigné."/>
                        <div class="validation"></div>
                    </div>

                    <div class="form-group">
                        <p>Gender: <span>*</span></p>
                        <select class="topdown" type="gender" name="gender" id="gender" data-rule="gender" >
                            <option>Male</option>
                            <option>Female</option>
                            <option>Others</option>
                        </select>

                        <!--input type="gender" name="gender" id="gender" data-rule="gender" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire."/-->
                        <div class="validation"></div>
                    </div>

                    <div class="form-group">
                        <p>Mobile Number: <span>*</span></p>
                        <span class="icon-case"><i class="fa fa-home"></i></span>
                        <input type="text" name="mobn" id="mobn" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Société' doit être renseigné."/>
                        <div class="validation"></div>
                    </div>

                </div>

                <div class="rightcontact">



                    <div class="form-group">
                        <p>Physically Challenged <span>*</span></p>
                        <select class="topdown"  name="phychl" id="phychl" data-rule="required">
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                        <!--input type="text" name="phychl" id="phychl" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Code phychl' doit être renseigné."/-->
                        <div class="validation"></div>
                    </div>

                    <div class="form-group">
                        <p>Date of Birth <span>*</span></p>
                        <span class="icon-case"><i class="fa fa-info"></i></span>
                        <input type="date" name="dob" id="dob" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'dob' doit être renseigné."/>
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <p>Full Address <span>*</span></p>
                        <span class="icon-case"><i class="fa fa-location-arrow"></i></span>
                        <input type="text" name="faddress" id="faddress" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'faddress' doit être renseigné."/>
                        <div class="validation"></div>
                    </div>
                </div>
                <button type="submit" class="bouton-contact"><a href="applform.php">Submit</a></button>

        </form>
    </div>
    </div>
    <div class="col-sm-2 sidenav">
        <div >
            <button type="button" class="btn "><a href="applform.php"> User Application form </a></button>
        </div>
        <div >
            <button type="button" class="btn "><a href="car_form.php" >Car reg</a></button>
        </div>
        <div >
            <button type="button" class="btn "><a href="bike_form.php" >Bike reg</a></button>
        </div>
    </div>
  </div>
</div>



</body>
</html>
