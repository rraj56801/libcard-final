<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysqli_select_db($conn,DBNAME);

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: login.php");
		exit;
	}
	// select loggedin users detail
	$res=mysqli_query($conn,"SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);
?>



<!DOCTYPE html>
<html lang="en">
<head>
<!-- start: Meta -->
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="First platform that will save your time in searching books and keys/shelf in the library.">
	<meta name="author" content="Rahul Raj">

<title>LibCard</title>
 <link rel="icon" type="image/jpg" href="img/logo_libcard.jpg">
  	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: css-m -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
	<link id="bootstrap-style" href="css-m/bootstrap.min.css" rel="stylesheet">
	<link href="css-m/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css-m/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css-m/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: css-m -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css-m/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css-m/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	</head>
<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" ><span>LibCard</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
							
										<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['userName']; ?>&nbsp;<span class="caret"></span></a>
								  		<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
		  <li><a href="index.html"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>				
           <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Profile</a></li>     
            <li><a href="logout.php?logout"><i class="halflings-icon off"></i>&nbsp;Log Out</a></li>
                
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
		<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="index.html"><i class="glyphicon glyphicon-home"></i>&nbsp;<span class="hidden-tablet">Home</span></a></li>	
						<li><a href="purchase.php"><i class="glyphicon glyphicon-book"></i>&nbsp;<span class="hidden-tablet">Purchase</span></a></li>
			
						<li>
							<a class="dropmenu" href="#"><i class="glyphicon glyphicon-list"></i>&nbsp;<span class="hidden-tablet">Catalog</span>&nbsp;<span class="label label-important">5</span></a>
							<ul>
							<li><a class="submenu" href="author.php"><i class="glyphicon glyphicon-user"></i>&nbsp;<span class="hidden-tablet">Author</span></a></li>
								<li><a class="submenu" href="book_title.php"><i class="glyphicon glyphicon-book"></i>&nbsp;<span class="hidden-tablet">Book title</span></a></li>
								<li><a class="submenu" href="edition.php"><i class="glyphicon glyphicon-book"></i>&nbsp;<span class="hidden-tablet">Edition</span></a></li>		
								<li><a class="submenu" href="publisher.php"><i class="glyphicon glyphicon-book"></i>&nbsp;<span class="hidden-tablet">Publisher</span></a></li>
								<li><a class="submenu" href="textbook.php"><i class="glyphicon glyphicon-book"></i>&nbsp;<span class="hidden-tablet">Text Book</span></a></li>
								</ul>	
						</li>
						<li><a href="submit.php"><i class="glyphicon glyphicon-book"></i>&nbsp;<span class="hidden-tablet">Submit</span></a></li>
						<li><a href="gallery.php"><i class="glyphicon glyphicon-picture"></i>&nbsp;<span class="hidden-tablet"> Gallery</span></a></li>
						<li><a href="calendar.php"><i class="glyphicon glyphicon-calendar"></i>&nbsp;<span class="hidden-tablet"> Calendar</span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
						
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Gallery</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
					
						<h2><i class="halflings-icon picture"></i><span class="break"></span> Gallery</h2>
						
						<div class="box-icon">
							<a href="#" id="toggle-fullscreen" class="hidden-phone hidden-tablet"><i class="halflings-icon fullscreen"></i></a>
							
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
				
					<div class="box-content">
					
						<div class="masonry-gallery">
						
														<div id="image-1" class="masonry-thumb">
								<a style="background:url(img/gallery/photo1.jpg)" title="Sample Image 1" href="img/gallery/photo1.jpg"><img class="grayscale" src="img/gallery/photo1.jpg" alt="Sample Image 1"></a>
							</div>
														<div id="image-2" class="masonry-thumb">
								<a style="background:url(img/gallery/photo2.jpg)" title="Sample Image 2" href="img/gallery/photo2.jpg"><img class="grayscale" src="img/gallery/photo2.jpg" alt="Sample Image 2"></a>
							</div>
														<div id="image-3" class="masonry-thumb">
								<a style="background:url(img/gallery/photo3.jpg)" title="Sample Image 3" href="img/gallery/photo3.jpg"><img class="grayscale" src="img/gallery/photo3.jpg" alt="Sample Image 3"></a>
							</div>
														<div id="image-4" class="masonry-thumb">
								<a style="background:url(img/gallery/photo4.jpg)" title="Sample Image 4" href="img/gallery/photo4.jpg"><img class="grayscale" src="img/gallery/photo4.jpg" alt="Sample Image 4"></a>
							</div>
														<div id="image-5" class="masonry-thumb">
								<a style="background:url(img/gallery/photo5.jpg)" title="Sample Image 5" href="img/gallery/photo5.jpg"><img class="grayscale" src="img/gallery/photo5.jpg" alt="Sample Image 5"></a>
							</div>
														<div id="image-6" class="masonry-thumb">
								<a style="background:url(img/gallery/photo6.jpg)" title="Sample Image 6" href="img/gallery/photo6.jpg"><img class="grayscale" src="img/gallery/photo6.jpg" alt="Sample Image 6"></a>
							</div>
														<div id="image-7" class="masonry-thumb">
								<a style="background:url(img/gallery/photo7.jpg)" title="Sample Image 7" href="img/gallery/photo7.jpg"><img class="grayscale" src="img/gallery/photo7.jpg" alt="Sample Image 7"></a>
							</div>
														<div id="image-8" class="masonry-thumb">
								<a style="background:url(img/gallery/photo8.jpg)" title="Sample Image 8" href="img/gallery/photo8.jpg"><img class="grayscale" src="img/gallery/photo8.jpg" alt="Sample Image 8"></a>
							</div>
														<div id="image-9" class="masonry-thumb">
								<a style="background:url(img/gallery/photo9.jpg)" title="Sample Image 9" href="img/gallery/photo9.jpg"><img class="grayscale" src="img/gallery/photo9.jpg" alt="Sample Image 9"></a>
							</div>
								<div id="image-10" class="masonry-thumb">
								<a style="background:url(img/gallery/photo10.jpg)" title="Sample Image 10" href="img/gallery/photo10.jpg"><img class="grayscale" src="img/gallery/photo10.jpg" alt="Sample Image 10"></a>
							</div>
							
														<div id="image-11" class="masonry-thumb">
								<a style="background:url(img/gallery/photo11.jpg)" title="Sample Image 11" href="img/gallery/photo11.jpg"><img class="grayscale" src="img/gallery/photo11.jpg" alt="Sample Image 11"></a>
							</div>
							
														<div id="image-12" class="masonry-thumb">
								<a style="background:url(img/gallery/photo12.jpg)" title="Sample Image 12" href="img/gallery/photo12.jpg"><img class="grayscale" src="img/gallery/photo12.jpg" alt="Sample Image 12"></a>
							</div>
													
													</div>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
    

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Settings to be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	
	<div id="footer">
  <div class="container">
  <p style="text-align:center;">
	<span style="text-align:center;float:center">&copy;Copyright © 2017 <a href="https://www.facebook.com/errajrahul" alt="LibCard_Dashboard">LibCard</a>  All Rights Reserved.</span>
	<span style="text-align:center;float:center center">Designed & Maintain By- Rahul Raj</span>
					
		</p>
</div>
</div>

	<!-- start: JavaScript-->

		<script src="js-m/jquery-1.9.1.min.js"></script>
	<script src="js-m/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js-m/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js-m/jquery.ui.touch-punch.js"></script>
	
		<script src="js-m/modernizr.js"></script>
	
		<script src="js-m/bootstrap.min.js"></script>
	
		<script src="js-m/jquery.cookie.js"></script>
	
		<script src='js-m/fullcalendar.min.js'></script>
	
		<script src='js-m/jquery.dataTables.min.js'></script>

		<script src="js-m/excanvas.js"></script>
	<script src="js-m/jquery.flot.js"></script>
	<script src="js-m/jquery.flot.pie.js"></script>
	<script src="js-m/jquery.flot.stack.js"></script>
	<script src="js-m/jquery.flot.resize.min.js"></script>
	
		<script src="js-m/jquery.chosen.min.js"></script>
	
		<script src="js-m/jquery.uniform.min.js"></script>
		
		<script src="js-m/jquery.cleditor.min.js"></script>
	
		<script src="js-m/jquery.noty.js"></script>
	
		<script src="js-m/jquery.elfinder.min.js"></script>
	
		<script src="js-m/jquery.raty.min.js"></script>
	
		<script src="js-m/jquery.iphone.toggle.js"></script>
	
		<script src="js-m/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js-m/jquery.gritter.min.js"></script>
	
		<script src="js-m/jquery.imagesloaded.js"></script>
	
		<script src="js-m/jquery.masonry.min.js"></script>
	
		<script src="js-m/jquery.knob.modified.js"></script>
	
		<script src="js-m/jquery.sparkline.min.js"></script>
	
		<script src="js-m/counter.js"></script>
	
		<script src="js-m/retina.js"></script>

		<script src="js-m/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>

