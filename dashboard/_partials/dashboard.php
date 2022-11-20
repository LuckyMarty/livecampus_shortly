    <?php
    require_once("../inc/functions/data.php");
    ?>
    <div class="dashboard">
        <h1>👋 <?= $data['h1'] ?></h1>

        <!-- Add URL -->
        <form action="../inc/functions/addLink.php" class="add-link" method="post">
            <div class="group">
                <label class="input">
                    <input name="link" placeholder=" " type="url" required>
                    <span>Enter your URL</span>
                </label>

                <input class="submit" type="submit" value="Add">
            </div>
        </form>
        <!-- End Add URL -->


        <!-- Quick Views -->
        <?php 
            $link = linkData();
        ?>
        <div class="cards-top">
            <div><span><i class="fa-solid fa-list-ol"></i></span>
                <!-- ****** THOMAS ****** -->
                <p>Total links : <?= sizeof($link);?></p>
            </div>
            <div><span><i class="fa-solid fa-link-slash"></i></span>
                <!-- ****** THOMAS ****** -->
                <p>Unpublished links : 
                    <?php
                        $count = 0;
                        foreach($link as $l){
                            if ($l["publish"] == false)
                                $count++;
                        }
                        echo $count;
                    ?>
                </p>
            </div>
            <div><span><i class="fa-solid fa-link"></i></span>
                <!-- ****** THOMAS ****** -->
                <p>Published links : <?= sizeof($link)-$count;?></p>
            </div>
            <div><span><i class="fa-solid fa-wrench"></i></span>
                <p style="display: flex;">
                    Status :
                    Active
                    <lottie-player style="width: 40px; height: 40px; transform: translateY(-35%);" src="https://assets1.lottiefiles.com/packages/lf20_rylykdkp.json" background="transparent" speed="1" loop autoplay></lottie-player>
                </p>
            </div>
        </div>
        <!-- End Quick Views -->

        <!-- Table -->
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Original link</th>
                        <th>Shorten link</th>
                        <th>Click tracking</th>
                        <th>Publish</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    <!-- ****** THOMAS ****** -->
                    <!-- TODO: Liste des liens -->
                    <?php 
                    foreach($link as $l) : 
                    ?>
                        <tr>
                            <td><?= $l["id"] ?></td>
                            <td><a href=<?= $l["raw_link"]?> target="_blank" rel="noopener noreferrer"><?= $l["raw_link"]?></a></td>
                            <td><a href=<?= "../r.php?r=".$l["short_link"]?> target="_blank"><?= "livecampus_shortly/r.php?r=".$l["short_link"]?></a></td>
                            <td><?= $l["click_count"]?></td>
                            <td>
                                <input type="checkbox" id="<?= $l["id"] ?>" <?php if($l["publish"]) echo "checked"?> onClick="fetch('../inc/functions/publishLink.php?id=<?= $l["id"] ?>', { method : 'POST'}).then(location.reload())"/><label for="<?= $l["id"] ?>"></label>
                            </td>
                            <td><a class="delete" href="../inc/functions/DeleteLink.php?id=<?= $l["id"] ?>"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <!-- End Table -->

    </div>