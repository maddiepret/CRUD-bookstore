<?php
require_once("db.php");
require_once("component.php");

//create connection
$con = Createdb();

//create button click
if (isset($_POST['create'])) {
    createData();
}
//update button click
if (isset($_POST['update'])) {
    UpdateData();
}
//update button click
if (isset($_POST['delete'])) {
    deleteData();
}

function createData()
{
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");
    if ($bookname && $bookpublisher && $bookprice) {
        $sql = " INSERT INTO books(book_name, book_publisher, book_price)VALUES( '$bookname', '$bookpublisher', '$bookprice')
        ";
        if (mysqli_query($GLOBALS['con'], $sql)) {
            TextNode("success", "Data added successfull!");
        } else {
            TextNode("error", "Please Provide data in the textbox");
        }
    } else {
        TextNode("error", "Please Provide data in the textbox");
    }
}

function textboxValue($value)
{
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($textbox)) {
        return false;
    } else {
        return $textbox;
    }
}

// Messages
function TextNode($classname, $msg)
{
    $element = "<h6 class=\"$classname\">$msg</h6>
    ";
    echo $element;
}


// GET DATA FROM DATABASE FOR UPDATE


function getData()
{
    $sql = "SELECT * FROM books";
    $result = mysqli_query($GLOBALS['con'], $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}

function UpdateData()
{
    $bookid = textboxValue("id");
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if ($bookname && $bookpublisher && $bookprice) {
        $sql = " UPDATE books SET book_name='$bookname', book_publisher='$bookpublisher', book_price='$bookprice' WHERE id='$bookid'
        ";
        if (mysqli_query($GLOBALS['con'], $sql)) {
            TextNode("success", "Data successfull updated!");
        } else {
            TextNode("error", "Please Provide data in the textbox");
        }
    } else {
        TextNode("error", "Please Provide data in the textbox");
    }
}

function deleteData()
{
    $bookid = (int) textboxValue("id");
    $sql = "DELETE FROM books WHERE id='$bookid'";
    if (mysqli_query($GLOBALS['con'], $sql)) {
        TextNode("success", "Data successfull updated!");
    } else {
        TextNode("error", "Please Provide data in the textbox");
    }
}
