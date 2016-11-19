<?php
 $db = mysqli_connect('localhost','root','root','Nd2')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 </head>
 <body>
  <h1>Book details:</h1>

  <?php
   $id = $_GET['id'];
   $query = "SELECT * FROM Books WHERE bookId = $id";
   $result = mysqli_query($db, $query) or die('Error querying database.');
   $book_details = mysqli_fetch_array($result);
   echo 'Title: ' . $book_details['title'] . '<br/>';
   echo 'Year: ' . $book_details['year'] . '<br/>';
   echo 'Gendre: ' . $book_details['gendre'] . '<br/>';
   $query = "SELECT name FROM Books 
             LEFT JOIN BooksAuthors ON Books.bookId = BooksAuthors.bookId 
             LEFT JOIN Authors ON BooksAuthors.authorId = Authors.authorId 
             WHERE Books.bookId = $id";
   $result = mysqli_query($db, $query) or die('Error querying database.');
   $recordCount = mysqli_num_rows($result);
   if($recordCount > 1)
   { 
    echo 'Authors: ';
    $auth = "";
    while ($authors = mysqli_fetch_array($result))
       $auth .= trim($authors['name'], " ") . ', '; 
    $auth = rtrim($auth, ", ");
    echo $auth . '<br/>';
   }
   else
   {
    $authors = mysqli_fetch_array($result);
    echo 'Author: '. $authors['name'] . '<br/>';
   }
   mysqli_close($db);
  ?>

  <br/>
  <a href = 'book_list.php'> Back to list </a>
 </body>
</html>
