<?php
    class Book {
        // properties
        private $title;
        private $author;
        private $price;

        //constructor => called automatically when instantiating/creating an object
        public function __construct($new_title, $new_author, $new_price){
            $this->title = $new_title;
            $this->author = $new_author;
            $this->price = $new_price;
        }

        //destructor => automatically runs when all of the code is finish running
        public function __destruct(){
            echo "<strong>Finish running code</strong>";
        }

        //setters => functions used to set the value of the variables
        public function setTitle($new_title)
        {
            $this->title = $new_title;
        }

        public function setAuthor($new_author){
            $this->author = $new_author;
        }

        public function setPrice($new_price){
            $this->price = $new_price;
        }

        public function setValue($new_title, $new_author, $new_price){
            $this->title = $new_title;
            $this->author = $new_author;
            $this->price = $new_price;
        }

        //getter => functions used to get values of the properties
        public function getTitle(){
            return $this->title;
        }

        public function getAuthor(){
            return $this->author;
        }

        public function getPrice(){
            return $this->price;
        }

    }

    // $bookObj = new Book(); //instantiate => create an object

    // //Call Setters => set the values of the properties
    // $bookObj->setTitle("The Adventures of Tom Sawyer");
    // $bookObj->setAuthor("Mark Twain");
    // $bookObj->setPrice(5);

    // //Call Getters => get the values of the properties
    // echo $bookObj->getTitle(),"<br>";
    // echo $bookObj->getAuthor(),"<br>";
    // echo $bookObj->getPrice(),"<br>";


?>