<?php

require_once("db.php");

$con = Createdb();

if(isset($_POST['create'])) {
    createData();
}

function createData() {
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if($bookname && $bookpublisher && $bookprice) {

        $sql = "
            INSERT INTO books(book_name, book_publisher, book_price)
            VALUES('$bookname','$bookpublisher','$bookprice')
        ";

        if(mysqli_query($GLOBALS['con'], $sql)) {
            textNode("success", "Record successfully inserted");
        } else {
            textNode("error", "Error: cannot insert record");
        }

    } else {
        textNode("error", "provide all text values");
    }
}

function textboxValue($value) {
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)) {
        return false;
    } else {
        return $textbox;
    }
}

//messages
function textNode($classname, $msg) {
    $element = "<h2 class='$classname'>$msg</h2>";
    echo $element;
}

//get data from database

function getData() {
    $sql = "SELECT * FROM books";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0) {
       return $result;
    }
}

//update data
if(isset($_POST['update'])) {
    updateData();
}

function updateData() {
    $bookid = textboxValue("book_id");
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if($bookname && $bookpublisher && $bookprice) {
        $sql = "
           UPDATE books SET book_name='$bookname', book_publisher='$bookpublisher', book_price='$bookprice' WHERE id='$bookid' 
        ";

        if(mysqli_query($GLOBALS['con'], $sql)) {
            textNode("success", "Successfully updated");     
        } else {
            textNode("error", "unable to update data");
        }

    } else {
        textNode("error", "select data using edit icon");
    }

}

//delete record
if(isset($_POST['delete'])) {
    deleteRecord();
}

function deleteRecord() {
    $bookid = textboxValue("book_id");

    $sql = "
        DELETE FROM books WHERE id='$bookid'
    ";

    if(mysqli_query($GLOBALS['con'], $sql)) {
        textNode("success", "Record deleted successfully");
    } else {
        textNode("error", "cannot delete record");
    }
}