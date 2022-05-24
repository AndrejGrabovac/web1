<?php
include('assets\templates\header.php');
require('assets/db/baza.php');
?>
<html>

<body>
    <div class="container-book">
        <h2>Books</h2>
        <table class="table">
            <thead>
                <tr>
                    <th><strong>Book ID</strong></th>
                    <th><strong>Serial number</strong></th>
                    <th><strong>Name</strong></th>
                    <th><strong>Author</strong></th>
                    <th><strong>Publish year</strong></th>
                    <th><strong>Total books</strong></th>
                    <th><strong>Total number of available books</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $sql = "Select * from book ORDER BY bookID asc;";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row["bookID"]; ?></td>
                        <td><?php echo $row["bookCode"]; ?></td>
                        <td><?php echo $row["bookName"]; ?></td>
                        <td><?php echo $row["bookAuthor"]; ?></td>
                        <td><?php echo $row["publishYear"]; ?></td>
                        <td><?php echo $row["totalNumber"]; ?></td>
                        <td><?php echo $row["availableBooks"]; ?></td>
                        <td><a class="delete" href="deleteBook.php?bookID=<?php echo $row["bookID"]; ?>">Delete</a></td>
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