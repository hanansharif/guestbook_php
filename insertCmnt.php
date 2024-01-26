<?php
    $user_email = isset($_POST["mail"]) ? $_POST["mail"] : null;
    $user_name = isset($_POST["name"]) ? $_POST["name"] : null;
    $comment = isset($_POST["cmnt"]) ? $_POST["cmnt"] : null;
    $Date = isset($_POST["dt"]) ? $_POST["dt"] : null;

    session_start();

// Check if $mail and $name are not received
if ($user_email === null || $user_name === null) {
    header("Location:signin.php?acc=2");
    exit();
}

if ($_SESSION["valid"] != "YES") {
    header("Location:signin.php?acc=2");
    exit();
} else {

    require_once("connection.php");
    echo "Received data:\n";
    print_r($_POST);

    // Select data from the table
    $sql = "INSERT INTO cmnts (user_email, user_name, cmnt_body, cmnt_date) VALUES ('$user_email', '$user_name', '$comment', '$Date')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
        $targetFile = 'comments.php?acc=1';
    
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
}
    $conn->close();
?>
