<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysqli_select_db($conn,DBNAME);
	
	$error = false;
	
	if( isset($_POST['btn-login']) ) {	
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs

		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		// if there's no error, continue to login
		if (!$error) {
			
			
			$res=mysqli_query($conn,"SELECT userId, userName, userPass,userVerification FROM users WHERE userId=".$_SESSION['user']);
			$row=mysqli_fetch_array($res);
			$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
			
			if( $count == 1 && $row['userVerification']==$pass ) {
				$_SESSION['userX'] = $row['userId'];
					header("Location: home_lib.php");			
			} else {
				$errMSG = "Incorrect Credentials, Try again...";
			}
				
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<!-- start: Meta -->
<meta http-equiv="Content-Type" content="text/html" />
<!-- start: Meta -->
	<meta charset="utf-8">
	<title>LibCard</title>
<link rel="icon" type="image/jpg" href="img/logo_libcard.jpg">
	<meta name="description" content="First platform that will save your time in searching books and keys/shelf in the library.">
	<meta name="author" content="Rahul Raj">
<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="css-m/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link id="base-style" href="style.css" rel="stylesheet" type="text/css">
	<link id="base-style-responsive" href="css-m/style-responsive.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url(img/bg-login.jpg) !important; }
		</style>
		
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        <p style="text-align:center;">
            	<font size="5px" color="white" >Welcome to LibCard</font>
           </p>
           <hr/>
        	<div class="form-group">
            	 	<h3 class=""><font color="white">Enter your credentials.</font></h3>
            
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Verification Code" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Continue</button>
            </div>
            <div class="form-group">
            	<hr />
            </div>
                  <div class="form-group">
            	<p style="text-align:center;">
            	<a href="login.php"><font size="5px" color="white">Not A Librarian? Login as student...</font></a>
         </p>   </div>
            <hr />
        </div>
   
           </div>
   
    </form>
    </div>
</div>
	<div align="center">
				<marquee 
			
   				  direction="left"
   				  loop="1000"
     			   scrollamount="5"
     				scrolldelay="2"
    				 behavior="alternate"
    				 width="100%">
    				<font size="5"><a href="index.html">Contact us for verification code...</a></font>
			</marquee>
</div>
		
<div id="footer">
  <div class="container">
  <p style="text-align:center;">
	<span style="text-align:center;float:center">&copy;Copyright © 2017 <a href="https://www.facebook.com/errajrahul" alt="LibCard_Dashboard"><font color="white">LibCard</font></a>  All Rights Reserved.</span>
	<span style="text-align:center;float:center center">Designed & Maintain By- Rahul Raj</span>
					
		</p>
</div>
</div>

</body>
</html>
<?php ob_end_flush(); ?>