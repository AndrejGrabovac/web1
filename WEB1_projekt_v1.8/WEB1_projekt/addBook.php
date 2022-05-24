<?php
include('assets\templates\header.php');
require('assets/db/baza.php');
?>


<?php

$bookError = '';

if (isset($_POST['bookCode'])) {

    $bookCode = $_POST['bookCode'];
    $bookName = $_POST['bookName'];
    $bookAuthor = $_POST['bookAuthor'];
    $publishYear = $_POST['publishYear'];
    $totalNumber = $_POST['totalNumber'];
    $availableBooks = $_POST['availableBooks'];


    $sql = "INSERT INTO book (bookCode, bookName, bookAuthor, publishYear, totalNumber, availableBooks)
        VALUES ('" . $bookCode . "', '" . $bookName . "', '" . $bookAuthor . "', '" . $publishYear . "', '" . $totalNumber . "', '" . $availableBooks    . "')";
    if (mysqli_query($db, $sql)) {
        $bookError = "Book added";
    } else {
        $bookError = "Error: " . mysqli_error($db);
    }
}

?>
<body>
    <div class="form-book">
        <h2>Add book</h2>
        <form action="" method="POST" name="bookForm" onsubmit="return checkFormBook()">
            <?php echo $bookError; ?>
            <input type="text" name="bookCode" placeholder="Book code" />
            <input type="text" name="bookName" placeholder="Book name" />
            <input type="text" name="bookAuthor" placeholder="Book author" />
            <input type="text" name="publishYear" placeholder="Publish year format(YYYY-MM-DD)" />
            <input type="text" name="totalNumber" placeholder="Total number of books" />
            <input type="text" name="availableBooks" placeholder="Total number of available books" />
            <input type="submit" name="addBook" value="Add book" />
        </form>
    </div>
</body>

<?php



?>

<?php
include('assets\templates\footer.php');
?>