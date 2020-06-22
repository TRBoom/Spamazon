<!DOCTYPE HTML>
<html>
<style>
body {background-color:#00021b;color:white;}
	a {color:white}
</style>
<body>
<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "spamazon";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

?>

<table border="1" align="center">
<tr>
  <td>Book Title</td>
  <td>Author</td>
  <td>Price</td>
</tr>

<?php

$query = mysqli_query($dbconnect, "SELECT book.title, book.price,book.bookNo,author.authorNo, author.authorName FROM ((book 
										INNER JOIN wroteBy ON wroteBy.bookNo=book.bookNo)
										INNER JOIN author ON author.authorNo=wroteBy.authorNo)")
   or die (mysqli_error($dbconnect));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td><a href='books/{$row['bookNo']}'>{$row['title']}</td>
    <td><a href='bios/{$row['authorNo']}'>{$row['authorName']}</td>
    <td>\${$row['price']}</td>
   </tr>\n";

}

?>
</table>
</body>
</html>