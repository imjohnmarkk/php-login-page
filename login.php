<?php
include_once("./connections.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query to check if the user exists
    $sql = "SELECT * FROM mytbl WHERE username = '$username'";
    $result = $conn->query($sql);

    // Check if a row with the given username exists
    if ($result->num_rows > 0) {
        // User exists, fetch the user data
        $row = $result->fetch_assoc();
        // Check if the password matches the username
        if ($row['password'] == $password) {
            // Password is correct, authentication successful
            $account_type = $row['account_type'];
            // Redirect user based on account type
            if ($account_type == 'admin') {
                // Redirect admin to admin dashboard
                header("Location: admin");
                exit();
            } else {
                // Redirect regular user to user dashboard
                header("Location: user");
                exit();
            }
        } else {
            // Password is incorrect, set error message
            session_start();
            $_SESSION['error'] = "Invalid password";
        }
    } else {
        // Username does not exist, set error message
        session_start();
        $_SESSION['error'] = "Invalid username";
    }
    // Redirect back to index.php after setting error message
    header("Location: index.php");
    exit();
}
