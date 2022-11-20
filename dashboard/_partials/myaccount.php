<?php
require_once("../inc/functions/data.php");
$user = getUser();
?>
<div class="myaccount">
    <h1>My Account</h1>

    <!-- ****** CHARLES ****** -->
    <!-- TODO: Formulaire de modification des infomations du compte client -->
    <form action="" method="post">
        <div class="group">
            <label for="firstname" class="input">
                <input type="text" name="firstname" id="firstname" placeholder=" " value="<?=$user["firstname"] ?>">
                <span>First Name</span>
            </label>
        </div>

        <div class="group">
            <label for="lastname" class="input">
                <input type="text" name="lastname" id="lastname" placeholder=" " value="<?=$user["lastname"] ?>">
                <span>Last Name</span>
            </label>
        </div>

        <div class="group">
            <label for="email" class="input">
                <input type="email" name="email" id="email" placeholder=""  value="<?=$user["email"] ?>">
                <span>Email</span>
            </label>
        </div>

        <div class="group">
            <label for="password" class="input">
                <input type="password" name="password" id="password" placeholder=" " require>
                <span>Password</span>
            </label>
        </div>

        <input class="submit" type="submit" value="Save">
    </form>

</div>