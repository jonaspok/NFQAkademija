<?php
include "Book.php";
?>
<html>
<head>
</head>
<body>
<h1>Book details:</h1>

<?php
 $id = $_GET['id'];
 $book = new Book("localhost","root", "root", "Nd2");
 $book->loadBookById($id);
 echo 'Title: ' . $book->getTitle() . '<br/>';
 echo 'Year: ' . $book->getYear() . '<br/>';
 echo 'Gendre: ' . $book->getGendre() . '<br/>';
 $authors = $book->getAuthorsByBookId($id);
 if(count($authors) > 1)
 {
     echo 'Authors: ';
     $auth = "";
     foreach ($authors as $a)
        $auth.= trim($a, " ").", ";
     $auth = rtrim($auth, ", ");
     echo $auth . '<br/>';
 }
 else
     echo 'Author: ' . trim($authors[0]," ") . '<br/>';

?>
<br/>
<a href = 'book_list.php'> Back to list </a>
</body>
</html>