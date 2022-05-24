<?php

include_once('assets/db/baza.php');

$sql = "DELETE FROM member WHERE memberID='" . $_GET["memberID"] . "'";
if (mysqli_query($db, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($db);
}
mysqli_close($db);
header("Location: memberRec.php");