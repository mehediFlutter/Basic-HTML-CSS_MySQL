<?php
// Include the database connection
require('db.php');

if (isset($_POST['submit'])) {
    // Collect and sanitize the input data to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    // Validate the inputs
    if ($password !== $confirmPassword) {
        echo "Passwords do not match!";
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert the data into the registration table
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

        if (mysqli_query($conn, $sql)) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-form">
        <form action="#" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

             
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
          
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
           
            <button type="submit" name="submit">Registration</button>
        </form>
    </div>
</body>
</html>