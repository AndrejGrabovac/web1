<?php
include('assets\templates\header.php');
require('assets/db/baza.php');
?>

<div class="welcome">
    <div class="text">
        <h1>
            <span class="welcome1"> Welcome to Library </span> <br />
        </h1>
        <div class="login-page">
            <div class="form">
            <p class="message">Please login</p>
                <form action="" method= "POST" class="login-form">
                    <input type="text" name = "userName" placeholder="username" />
                    <input type="password" name="password" placeholder="password" />
                    <input type="submit" name="submit" value="login">             
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('assets\templates\footer.php');
?>