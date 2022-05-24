
<?php
require_once('assets/db/baza.php');

if(isset($_POST['submit']))
{
  if(empty($_POST["userName"]) || empty($_POST["password"]))
  {
  $message = "Please fill both fields!";
  }
  else{
    $sql = "SELECT  *
      FROM  admin
      WHERE userName =  '".$_POST['userName']."'
        AND password = '".md5($_POST["password"])."'
      LIMIT 1";
    $result = mysqli_query($db,$sql);
    if ($result->num_rows == 0) {
      exit("Wrong user name or password");
    }
    else{
      setcookie("userName", $_POST["userName"], time()+3600);
      setcookie("password", md5(md5($_POST["password"])), time()+3600);
    }
  }
}


if(empty($_COOKIE['userName']) || empty($_COOKIE['password'])){
  if (basename($_SERVER['PHP_SELF']) != 'index.php') {
    $sql = "SELECT  *
      FROM  admin
      WHERE userName =  '".($_COOKIE['userName'] ?? '')."'
        AND password = '".md5($_COOKIE["password"] ?? '')."'
      LIMIT 1";
    $result = mysqli_query($db,$sql);
    if ($result->num_rows == 0) {
      exit("Cookie error!");
    }
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link rel="stylesheet" href="assets/css/form-member.css" />
  <link rel="stylesheet" href="assets/css/form-book.css" />
  <link rel="stylesheet" href="assets/css/form-loanBook.css" />
  <link rel="stylesheet" href="assets/css/records.css">
  <link rel="stylesheet" href="assets/css/editMember.css" />

  <head>

  <body>
    <div class="navbar">
      <a id="a" href="index.php">Home</a>
      <a id="a" href="addBook.php">Add book</a>
      <a id="a" href="addMember.php">Add member</a>
      <a id="a" href="loanBook.php">Loan a book</a>
      <div class="dropdown">
        <button class="dropbtn">Records
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a id="a" href="bookRec.php">Book Record</a>
          <a id="a" href="memberRec.php">Member Record</a>
          <a id="a" href="loanedBooks.php">Loaned books record</a>
        </div>
      </div>
      <a id="a" href="about.php">About</a>
      <p>Welcome to library</p>
    </div>
  </body>

</html>