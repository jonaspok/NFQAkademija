<?php
include "BookRepository.php";
?>
<html>
 <head>
 </head>
 <body>
  <h1>Book list:</h1>
  <ul>
  <?php
   $bookrep = new BookRepository("localhost","root", "root", "Nd2");
   $books = $bookrep->getAllBooks();
   foreach($books as $b)
   {
    $id = $b->getBookId();
    echo '<li>' . '<a href = "book_details.php?id=' . $id .'">' . $b->getTitle() . '</a>' . '</li>';
   }
  ?>
  </ul>
 </body>
</html>
