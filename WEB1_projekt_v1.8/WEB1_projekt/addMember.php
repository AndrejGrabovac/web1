<?php
include('assets\templates\header.php');
require('assets/db/baza.php');
?>

<?php

$memberError= '';

if (isset($_POST['memberName'])) {

    $memberName = $_POST['memberName'];
    $memberLastName = $_POST['memberLastName'];
    $email = $_POST['email'];


    $sql = "INSERT INTO member (memberName, memberLastName, email)
        VALUES ('".$memberName."', '".$memberLastName."', '".$email."')";
    if (mysqli_query($db, $sql)) {
        $memberError= "Member added";
    } else {
        $memberError= "Error: " . mysqli_error($db);
    }
}
?>

<body>
    <div class="form-member">
        <h2>Add member</h2>
        <form action="" method="post" name="memberForm" onsubmit="return checkFormMember()">
            <?php echo $memberError;?>
            <input type="text" name="memberName" placeholder="Member name" />
            <input type="text" name="memberLastName" placeholder="Member last name" />
            <input type="email" name="email" placeholder="Member email" />
            <input type="submit" value="Add member" />
        </form>
    </div>
</body>

</html>
<?php
include('assets\templates\footer.php');


?>