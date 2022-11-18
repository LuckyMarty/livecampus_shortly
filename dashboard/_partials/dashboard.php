
    <div class="dashboard">
        <h1>👋 <?= $data['h1'] ?></h1>

        <!-- Add URL -->
        <form class="add-link" method="post">
            <div class="group">
                <label class="input">
                    <input placeholder=" " type="url" required>
                    <span>Enter your URL</span>
                </label>

                <input class="submit" type="submit" value="Add">
            </div>
        </form>
        <!-- End Add URL -->


        <!-- Quick Views -->
        <div class="cards-top">
            <div><span><i class="fa-solid fa-list-ol"></i></span>
                <!-- ****** THOMAS ****** -->
                <p>Total links : 18</p>
            </div>
            <div><span><i class="fa-solid fa-link-slash"></i></span>
                <!-- ****** THOMAS ****** -->
                <p>Unpublished links : 12</p>
            </div>
            <div><span><i class="fa-solid fa-link"></i></span>
                <!-- ****** THOMAS ****** -->
                <p>Published links : 6</p>
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
                    <?php for ($id = 1; $id <= 18; $id++) : ?>
                        <tr>
                            <td><?= $id ?></td>
                            <td><a href="https://google.com/zkejkrjolnsxixuuxwiwppzlkxnwnxytfezygbeoirhuzehrtuilzehrtjhzlekjrth" target="_blank" rel="noopener noreferrer">https://google.com/zkejkrjolnsxixuuxwiwppzlkxnwnxytfezygbeoirhuzehrtuilzehrtjhzlekjrth</a></td>
                            <td><a href="https://short.ly/?l=lEiqdAprK" target="_blank">https://short.ly/?l=lEiqdAprK</a></td>
                            <td>9</td>
                            <td>
                                <input type="checkbox" id="url-<?= $id ?>" checked="checked" /><label for="url-<?= $id ?>"></label>
                            </td>
                            <td><a class="delete" href="delete?id=<?= $id ?>"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    <?php endfor; ?>

                </tbody>
            </table>
        </div>
        <!-- End Table -->

    </div>