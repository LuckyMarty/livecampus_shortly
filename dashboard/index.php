<!-- Data -->
<?php
require_once('../inc/functions/data.php');
// ****** CHARLES ******
// TODO: Modifier la vairable $role

[$site,         $data,                  $page_id,       $role] = 
[siteData(),    pageData('dashboard'), 'dashboard',     'admin'];
?>


<!-- Header -->
<?php include_once('../inc/templates/header.php'); ?>




<!-- Body -->

<!-- Left Navigation -->
<?php include_once('./_partials/aside.php'); ?>




<!-- Main -->
<main>
    <?php
    if (filter_input(INPUT_GET, 'admin') !== null && $role == 'admin') {
        include_once('./_partials/admin.php');
    } else {
        include_once('./_partials/dashboard.php');
    }
    ?>
</main>


<!-- End Main -->

<!-- Background Animation -->
<lottie-player class="lottie-bg" src="../inc/assets/medias/lottie/lf30_editor_flpddsxe.json" background="transparent" speed="1" loop autoplay></lottie-player>

<!-- End Body -->



<!-- Footer -->
<?php include_once('../inc/templates/footer.php'); ?>