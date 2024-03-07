<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="./styles.css"> -->
    <title>Log in</title>
</head>

<body>

    <div class="login-container bg-primary-subtle vh-100 d-flex justify-content-center align-items-center">

        <div class="bg-dark text-white p-5 rounded-5 shadow-lg w-25 h-75 d-flex justify-content-center align-items-center">

            <form action="./login.php" method="post" class="w-100" >
                <div class="welcome">
                    <h1>Log in</h1>

                    <h2>Welcome back!</h2>
                </div>

                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Username:</label>
                    <input type="username" class="form-control" id="username" placeholder="Enter Username" name="username" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                </div>
                <div class="form-check mb-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"> Remember me
                    </label>
                </div>

                <div class="center">
                    <button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
                </div>
                <div id="error-message" class="mt-4">
                    <?php
                    // Check if error message session variable is set and display it
                    if (isset($_SESSION['error'])) {
                        echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
                        // Unset the error message session variable after displaying it
                        unset($_SESSION['error']);
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>

    <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>