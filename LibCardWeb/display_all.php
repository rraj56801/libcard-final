<?php
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
?>