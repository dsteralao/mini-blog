<?php 
session_start();
//Connect 
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

//check if db is connected
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}


//create Database
$cr_db = "CREATE DATABASE blog-db";
//check database creation
if ($myys->query($cr_db) === TRUE ){
	echo"Database Created";
} echo "NO".$myys->error.'<br>';


// select database
$conn->select_db("blog-db");
if ($conn->select_db("blog-db")) {
   
} else {
    echo "Error selectting database: " . mysqli_error($conn);
}

//create database table blog_post

?>