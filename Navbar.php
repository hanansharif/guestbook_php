<?php
  $account = isset($acc) ? $acc : null;
  // $account = isset($_GET["acc"]) ? $_GET["acc"] : null;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guest Book</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg bg-dark navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand me-5" href="#">
          <img src="icon.png" alt="Logo" width="35" height="35" class="d-inline-block align-text-top">
          Guest Book
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        if ($account != 1){
          ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link"  id="redirectToCmntPage" href="#">Comments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  id="redirectToAddPage" href="#">Add Comments</a>
            </li>
          </ul>
        </div>
        <a class='navbar-brand' href='logout.php' title='Log Out'><i class='material-icons'>logout</i></a>
        <?php
          } else {
          ?>
          <ul class="navbar-nav mb-2 me-2 mb-lg-0">
          <li class="nav-item dropdown">
          <a class="nav-link p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class='material-icons' style="color:white; font-size: 2rem">account_circle</i></a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class='dropdown-item' href='signin.php'>Sign In</a></li>
            <li><hr class='dropdown-divider'></li>
            <li><a class='dropdown-item' href='signup.php'>Sign Up</a></li>
            </ul></li></ul>
          <?php
          }
        ?>
      </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>