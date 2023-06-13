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
    <div class="centerButton">
        <button id="addUserButton" class="addUser" onclick="toggleForm()">Add User</button>
    </div>
    <form id="userForm" action="../partials/main.php" method="POST" hidden>
        <div class="inputform">
            <div class="userInput" >
                <input type="text" id="name" placeholder="Name" name="name" required><br>
                <input type="text" id="username" placeholder="Username" name="username" required><br>
                <input type="email" id="email" placeholder="Email" name="email" required><br>
                <input type="text" id="street" placeholder="Street" name="street" required><br>
                <input type="text" id="suite" placeholder="Suite" name="suite" required><br>
                <input type="text" id="city" placeholder="City" name="city" required><br>
            </div>
            <div class="userInput" >
                <input type="text" id="zipcode" placeholder="Zipcode" name="zipcode" required><br>
                <input type="text" id="phone" placeholder="Phone" name="phone" required><br>
                <input type="text" id="website" placeholder="Website" name="website" required><br>
                <input type="text" id="company_name" placeholder="Company Name" name="company_name" required><br>
                <input type="text" id="catch_phrase" placeholder="Catch Phrase" name="catch_phrase" required><br>
                <input type="text" id="bs" name="bs" placeholder="BS" required><br>
            </div>
        </div>
        <div class="centerButton">
            <button type="submit" class="submitForm">Add User</button>
        </div>
    </form>
    <script>
    </script>
</body>
</html>
