<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr class='userRow'>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['address']['street']; ?>, <?php echo $user['address']['zipcode']; ?> <?php echo $user['address']['city']; ?></td>
                <td><?php echo $user['phone']; ?></td>
                <td><?php echo $user['company']['name']; ?></td>
                <td>
                    <form action="../partials/main.php" method="GET">
                        <button type="submit" class="removeUser" name="remove_user" value="<?php echo $user['id']; ?>">Remove</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
