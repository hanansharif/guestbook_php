<?php
    session_start();
    $_SESSION['valid']="NO";
    $user_email= $_POST["mail"];
    $user_password= $_POST["pswd"];
    require_once("connection.php");
    $sql = "SELECT * FROM users where user_email ='$user_email' AND user_password='$user_password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1){
        $_SESSION['valid']="YES";
        // Send $user_email to comments.php using POST method
        $sql_1 = "SELECT user_name FROM users where user_email ='$user_email'";
        $result_1 = $conn->query($sql_1);
        $row = $result->fetch_assoc();
        $targetFile = 'comments.php';
        // Create a hidden form and submit it via JavaScript
        echo '<form action="' . $targetFile . '" method="post" id="redirectForm">';
        echo '<input type="hidden" name="user_email" value="' . $user_email . '">';
        echo '<input type="hidden" name="user_name" value="' . $row["user_name"] . '">';
        echo '</form>';
        echo '<script>document.getElementById("redirectForm").submit();</script>';
        exit();
    }
    else{
        // header("Location:error.php");
        header("Location:signup.php?acc=1");
        exit();
    } 
?>