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
        <?php include 'users_table.php'; ?> <!-- component with existing users -->

    <div class="centerButton">
        <button id="addUserButton" class="addUser" onclick="toggleForm()">Add User</button>
    </div>
        <?php include 'adduser_form.php'; ?> <!-- component with form for adding new users -->
    <script>
    </script>
</body>
</html>
