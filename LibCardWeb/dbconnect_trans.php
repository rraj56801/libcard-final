<?php

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
	
	define('DBHOST_S', 'localhost');
	define('DBUSER_S', 'root');
	define('DBPASS_S', '');
	define('DBNAME_S', 'db_student');
	
	$con = mysqli_connect(DBHOST_S,DBUSER_S,DBPASS_S);
	$dbconn = mysqli_select_db($con,DBNAME_S);
	
	if ( !$con ) {
		die("Connection failed : " . mysqli_connect_error($con));
	}
	
	if ( !$dbconn ) {
		die("Database Connection failed : " . mysqli_connect_error($con));
	}