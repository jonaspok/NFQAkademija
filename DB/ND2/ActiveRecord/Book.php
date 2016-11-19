<?php

/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 16.11.15
 * Time: 17.49
 */
class Book
{
    private $hostName;
    private $userName;
    private $psw;
    private $dbName;
    private $bookId;
    private $title;
    private $year;
    private $gendre;

    /**
     * Book constructor.
     * @param $hostName
     * @param $userName
     * @param $psw
     * @param $dbName
     */
    public function __construct($hostName, $userName, $psw, $dbName)
    {
        $this->hostName = $hostName;
        $this->userName = $userName;
        $this->psw = $psw;
        $this->dbName = $dbName;
    }

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @param mixed $bookId
     * @return Book
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     * @return Book
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getGendre()
    {
        return $this->gendre;
    }

    /**
     * @param mixed $gendre
     * @return Book
     */
    public function setGendre($gendre)
    {
        $this->gendre = $gendre;
        return $this;
    }

    public function loadBookById($id)
    {
        $db = mysqli_connect($this->hostName, $this->userName, $this->psw, $this->dbName) or die('Error connecting to MySQL server.');
        $query = "SELECT * FROM Books WHERE bookId = $id";
        $result = mysqli_query($db, $query) or die('Error querying database.');
        $row = mysqli_fetch_array($result);
        $this->setBookId($row['bookId']);
        $this->setYear($row['year']);
        $this->setTitle($row['title']);
        $this->setGendre($row['gendre']);
        mysqli_close($db);
    }

    public function getAllBookIds()
    {
        $db = mysqli_connect($this->hostName, $this->userName, $this->psw, $this->dbName) or die('Error connecting to MySQL server.');
        $query = "SELECT bookId FROM Books";
        $result = mysqli_query($db, $query) or die('Error querying database.');
        $ids = array();
        while($row = mysqli_fetch_array($result))
            $ids[] = $row['bookId'];
        mysqli_close($db);
        return $ids;
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