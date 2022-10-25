<?php
include_once("./header.php");
$read_query = "SELECT * FROM `user_data`";
$read = $connet->query($read_query);

if ($read->num_rows >= 0) {
?>
<div class="container">
    <div class="row">
        <div class="text-center text-primary my-2">
            <h2>Registered account</h2>
        </div>
        <table class="table table-hover border">
            <thead class="table-primary">
                <tr>
                    <th scope="col" class="align-middle">Register ID</th>
                    <th scope="col" class="align-middle">Name</th>
                    <th scope="col" class="align-middle">Email</th>
                    <th scope="col" class="align-middle">Password</th>
                    <th scope="col" class="align-middle">Gender</th>
                    <th scope="col" class="align-middle">City</th>
                    <th scope="col" class="align-middle">Date Of Birth</th>
                    <th scope="col" class="align-middle">Action</th>
                </tr>
            </thead>
            <?php
while ($data = $read->fetch_assoc()) {
    ?>
            <tbody class="">
                <tr class="">
                    <td class="align-middle"><?= $data['id'] ?></td>
                    <td class="align-middle"><?= $data['name'] ?></td>
                    <td class="align-middle"><?= $data['email'] ?></td>
                    <td class="align-middle"><?= $data['password'] ?></td>
                    <td class="align-middle"><?= $data['gender'] ?></td>
                    <td class="align-middle"><?= $data['city'] ?></td>
                    <td class="align-middle"><?= $data['date_of_birth'] ?></td>
                    <td class="align-middle">
                        <a href="./edit.php?id=<?= $data['id'] ?>" style="text-decoration: none;">
                            <button class="btn btn-dark">Edit</button>
                        </a>
                        <a href="./delete.php?id=<?= $data['id'] ?>" style="text-decoration: none;">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            </tbody>

            <?php
}
?>
        </table>
        <?php 
    include_once("./button.php");
        ?>
    </div>

</div>
<?php
}
?>



<!-- include footer -->
<?php
include_once("./footer.php");
?>