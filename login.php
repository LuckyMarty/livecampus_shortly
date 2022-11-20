<!-- Data -->
<?php
require_once('./inc/functions/login.php');
require_once('./inc/functions/data.php');
[$data, $page_id, $root] = [pageData('home'), 'login', true];
?>



<!-- Header -->
<?php include_once('./inc/templates/header.php'); ?>




<!-- Body -->
<main>

    <!-- ****** CHARLES ****** -->
    <!-- TODO: Formulaire de connexion -->
    <form action="" method="post">
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

        <input class="submit" type="submit" value="Login">

        <p>No account yet ? <a href="./signup.php">Sign Up Now !</a></p>
    </form>

</main>
<!-- End Body -->

<!-- Background -->
<lottie-player class="lottie-bg-1" src="https://assets10.lottiefiles.com/packages/lf20_hzkzgdxo.json" background="transparent" speed=".5" loop autoplay></lottie-player>


<!-- Footer -->
<?php include_once('./inc/templates/footer.php'); ?>