<?php
    /**
    *@backupGlobals disabled
    *@backupStaticAttributes disabled
    */
    require_once "src/Book.php";
    // require_once "src/Author.php";
    $server = 'mysql:host=localhost;dbname=library_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);
    class BookTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            // Author::deleteAll();
            Book::deleteAll();
            // Patron::deleteAll();
            // Checkout::deleteAll();
        }
        function testSetBookName()
        {
            $book_name = "Siddhartha";
            $test_book = new Book($book_name);
            $test_book->setTitle("Buddha");
            $result = $test_book->getTitle();
            $this->assertEquals("Buddha", $result);
        }
        function testGetBookName()
        {
            $book_name = "Siddhartha";
            $test_book = new Book($book_name);
            $result = $test_book->getTitle();
            $this->assertEquals($book_name, $result);
        }
        function testGetId()
        {
            $book_name = "Siddhartha";
            $id = 100;
            $test_book = new Book($book_name, $id);
            $result = $test_book->getId();
            $this->assertEquals($id, $result);
        }
        function testSave()
        {
            $book_name = "Siddhartha";
            $test_book = new Book($book_name);
            $test_book->save();
            $result = Book::getAll();
            $this->assertEquals($test_book, $result[0]);
        }
        function testGetAll()
        {
            $book_name = "Siddhartha";
            $test_book = new Book($book_name);
            $test_book->save();
            $book_name = "The Stranger";
            $test_book2 = new Book($book_name);
            $test_book2->save();
            $result = Book::getAll();
            $this->assertEquals([$test_book, $test_book2], $result);
        }
        function testUpdate()
        {
            $book_name = "Siddhartha";
            $test_book = new Book($book_name);
            $test_book->save();
            $test_book->setTitle("Peace Train");
            $test_book->update();
            $result = Book::getAll();
            $this->assertEquals($test_book, $result[0]);
        }
        // function testDeleteOne()
        // {
        //     $book_name = "Siddhartha";
        //     $test_book = new Book($book_name);
        //     $test_book->save();
        //     $book_name = "The Stranger";
        //     $test_book2 = new Book($book_name);
        //     $test_book2->save();
        //     $test_book->deleteOne();
        //     $result = Book::getAll();
        //     $this->assertEquals([$test_book2], $result);
        // }
        // function testAddAuthor()
        // {
        //     $book_name = "The Stranger";
        //     $test_book = new Book($book_name);
        //     $test_book->save();
        //     $author_name = "Albert Camus";
        //     $test_author = new Author($author_name);
        //     $test_author->save();
        //     $test_book->addAuthor($test_author);
        //     $result = $test_book->getAuthors();
        //     $this->assertEquals($test_author, $result[0]);
        // }
    }
?>
