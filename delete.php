<?php
    session_start();
    require_once("connection.php");
    // session_start();
    
    $mail = isset($_POST["mail"]) ? $_POST["mail"] : null;
    $name = isset($_POST["name"]) ? $_POST["name"] : null;
    $cmnt_id_to_delete = isset($_GET["cmnt_id"]) ? $_GET["cmnt_id"] : null;

    // Check if $mail and $name are not received
    if ($mail === null || $name === null || $cmnt_id_to_delete == null) {
        header("Location:signin.php?acc=2");
        exit();
    }

    if ($_SESSION["valid"] != "YES") {
        header("Location:signin.php?acc=2");
        exit();
    } else {
    // Delete data from the table
    $sql = "DELETE FROM cmnts WHERE cmnt_id = $cmnt_id_to_delete";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        $targetFile = 'comments.php?acc=2';
        // Create a hidden form and submit it via JavaScript
        echo '<form action="' . $targetFile . '" method="post" id="redirectForm">';
        echo '<input type="hidden" name="user_email" value="' . $mail . '">';
        echo '<input type="hidden" name="user_name" value="' . $name . '">';
        echo '</form>';
        echo '<script>document.getElementById("redirectForm").submit();</script>';
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    }
    $conn->close();
?>