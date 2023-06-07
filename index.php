<!DOCTYPE html>
<html>

<head>
    <title>User Authentication</title>
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>User Authentication</h1>

        <?php
        if (isset($_GET['action']) && $_GET['action'] === 'signup') {
            // Show the Sign Up form
            echo '
            <h2>Sign Up</h2>
            <form action="signup.php" method="post">
                <input type="text" name="signup_username" placeholder="Username" required><br><br>
                <input type="password" name="signup_password" placeholder="Password" required><br><br>
                <input type="submit" value="Sign Up">
            </form>
            <p>Already have an account? <a href="index.php">Sign In</a></p>
            ';
        } else {
            // Show the Sign In form
            echo '
            <h2>Sign In</h2>
            <form action="signin.php" method="post">
                <input type="text" name="signin_username" placeholder="Username" required><br><br>
                <input type="password" name="signin_password" placeholder="Password" required><br><br>
                <input type="submit" value="Sign In">
            </form>
            <p>Don\'t have an account? <a href="index.php?action=signup">Sign Up</a></p>
            ';
        }
        ?>

    </div>
</body>

</html>