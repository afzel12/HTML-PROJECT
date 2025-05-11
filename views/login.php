<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>

<h2>Login</h2>

<form action="../controllers/LoginController.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
    <a href="register.php">dont you haven't an account?</a>
</form>

</body>
</html>
