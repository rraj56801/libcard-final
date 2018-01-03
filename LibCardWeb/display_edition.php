<?php
	require_once 'dbconnect_trans.php';

	  $con = mysqli_connect(DBHOST_S,DBUSER_S,DBPASS_S);
	$dbconn = mysqli_select_db($con,DBNAME_S);
	
	$error = false;
			$ress = mysqli_query($con,"SELECT * FROM booklist");
	$userRowS=mysqli_fetch_array($ress);
	
	if (isset($_POST['btn_search']) ) {
				
	
		$libId = trim($_POST['libId']);
		$libId = strip_tags($libId);
		$libId = htmlspecialchars($libId);
		// basic name validation
		if (empty($libId)) {
			$error = true;
			$libIdSearchError = "Please enter author name.";
		} 	
	if( !$error ) {
		$ress = mysqli_query($con,"SELECT * FROM booklist WHERE bookEdition='$libId'");
	//$userRowS=mysqli_fetch_array($ress);
	
echo "<table border='1'>
<tr>
<th>Book Id</th>
<th>Book Title</th>
<th>Book Author</th>
<th>Book Edition</th>
<th>Publisher</th>
<th>TextBook</th>
<th>Shelf Number</th>

</tr>";
while($userRowS=mysqli_fetch_array($ress))
{
echo "<tr>";
echo "<td>" . $userRowS['bookId'] . "</td>";
echo "<td>" . $userRowS['bookTitle'] . "</td>";
echo "<td>" . $userRowS['bookAuthor'] . "</td>";
echo "<td>" . $userRowS['bookEdition'] . "</td>";
echo "<td>" . $userRowS['bookPublisher'] . "</td>";
echo "<td>" . $userRowS['textBook'] . "</td>";
echo "<td>" . $userRowS['bookShelfN']. $userRowS['bookShelfP'] . "</td>";
echo "</tr>";
}
echo "</table>";

	
				
	}}
?>