<div class="admin">
    <h1>All users</h1>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                <!-- ****** CHARLES ****** -->
                <!-- TODO: Liste de tous les utilisateurs (en tant qu'ADMIN) -->
                <?php for ($users = 1; $users <= 18; $users++) : ?>
                    <tr>
                        <td>HelloWorld</td>
                        <td>Hello</td>
                        <td>Word</td>
                        <td>hello.world@www.org</td>
                    </tr>
                <?php endfor ?>

            </tbody>
        </table>
    </div>
</div>