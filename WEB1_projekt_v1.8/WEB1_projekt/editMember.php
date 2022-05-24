<?php
include('assets\templates\header.php');
require('assets/db/baza.php');

if (count($_POST) > 0) {
    mysqli_query($db, "UPDATE member set memberID='" . $_POST['memberID'] . "', memberName='" . $_POST['memberName'] . "', memberLastName='" . $_POST['memberLastName'] . "', email='" . $_POST['email'] . "' WHERE memberID='" . $_POST['memberID'] . "'");
    $message = "Record Modified Successfully";
}

$sql = mysqli_query($db, "SELECT * FROM member WHERE memberID='" . $_GET['memberID'] . "'");
$row = mysqli_fetch_array($sql);
?>

<html>

<head>
    <title>Edit member</title>
</head>

<body>
    <div class="edit-member">
        <h2>Edit member</h2>
        <form name="editMemberForm" method="post">
            <div><?php if (isset($message)) {
                        echo $message;
                    } ?>
            </div>

            <input type="text" placeholder="Member ID" name="memberID" value="<?php echo $row['memberID']; ?>"readonly="readonly">
            <input type="text" placeholder="Member name" name="memberName" class="text" value="<?php echo $row['memberName']; ?>">
            <input type="text" placeholder="Member last name" name="memberLastName" class="text" value="<?php echo $row['memberLastName']; ?>">
            <input type="text" placeholder="Member e-mail" name="email" class="text" value="<?php echo $row['email']; ?>">
            <input type="submit" name="submit" value="Submit" class="buttom">

        </form>
    </div>
</body>

</html>

<?php
include('assets\templates\footer.php');
?>