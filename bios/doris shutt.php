<!DOCTYPE HTML>
<html>
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

$query = mysqli_query($dbconnect, "SELECT * FROM book WHERE authorName='Doris Shutt'")
   or die (mysqli_error($dbconnect));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td><a href='books/{$row['title']}'>{$row['title']}</td>
    <td><a href='bios/{$row['authorName']}'>{$row['authorName']}</td>
    <td>\${$row['price']}</td>
   </tr>\n";

}

?>
</table>
</body>
</html>