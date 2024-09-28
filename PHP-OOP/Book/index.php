<?php
    include "Book.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
</head>
<body>
    <form action="" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
        <br><br>
        <label for="author">Author</label>
        <input type="text" name="author" id="author" required>
        <br><br>
        <label for="price">Price</label>
        <input type="number" name="price" id="price" required>
        <br><br>
        <input type="submit" value="Submit" name="btn_submit">
    </form>
    <?php
        if(isset($_POST["btn_submit"])){
            //INPUT
            $title = $_POST["title"];
            $author = $_POST["author"];
            $price = $_POST["price"];

            //PROCESS
            $bookObj = new Book($title, $author, $price); //instantiate=> create an object
            //new Book() => calls the constructor to create an object

            //set values => Call setters
            // $bookObj->setTitle($title);
            // $bookObj->setAuthor($author);
            // $bookObj->setPrice($price);

            //OUTPUT
            //call the getters
            echo "<p>Title: ".$bookObj->getTitle()."</p>";
            echo "<p>Author: ".$bookObj->getAuthor()."</p>";
            echo "<p>Price: ".$bookObj->getPrice()."</p>";
        }
    ?>
</body>
</html>