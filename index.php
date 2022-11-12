<!-- Data -->
<?php
require_once('./inc/functions/data.php');
[$data, $page_id, $root] = [pageData('home'), 'index', true];
?>




<!-- Header -->
<?php include_once('./inc/templates/header.php'); ?>




<!-- Body -->
<main style="background-image: url('<?= $data['bg-img'] ?>')">

    <div>
        <h1><?= $data['title'] ?></h1>
        <p><?= $data['sub-title'] ?></p>

        <div class="buttons">
            <a href="#" class="btn-signup"><?= $data['signup'] ?></a>
            <a href="#" class="btn-signin"><?= $data['signin'] ?></a>
        </div>
    </div>

    <p class="by"><?= $data['by'] ?></p>

</main>
<!-- End Body -->




<!-- Footer -->
<?php include_once('./inc/templates/footer.php'); ?>