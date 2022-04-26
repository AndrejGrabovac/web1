<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS library4";
    if($conn->query($sql)){
        print('Baza kreirana');
    }
    else{
        print('Baza nije kreirana');
    }

// sql to create table
$sql = "CREATE TABLE book (
        bookID int(11) NOT NULL auto_increment PRIMARY KEY,
        bookCode int NOT NULL,
        bookName varchar(255) NOT NULL default '',
        bookAuthor varchar(255) NOT NULL default '',
        publishYear	 int NOT NULL,
        totalNumber int NOT NULL,
        availableBooks int not null
)";

if ($conn->query($sql) === TRUE) {
    echo "Table book created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE member (
        memberID int(11) NOT NULL auto_increment PRIMARY KEY,
        memberName varchar(255) NOT NULL default '',
        memberLastName varchar(255) NOT NULL,
        email varchar(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table member created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
