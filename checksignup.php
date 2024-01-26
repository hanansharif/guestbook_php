<?php
    session_start();
    $_SESSION['valid']="NO";
    $user_name = $_POST["nm"];
    $user_email= $_POST["mail"];
    $user_password= $_POST["pswd"];
    require_once("connection.php");
    $sql = "SELECT * FROM users where user_email ='$user_email' AND user_password='$user_password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1){
        $_SESSION['valid']="YES";
        header("Location:signin.php?acc=1");
    	exit();
    }
    else{
        // header("Location:error.php");
        $sql = "INSERT INTO users (user_email, user_name, user_password) VALUES ('$user_email', '$user_name', '$user_password')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['valid']="YES";
            $targetFile = 'comments.php';
    
            // Create a hidden form and submit it via JavaScript
            echo '<form action="' . $targetFile . '" method="post" id="redirectForm">';
            echo '<input type="hidden" name="user_email" value="' . $user_email . '">';
            echo '<input type="hidden" name="user_name" value="' . $user_name . '">';
            echo '</form>';
            echo '<script>document.getElementById("redirectForm").submit();</script>';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        exit();
    } 
?>