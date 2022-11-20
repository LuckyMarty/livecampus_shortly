<?php 
session_start();
?>
<aside style="background-image: url('../inc/assets/medias/homepage_bg.jpg');">

    <div>
        <h2><?= $site['name'] ?></h2>

        <nav>
            <ul>
                <li><a href="./"><i class="fa-solid fa-grip"></i> Dashboard</a></li>
<!-- TODO: gére le role  -->
                <?php 
                if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
                    <li><a href="?admin"><i class="fa-solid fa-users"></i> Admin</a></li>
                <?php endif; ?>
                
                <li class="dropdown"><a href="?myaccount"><i class="fa-solid fa-user"></i> My account</a>
                    <!-- <ul>
                        <li><a href="#">Data</a></li>
                    </ul> -->
                </li>
            </ul>
        </nav>

        <!-- ****** CHARLES ****** -->
        <!-- TODO: Lien de déconnexion -->
        <a href="../inc/functions/logout.php" class="logout">Logout</a>
    </div>

</aside>