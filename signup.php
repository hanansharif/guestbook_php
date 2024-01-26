<?php
    $acc = 1;
    include 'Navbar.php';
    $account = isset($_GET["acc"]) ? $_GET["acc"] : null;
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Guest Book</title>
    <style type="text/css">
        .error {
            color: red;
        }
        body {
            min-height: 100vh; /* Ensure at least the height of the viewport */
            display: flex;
            flex-direction: column;
            margin: 0; /* Remove default margin */
        }
        main {
            flex-grow: 1; /* Allow the main content to grow to fill the available space */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px; /* Add padding to the main content */
        }
    </style>
</head>
<body>
    <?php
        // Check if $account is set and not empty
        if ($account !== null && $account !== "") {
            // Display a Bootstrap alert
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    No Account Found! Try Sign Up
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    ?>
    <main>
        <form class="row g-3 needs-validation" action="checksignup.php" method="post">
            <div class="col-md-12">
                <h1 style="text-align: center">Create Account</h1>
                <label for="nm" class="form-label">Name</label>
                <input type="text" class="form-control" id="nm" name="nm" required>
                <label for="login" class="form-label">Email</label>
                <input type="email" class="form-control" id="login" name="mail" required>
                <label for="pswd" class="form-label">Password</label>
                <input type="password" class="form-control" id="pswd" name="pswd" required>
            </div>
            <div class="col-6 d-flex justify-content-start mt-3">
                <a href="signin.php"><input class="btn btn-primary" type="button" value="Already have Account"></a>
            </div>
            <div class="col-6 d-flex justify-content-end mt-3">
                <button class="btn btn-primary" type="submit">Sign Up</button>
            </div>
        </form>
    </main>
</body>
</html>
