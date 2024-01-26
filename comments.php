<?php
$mail = isset($_POST["user_email"]) ? $_POST["user_email"] : null;
$name = isset($_POST["user_name"]) ? $_POST["user_name"] : null;
$add = isset($_GET["acc"]) ? $_GET["acc"] : null;
session_start();

// Check if $mail and $name are not received
if ($mail === null || $name === null) {
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
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <title>Guest Book</title>
        <style type="text/css">
            body {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                margin: 0;
                margin-bottom: 0px
            }

            main {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 50px;
                margin-bottom: 0px
            }
        </style>
    </head>

    <body>
    <?php
        // Check if $account is set and not empty
        if ($add !== null && $add !== "") {
            if($add == 1)
            {
                // Display a Bootstrap alert
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Comment Added Successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            else if ($add == 2)
            {
                // Display a Bootstrap alert
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Comment Deleted Successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }  
            else if ($add == 3)
            {
                // Display a Bootstrap alert
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Comment Updated Successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }            
        }
    ?>
        <main>
            <div class="col-6 d-flex justify-content-end mt-3 me-5 mb-0">
            <form id="commentsForm" action='addCmnts.php' method='post'>
                <input type='hidden' name='mail' value='<?php echo $mail; ?>'>
                <input type='hidden' name='name' value='<?php echo $name; ?>'>
            <button type='submit' class='btn btn-primary px-5 py-3 rounded-4'><b>Add Comments</b></button>
            </form>            
            </div>
            <div class="col-6 d-flex justify-content-start mt-3 ms-5 mb-0">
                <button id="viewCommentsBtn" class="btn btn-primary px-5 py-3 rounded-4"><b>View Comments</b></button>
            </div>
        </main>
        <div id="commentsContainer"></div>
        
        <form id="AddForm" action="comments.php" method="post">
            <input type='hidden' name='user_email' value='<?php echo $mail; ?>'>
            <input type='hidden' name='user_name' value='<?php echo $name; ?>'>
        </form>

        <script>
            // Use JavaScript to handle the button click
            document.getElementById('viewCommentsBtn').addEventListener('click', function() {
                // AJAX request to fetch PHP content
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Display the fetched content in the commentsContainer
                        document.getElementById('commentsContainer').innerHTML = xhr.responseText;
                    }
                };
                // Add the following lines to include $mail and $name as POST parameters
                var formData = new FormData();
                formData.append('user_email', '<?php echo $mail; ?>');
                formData.append('user_name', '<?php echo $name; ?>');
                xhr.open('POST', 'viewCmnts.php', true);
                xhr.send(formData);
                // xhr.open('GET', 'viewCmnts.php', true);
                // xhr.send();
            });
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
