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

<?php include 'views/page.php'; ?>
