<?php
function Createdb()
{
    $servername = "localhost";
    $username = "root";
    $password = "********";
    $dbname = "bookstore";

    //connection to server
    $con = mysqli_connect($servername, $username, $password);

    //check the connection
    if (!$con) {
        die("Connection Faild: " . mysqli_connect_error());
    }

    //create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if (mysqli_query($con, $sql)) {
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $sql =
            " CREATE TABLE IF NOT EXISTS books(
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            book_name VARCHAR(25) NOT NULL,
            book_publisher VARCHAR(20),
            book_price FLOAT
            ); 
        ";
        if (mysqli_query($con, $sql)) {
            return $con;
        } else {
            echo "Cannot create table " . mysqli_error(($con));
        }
    } else {
        echo "Error wile creating database " . mysqli_error(($con));
    }
}
