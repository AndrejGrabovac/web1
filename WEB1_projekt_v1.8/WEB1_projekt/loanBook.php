<?php
include('assets\templates\header.php');
require('assets/db/baza.php');
?>
<?php
$month = date('m');
$day = date('d');
$year = date('Y');
$today = $year . '-' . $month . '-' . $day;
?>

<?php
$message = '';

if (isset($_POST['books'])) {

    if (!empty($_POST['books'])) {
        $bookID = $_POST['books'];

        $sql = "SELECT availableBooks FROM book WHERE bookID = '$bookID'";
        $result = mysqli_query($db, $sql);

        $row = mysqli_fetch_assoc($result);
        if($row['availableBooks'] >= '1'){
        $sql = "UPDATE book SET availableBooks = ".$row['availableBooks']." - 1 WHERE bookID = '$bookID'";
        mysqli_query($db, $sql);
        }
    } else {
        $message = 'Please select the value.';
    }

    if (!empty($_POST['members'])) {
        $memberID = $_POST['members'];
    } else {
        $message = 'Please select the value.';
    }

    if (!empty($_POST['startDate'])) {
        $startDate = $_POST['startDate'];
    } else {
        $message = 'Please select the value.';
    }

    if (!empty($_POST['endDate'])) {
        $endDate = $_POST['endDate'];
    } else {
        $message = 'Please select the value.';
    }
    $sql = "INSERT INTO loanbook (bookID, memberID, startDate, endDate)
    VALUES ('" . $bookID . "', '" . $memberID . "', '" . $startDate . "', '" . $endDate . "')";
    if (mysqli_query($db, $sql)) {
        $message = "Book loaned!";
    } else {
        $message = "Error: " . mysqli_error($db);
    }
}

?>

<body>
    <div class="loanBookForm">
        <h2>Loan a book</h2>
        <form action="" method="POST" name="loanBookForm" onsubmit="return checkFormLoanBook()">
            <?php echo $message; ?><br>
            <label for="selectMember">Select member: </label>
            <select name="members">
                <?php
                $sql = mysqli_query($db, "SELECT memberName, memberLastName , memberID FROM member");
                while ($row = $sql->fetch_assoc()) {
                    echo '<option value = "' . $row["memberID"] . '" >' . $row['memberName'] . " " .  $row['memberLastName'] . "</option>";
                }
                ?>
            </select><br><br>
            <label for="selectBook">Select book: </label>
            <select name="books">
                <?php
                $sql = mysqli_query($db, "SELECT bookName, bookID FROM book");
                while ($row = $sql->fetch_assoc()) {
                    echo '<option value = "' . $row["bookID"] . '" >' . $row['bookName'] . "</option>";
                }
                ?>
            </select><br><br>
            <label for="startDate">Start date: </label>
            <input type="date" name="startDate" value="<?php echo $today; ?>" readonly="readonly"><br><br>
            <label for="endDate">End date: </label>
            <input type="date" name="endDate" /><br><br>
            <input type="submit" value="Loan book" />
        </form>
    </div>
</body>

<?php
include('assets\templates\footer.php');
?>