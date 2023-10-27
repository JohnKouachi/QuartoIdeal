<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/styleLogIn.css" rel="stylesheet" />
  <title>Register</title>
</head>
<body>

    <header>
        <nav>
          <ul>
          <li><a href="index.php">Home helloooooo</a></li>
            <li style="float:right"><a href="Register.php">Register</a></li>
            <li style="float:right"><a href="logIn.php">Login</a></li>
          </ul>
        </nav>
    </header>

  <h1>Register</h1>

  <form action="DB/db_register.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="userType">User Type:</label>
<select id="userType" name="role" required>
  <option value="admin">Admin</option>
  <option value="client">Client</option>
  <option value="worker">Worker</option>
</select>


    <input type="submit" value="Register">
  </form>

  <footer>
    <p>&copy; 2023 Hotel Room Reservation System. All rights reserved.</p>
  </footer>
</body>
</html>
