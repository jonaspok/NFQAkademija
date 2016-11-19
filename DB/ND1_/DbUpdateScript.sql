INSERT INTO Authors(name) VALUES ('Jonas Basanavicius');
INSERT INTO Books (authorId, title, year) VALUES ( 8, 'Mergeliu miskas', 2012);
UPDATE Books SET authorId = 7 WHERE bookId = 9;
DELETE FROM Authors WHERE authorId = 8;
DELETE FROM Books WHERE authorId is NULL;
ALTER TABLE Books ADD gendre varchar(255);
CREATE TABLE IF NOT EXISTS BooksAuthors (
  id int(11) NOT NULL AUTO_INCREMENT,
  bookId int(11) NOT NULL,
  authorId int(11) NOT NULL,
  PRIMARY KEY (id)
);
ALTER TABLE  Books DROP COLUMN authorId;
UPDATE Books SET gendre = 'Computer science' WHERE bookId = 1;
UPDATE Books SET gendre = 'Computer science' WHERE bookId = 2;
UPDATE Books SET gendre = 'Computer science' WHERE bookId = 3;
UPDATE Books SET gendre = 'Computer science' WHERE bookId = 4;
UPDATE Books SET gendre = 'Computer science' WHERE bookId = 5;
UPDATE Books SET gendre = 'Fiction' WHERE bookId = 9;
INSERT INTO BooksAuthors(bookId, authorId) VALUES (1,1);
INSERT INTO BooksAuthors(bookId, authorId) VALUES (2,2);
INSERT INTO BooksAuthors(bookId, authorId) VALUES (3,4);
INSERT INTO BooksAuthors(bookId, authorId) VALUES (4,6);
INSERT INTO BooksAuthors(bookId, authorId) VALUES (5,7);
INSERT INTO BooksAuthors(bookId, authorId) VALUES (9,7);
INSERT INTO BooksAuthors(bookId, authorId) VALUES (3,5);
INSERT INTO BooksAuthors(bookId, authorId) VALUES (3,3);
INSERT INTO BooksAuthors(bookId, authorId) VALUES (5,1);
ALTER TABLE Books MODIFY title VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci;
INSERT INTO Books (title, year, gendre) VALUES ('Receptų knyga', 2008, 'Kulinarija');

