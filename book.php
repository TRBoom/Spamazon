<!DOCTYPE HTML>
<html>
<style>
body {background-color:#00021b;color:white;}
	a {color:white}
</style>
<body>
<?php
require_once "config.php";
$query = mysqli_query($dbconnect, "SELECT book.title FROM book
										WHERE bookNo='".$_GET['ID']."' ")
   or die (mysqli_error($dbconnect));
   
$bookInfo=mysqli_fetch_array($query);

echo "<h1>{$bookInfo['title']}</h1>";

?>


<table border="1" align="center">
<tr>
  <td>Book Title</td>
  <td>Author</td>
  <td>Price</td>
</tr>

<?php

$query = mysqli_query($dbconnect, "SELECT book.title, book.price,book.bookNo,author.authorNo, author.authorName FROM book 
										INNER JOIN wroteBy ON wroteBy.bookNo=book.bookNo
										INNER JOIN author ON author.authorNo=wroteBy.authorNo
										WHERE book.bookNo='".$_GET['ID']."' ")
   or die (mysqli_error($dbconnect));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td><a href='book.php?ID={$row['bookNo']}'>{$row['title']}</td>
    <td><a href='bio.php?ID={$row['authorNo']}'>{$row['authorName']}</td>
    <td>\${$row['price']}</td>
   </tr>\n";

}

?>
</table>
</body>
</html>