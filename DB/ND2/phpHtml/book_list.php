<?php
 $db = mysqli_connect('localhost','root','root','Nd2')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 </head>
 <body>
  <h1>Book list:</h1>
  <ul>

  <?php
   $query = "SELECT * FROM Books";
   $result = mysqli_query($db, $query) or die('Error querying database.');
   while ($row = mysqli_fetch_array($result)) {
    $bookTitle = $row['title'];
    $id = $row['bookId'];
    echo '<li>' . '<a href = "book_details.php?id=' . $id .'">' . $bookTitle . '</a>' . '</li>';
   }
   mysqli_close($db);
  ?>

  </ul>
 </body>
</html>
