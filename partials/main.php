<?php
$userData = file_get_contents(__DIR__ . '/../dataset/users.json');
$users = json_decode($userData, true);

if (isset($_GET['remove_user'])) {
    $userId = $_GET['remove_user'];

    foreach ($users as $key => $user) {
        if ($user['id'] == $userId) {
            unset($users[$key]);
            break;
        }
    }

    file_put_contents(__DIR__ . '/../dataset/users.json', json_encode($users));

    header('Location: ../partials/main.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUser = [
        'id' => count($users) + 1, 
        'name' => $_POST['name'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'address' => [
            'street' => $_POST['street'],
            'suite' => $_POST['suite'],
            'city' => $_POST['city'],
            'zipcode' => $_POST['zipcode']
        ],
        'phone' => $_POST['phone'],
        'website' => $_POST['website'],
        'company' => [
            'name' => $_POST['company_name'],
            'catchPhrase' => $_POST['catch_phrase'],
            'bs' => $_POST['bs']
        ]
    ];

    $users[] = $newUser;

    file_put_contents(__DIR__ . '/../dataset/users.json', json_encode($users));

    header('Location: ../partials/main.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
    <script src="../assets/js/script.js"></script>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Company</th>
                <th>Actions</th> <!-- Add a new column for the Remove button -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['address']['street']; ?>, <?php echo $user['address']['zipcode']; ?> <?php echo $user['address']['city']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td><?php echo $user['company']['name']; ?></td>
                    <td>
                        <form action="../partials/main.php" method="GET">
                            <button type="submit" name="remove_user" value="<?php echo $user['id']; ?>">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Add User</h2>
    <form action="../partials/main.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="street">Street:</label>
        <input type="text" id="street" name="street" required><br>

        <label for="suite">Suite:</label>
        <input type="text" id="suite" name="suite" required><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br>

        <label for="zipcode">Zipcode:</label>
        <input type="text" id="zipcode" name="zipcode" required><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br>

        <label for="website">Website:</label>
        <input type="text" id="website" name="website" required><br>

        <label for="company_name">Company Name:</label>
        <input type="text" id="company_name" name="company_name" required><br>

        <label for="catch_phrase">Catch Phrase:</label>
        <input type="text" id="catch_phrase" name="catch_phrase" required><br>

        <label for="bs">BS:</label>
        <input type="text" id="bs" name="bs" required><br>

        <button type="submit">Add User</button>
    </form>
</body>
</html>
