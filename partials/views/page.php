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