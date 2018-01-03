<?php
		require_once 'dbconnect_trans.php';
	  $con = mysqli_connect(DBHOST_S,DBUSER_S,DBPASS_S);
	$dbconn = mysqli_select_db($con,DBNAME_S);
	
	$error = false;
	
	if (isset($_POST['btn_purchase']) ) {
				
	
		$libId = trim($_POST['libId']);
		$libId = strip_tags($libId);
		$libId = htmlspecialchars($libId);
		// basic name validation
		if (empty($libId)) {
			$error = true;
			$libIdSearchError = "Please enter your library Id.";
		} 	
	if( !$error ) {
			$ress = mysqli_query($con,"SELECT * FROM transaction WHERE studentLibId='$libId'");
echo "<table border='1'>
<tr>
<th>Library Id</th>
<th>Roll Number</th>
<th>Name</th>
<th>Course</th>
<th>Semester</th>
<th>Book Issued</th>
<th>Date of Issue</th>
<th>Date of Submission</th>

</tr>";
while($userRowS=mysqli_fetch_array($ress))
{
	$row = mysqli_query($con,"SELECT * FROM booklist WHERE bookId=".$userRowS['book_issued']);
		$userRow=mysqli_fetch_array($row);

echo "<tr>";
echo "<td>" . $userRowS['studentLibId'] . "</td>";
echo "<td>" . $userRowS['studentRoll'] . "</td>";
echo "<td>" . $userRowS['studentName'] . "</td>";
echo "<td>" . $userRowS['studentCourse'] . "</td>";
echo "<td>" . $userRowS['studentSem'] . "</td>";
echo "<td>" .$userRowS['book_issued'] . $userRow['bookTitle'] .$userRow['bookShelfN'] .$userRow['bookShelfP'] . "</td>";
echo "<td>" . $userRowS['date_issue'] . "</td>";
echo "<td>" . $userRowS['date_submit'] . "</td>";
echo "</tr>";
}
echo "</table>";

	
				
	}}
?>