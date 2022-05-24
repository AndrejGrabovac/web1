<?php
include('assets\templates\header.php');
require('assets/db/baza.php');
?>
<?php
$sql = ("SELECT bookName, memberName, memberLastName
FROM member, book
WHERE member.memberID = book.bookID");

if (mysqli_query($db, $sql)) {
    $bookError = "Book added";
} else {
    $bookError = "Error: " . mysqli_error($db);
}
?>

<body>
    <div class="container-book">
        <h2>Loaned books</h2>
        <table class="table">
            <thead>
                <tr>
                    <th><strong>Book name</strong></th>
                    <th><strong>Member name</strong></th>
                    <th><strong>Start date</strong></th>
                    <th><strong>End date</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $sql = ("SELECT book.bookID, loanbook.startDate, loanbook.endDate, book.bookName ,member.memberName, member.memberLastName
                FROM    loanbook
                JOIN    book
                  ON    book.bookID = loanbook.bookID
                JOIN    member
                  ON    member.memberID = loanbook.memberID");

                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row["bookName"]; ?></td>
                        <td><?php echo $row["memberName"] ." ".  $row["memberLastName"]; ?></td>
                        <td><?php echo $row["startDate"]; ?></td>
                        <td><?php echo $row["endDate"]; ?></td>
                        <td><a class="delete" href="deleteLoanedBook.php?bookID=<?php echo $row["bookID"]; ?>">Delete</a></td>
                    </tr>
                <?php
                    $i++;
                } ?>
            </tbody>
        </table>
    </div>

</body>

</html>
<?php
include('assets\templates\footer.php');

?>