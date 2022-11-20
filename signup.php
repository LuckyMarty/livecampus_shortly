<!-- Data -->
<?php
require_once('./inc/functions/data.php');
[$data, $page_id, $root] = [pageData('home'), 'signup', true];


?>



<!-- Header -->
<?php include_once('./inc/templates/header.php'); ?>




<!-- Body -->
<main>

    <!-- ****** CHARLES ****** -->
    <!-- TODO: Formulaire de création de compte -->
    <form action="./inc/functions/pages.php" method="post">
        <div class="group">
            <label for="firstname" class="input">
                <input type="text" name="firstname" id="firstname" placeholder=" ">
                <span>First Name</span>
            </label>
        </div>

        <div class="group">
            <label for="lastname" class="input">
                <input type="text" name="lastname" id="lastname" placeholder=" ">
                <span>Last Name</span>
            </label>
        </div>

        <div class="group">
            <label for="email" class="input">
                <input type="email" name="email" id="email" placeholder=" ">
                <span>Email</span>
            </label>
        </div>

        <div class="group">
            <label for="password" class="input">
                <input type="password" name="password" id="password" placeholder=" ">
                <span>Password</span>
            </label>
        </div>

        <input class="submit" type="submit" value="Sign Up">

        <p>Already have an account ? <a href="./login.php">Log In Now !</a></p>
    </form>

</main>
<!-- End Body -->

<!-- Background -->
<lottie-player class="lottie-bg-1" src="https://assets10.lottiefiles.com/packages/lf20_hzkzgdxo.json" background="transparent" speed=".5" loop autoplay></lottie-player>


<!-- Footer -->
<?php include_once('./inc/templates/footer.php'); ?>