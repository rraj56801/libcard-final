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
			$libIdSearchError = "Please enter book Id.";
		} 	
	if( !$error ) {
			$ress = mysqli_query($con,"SELECT * FROM booklist WHERE bookId='$libId'");
echo "<table border='1'>
<tr>
<th>Book Id</th>
<th>Title</th>
<th>Author</th>
<th>Edition</th>
<th>Publisher</th>
<th>Text Book</th>
<th>Shelf Number</th>
<th>Position</th>
</tr>";
while($userRowS=mysqli_fetch_array($ress))
{
	$row = mysqli_query($con,"SELECT * FROM booklist WHERE bookId='$libId'");
		$userRow=mysqli_fetch_array($row);

echo "<tr>";
echo "<td>" . $userRowS['bookId'] . "</td>";
echo "<td>" . $userRowS['bookTitle'] . "</td>";
echo "<td>" . $userRowS['bookAuthor'] . "</td>";
echo "<td>" . $userRowS['bookEdition'] . "</td>";
echo "<td>" . $userRowS['bookPublisher'] . "</td>";
echo "<td>" .$userRowS['textBook'] . "</td>";
echo "<td>" . $userRowS['bookShelfN'] . "</td>";
echo "<td>" . $userRowS['bookShelfP'] . "</td>";
echo "</tr>";
}
echo "</table>";

	
				
	}}
?>