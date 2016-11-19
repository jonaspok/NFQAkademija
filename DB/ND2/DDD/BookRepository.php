<?php

/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 16.11.15
 * Time: 18.35
 */
include "Book.php";
class BookRepository
{
    private $hostName;
    private $userName;
    private $psw;
    private $dbName;

    public function __construct($hostName, $userName, $psw, $dbName)
    {
        $this->hostName = $hostName;
        $this->userName = $userName;
        $this->psw = $psw;
        $this->dbName = $dbName;
    }

    public function getBookById($id)
     {
         $db = mysqli_connect($this->hostName, $this->userName, $this->psw, $this->dbName) or die('Error connecting to MySQL server.');
         $query = "SELECT * FROM Books WHERE bookId = $id";
         $result = mysqli_query($db, $query) or die('Error querying database.');
         $row = mysqli_fetch_array($result);
         $book = new Book();
         $book->setBookId($row['bookId']);
         $book->setYear($row['year']);
         $book->setTitle($row['title']);
         $book->setGendre($row['gendre']);
         mysqli_close($db);
         return $book;
     }

     public function getAllBooks()
     {
         $db = mysqli_connect($this->hostName, $this->userName, $this->psw, $this->dbName) or die('Error connecting to MySQL server.');
         $query = "SELECT * FROM Books";
         $result = mysqli_query($db, $query) or die('Error querying database.');
         $books = array();
         while($row = mysqli_fetch_array($result))
         {
             $book = new Book();
             $book->setBookId($row['bookId']);
             $book->setYear($row['year']);
             $book->setTitle($row['title']);
             $book->setGendre($row['gendre']);
             $books[] = $book;
         }
         mysqli_close($db);
         return $books;
     }

     public function getAuthorsByBookId($bookId)
     {
         $db = mysqli_connect($this->hostName, $this->userName, $this->psw, $this->dbName) or die('Error connecting to MySQL server.');
         $query = "SELECT * 
                   FROM Books 
                   LEFT JOIN BooksAuthors ON Books.bookId = BooksAuthors.bookId 
                   LEFT JOIN Authors ON BooksAuthors.authorId = Authors.authorId 
                   WHERE Books.bookId = $bookId";
         $result = mysqli_query($db, $query) or die('Error querying database.');
         $authors = array();
         while($row = mysqli_fetch_array($result))
             $authors[] = $row['name'];
         mysqli_close($db);
         return $authors;
     }
}
