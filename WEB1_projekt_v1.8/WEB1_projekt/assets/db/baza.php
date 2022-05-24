<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library7";
$databaseError = '';

$db = mysqli_connect($servername, $username, $password, $dbname);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
/*
$sql = "CREATE DATABASE IF NOT EXISTS library7";
if ($db->query($sql) === false) {
    echo "Error creating database: " . $db->error;
} else {
    $db->select_db('library7');
}

$sql = "CREATE TABLE IF NOT EXISTS book (
    bookID int(255) auto_increment PRIMARY KEY,
    bookCode int(255) NOT NULL,
    bookName varchar(255) NOT NULL,
    bookAuthor varchar(255) NOT NULL,
    publishYear	 date NOT NULL,
    totalNumber int(255) NOT NULL,
    availableBooks int(255) not null
)";

$db->query($sql) or die($db->error);

$sql = "CREATE TABLE IF NOT EXISTS member (
    memberID int(11)  auto_increment PRIMARY KEY,
    memberName varchar(255) NOT NULL,
    memberLastName varchar(255) NOT NULL,
    email varchar(255) NOT NULL
)";

$db->query($sql) or die($db->error);

$sql = "CREATE TABLE IF NOT EXISTS loanBook (
    bookID int(11) PRIMARY KEY,
    memberID int(11) PRIMARY KEY,
    startDate date not null,
    endDate date not null
)";

$db->query($sql) or die($db->error);

$sql = "CREATE TABLE IF NOT EXISTS admin (
    adminID int(11) PRIMARY KEY auto_increment,
    userName int(11) not null,
    password varchar(255) not null,
)";

$db->query($sql) or die($db->error);
*/

