<?php
require_once('connection.php');
$carid = $_GET['id'];

if (isset($_POST['delete'])) {
    $sql = "DELETE from cars where CAR_ID=$carid";
    $result = mysqli_query($con, $sql);
    echo '<script>alert("CAR DELETED SUCCESSFULLY")</script>';
    echo '<script> window.location.href = "admindash.php";</script>';
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Car</title>
</head>
<body>
    <h2>Are you sure you want to delete this car?</h2>
    <form method="post">
        <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this car?')">Delete Car</button>
    </form>
</body>
</html>
