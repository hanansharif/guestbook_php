<?php
    session_start();
    require_once("connection.php");
    echo "<br><br>";
    
    $mail = isset($_POST["user_email"]) ? $_POST["user_email"] : null;
    $name = isset($_POST["user_name"]) ? $_POST["user_name"] : null;

    if ($_SESSION["valid"] != "YES") {
    // if ($mail != null) {
        header("Location:signin.php?acc=2");
        exit();
    } else {

    // Select data from the table      WHERE user_email = $mail
    $sql = "SELECT * FROM cmnts WHERE user_email = '$mail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <div class="container"> <!-- Add margin-top class here -->
  <h5 style="text-align: right">Results Found: <?php echo $result->num_rows ?></h5><hr>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Author</th>
      <th colspan="2" scope="col">Comment Body</th>
      <th scope="col">Date</th>
      <th scope="col" style="width: 150px;"></th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
<?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr><th scope='row'>". $row["cmnt_id"]."</th><td>". $row["user_email"]."</td><td>". $row["user_name"];
            echo "</td><td colspan='2'>". $row["cmnt_body"]."</td><td>". $row["cmnt_date"]."</td>";
            echo "<td><form action='addCmnts.php?cmnt_id=".$row["cmnt_id"]."&upd=1' method='post'>";
            echo "<input type='hidden' name='mail' value='".$row["user_email"]."'>";
            echo "<input type='hidden' name='name' value='".$row["user_name"]."'>";
            echo "<button type='submit' class='btn btn-success me-3' style='padding: 0.125rem 0.25rem;'><i class='material-icons'>edit</i></button>";
            echo "<button formaction='delete.php?cmnt_id=".$row["cmnt_id"]."' type='submit' class='btn btn-danger' style='padding: 0.125rem 0.25rem;'><i class='bg-danger material-icons'>close</i></button></form></td></tr>";
        }
?>
         </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php
        } else { echo "0 results"; }
    }
    $conn->close();
?>