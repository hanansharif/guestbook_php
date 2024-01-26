<?php
    $user_email= isset($_POST["mail"]) ? $_POST["mail"] : null;
    $user_name= isset($_POST["name"]) ? $_POST["name"] : null;
    $cmnt_id= isset($_GET["cmnt_id"]) ? $_GET["cmnt_id"] : null;
    $upd= isset($_GET["upd"]) ? $_GET["upd"] : null;
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
    include 'Navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Form BS</title>
    <style type="text/css">
        .error {
            color: red;
        }
        body {
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 7%
        }
    </style>
</head>
<body>
    <script>
        // // Function to get URL parameters
        // function getParameterByName(name, url) {
        //     if (!url) url = window.location.href;
        //     name = name.replace(/[\[\]]/g, "\\$&");
        //     var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        //         results = regex.exec(url);
        //     if (!results) return null;
        //     if (!results[2]) return '';
        //     return decodeURIComponent(results[2].replace(/\+/g, ' '));
        // }

        // // Check if the 'upd' parameter is present in the URL
        // var upd = getParameterByName('upd');
        if (<?php echo $upd ?>) {
            // If 'upd' is present, modify the form action
            document.addEventListener("DOMContentLoaded", function () {
                var form = document.querySelector("form");
                form.action = "update.php"; // Change this to the desired action
                document.getElementById("header").innerHTML="Update Comment";
                document.getElementById("sbmt").innerHTML="Update";
            });
        }
    </script>
    <main>
    <form class="row needs-validation m-0 p-0" action="insertCmnt.php" method="post">
        <input type="hidden" name="mail" value="<?php echo $user_email ?>">
        <input type="hidden" name="name" value="<?php echo $user_name ?>">
        <input type="hidden" name="cmnt_id" value="<?php echo htmlspecialchars($cmnt_id); ?>">
        <div class="col-md-12">
            <h1 id="header" style="text-align: center">Add New Comments</h1>
            <label for="cmnt" class="form-label">Comments</label>
            <textarea class="form-control" id="cmnt" name="cmnt" rows="5" required style="width: 100%;"></textarea>
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="dt" required>
        </div>
        <div class="col-12 d-flex justify-content-end mt-3">
            <button id="sbmt" class="btn btn-primary" type="submit">Add</button>
        </div>
    </form>
    </main>
    <form id="commentsForm" action='addCmnts.php' method='post'>
        <input type='hidden' name='mail' value='<?php echo $user_email; ?>'>
        <input type='hidden' name='name' value='<?php echo $user_name; ?>'>
    </form>   
    <form id="AddForm" action="comments.php" method="post">
        <input type='hidden' name='user_email' value='<?php echo $user_email; ?>'>
        <input type='hidden' name='user_name' value='<?php echo $user_name; ?>'>
    </form>
    <script>
        document.getElementById('redirectToAddPage').addEventListener('click', function(event) {
            event.preventDefault();
            // Submit the form when the link is clicked
            document.getElementById('commentsForm').submit();
        });
        document.getElementById('redirectToCmntPage').addEventListener('click', function(event) {
            event.preventDefault();
            // Submit the form when the link is clicked
            document.getElementById('AddForm').submit();
        });
    </script>
</body>
</html>

<?php
}
?>
