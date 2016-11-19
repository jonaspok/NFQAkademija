<?php
include "Book.php";
?>
<html>
 <head>
 </head>
 <body>
  <h1>Book list:</h1>
  <ul>
  <?php
   $book = new Book("localhost","root", "root", "Nd2");
   $bookIds = $book->getAllBookIds();
   foreach($bookIds as $bookId)
   {
    $id = $bookId;
    $book->loadBookById($id);
    echo '<li>' . '<a href = "book_details.php?id=' . $id .'">' . $book->getTitle() . '</a>' . '</li>';
   }
  ?>
  </ul>
 </body>
</html>
