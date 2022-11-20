<?php
require_once("../inc/functions/data.php");
$users = userList();
?>
<div class="admin">
    <h1>All users</h1>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                <!-- ****** CHARLES ****** -->
                <!-- TODO: Liste de tous les utilisateurs (en tant qu'ADMIN) -->
                <?php foreach($users as $user) : ?>
                    <tr>
                        <td><?=$user["firstname"] ?></td>
                        <td><?=$user["lastname"] ?></td>
                        <td><?=$user["email"] ?></td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>
</div>