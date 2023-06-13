<?php
$userData = file_get_contents(__DIR__ . '/../dataset/users.json');
$users = json_decode($userData, true);

if (isset($_GET['remove_user'])) {
    $userId = $_GET['remove_user'];

    $index = array_search($userId, array_column($users, 'id'));

    if ($index !== false) {
        unset($users[$index]);
    }

    file_put_contents(__DIR__ . '/../dataset/users.json', json_encode($users));

    header('Location: ../partials/main.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>User List</title>
  <!-- Add your stylesheets and scripts here -->
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
              <input type="hidden" name="remove_user" value="<?php echo $user['id']; ?>">
              <button type="submit">Remove</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Add your additional HTML markup and form here -->

  <script>
    // Add your JavaScript code here
  </script>
</body>
</html>
