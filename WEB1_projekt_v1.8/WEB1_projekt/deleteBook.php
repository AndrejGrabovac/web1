<?php

include_once('assets/db/baza.php');

$sql = "DELETE FROM book WHERE bookID='" . $_GET["bookID"] . "'";
if (mysqli_query($db, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($db);
}
mysqli_close($db);
header("Location: bookRec.php");


