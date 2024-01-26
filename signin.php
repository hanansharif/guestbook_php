<?php
$acc = 1;
include 'Navbar.php';
$account = isset($_GET["acc"]) ? $_GET["acc"] : null;
?>

<!DOCTYPE html>
<html lang="en">
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        main {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Add this style to control h1 text wrapping */
        h1 {
            max-width: 100%;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <?php
        // Check if $account is set and not empty
        if ($account !== null && $account !== "") {
            if ($account == 1){
                // Display a Bootstrap alert
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        User againt this email already exist. Try Login
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else if ($account == 2){
                // Display a Bootstrap alert
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Signed Out! &ensp; Sign in Again
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
    ?>
    <main>
        <form class="row g-3 needs-validation" action="checklogin.php" method="post">
            <div class="col-md-12">
                <h1 style="text-align: center">Login to your <br> Account</h1>
                <label for="login" class="form-label">Email</label>
                <input type="email" class="form-control" id="login" name="mail" required>
                <label for="pswd" class="form-label">Password</label>
                <input type="password" class="form-control" id="pswd" name="pswd" required>
            </div>
            <div class="col-6 d-flex justify-content-start mt-3">
                <a href="signup.php"><input class="btn btn-primary" type="button" value="Create Account"></a>
            </div>
            <div class="col-6 d-flex justify-content-end mt-3">
                <button class="btn btn-primary" type="submit">Sign In</button>
            </div>
        </form>
    </main>
</body>
</html>
