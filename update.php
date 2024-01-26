<?php
    session_start();
    require_once("connection.php");
    echo "<br><br>";

    // Sample data for update
    $user_id_to_update = $_POST["cmnt_id"];
    $user_email = isset($_POST["mail"]) ? $_POST["mail"] : null;
    $user_name = isset($_POST["name"]) ? $_POST["name"] : null;
    $comment = isset($_POST["cmnt"]) ? $_POST["cmnt"] : null;
    $Date = isset($_POST["dt"]) ? $_POST["dt"] : null;

    // session_start();

    // Check if $mail and $name are not received
    if ($user_email === null || $user_name === null) {
        header("Location:signin.php?acc=2");
        exit();
    }
    
    if ($_SESSION["valid"] != "YES") {
        header("Location:signin.php?acc=2");
        exit();
    } else {
    

        // Update data in the table
        $sql = "UPDATE cmnts SET cmnt_body='$comment', cmnt_date='$Date'
        WHERE cmnt_id=$user_id_to_update";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            $targetFile = 'comments.php?acc=3';
            // Create a hidden form and submit it via JavaScript
            echo '<form action="' . $targetFile . '" method="post" id="redirectForm">';
            echo '<input type="hidden" name="user_email" value="' . $user_email . '">';
            echo '<input type="hidden" name="user_name" value="' . $user_name . '">';
            echo '</form>';
            echo '<script>document.getElementById("redirectForm").submit();</script>';
            exit();
        } else {
        echo "Error updating record: " . $conn->error;
        }
    }
    $conn->close();
?>