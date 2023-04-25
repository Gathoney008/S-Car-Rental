<?php
if(isset($_POST['updatecar']) && isset($_POST['carid'])) {
    require_once('connection.php');
    $carid = mysqli_real_escape_string($con, $_POST['carid']);
    $query = "SELECT * FROM cars WHERE CAR_ID = '$carid'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $img_name = $row['CAR_IMG'];
        $available = $row['AVAILABLE'];
        if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $img_name= $_FILES['image']['name'];
            $tmp_name= $_FILES['image']['tmp_name'];
            $error= $_FILES['image']['error'];
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg","jpeg","png","webp","svg", "jfif");
            if(in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'photos/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                unlink('photos/'.$row['CAR_IMG']);
                $img_name = $new_img_name;
            }
            else {
                echo '<script>alert("Cant upload this type of image")</script>';
                echo '<script> window.location.href = "companyupdatecar.php?carid='.$carid.'";</script>';   
            }
        }
        $carname = mysqli_real_escape_string($con, $_POST['carname']);
        $ftype = mysqli_real_escape_string($con, $_POST['ftype']);
        $capacity = mysqli_real_escape_string($con, $_POST['capacity']);
        $price = mysqli_real_escape_string($con, $_POST['price']);
        $cname = mysqli_real_escape_string($con, $_POST['cname']);
        $query = "UPDATE cars SET CAR_NAME = '$carname', FUEL_TYPE = '$ftype', CAPACITY = $capacity, PRICE = $price, CAR_IMG = '$img_name', cname = '$cname' WHERE CAR_ID = $carid";
        $res = mysqli_query($con, $query);
        if($res) {
            echo '<script>alert("Car details updated successfully!!")</script>';
            echo '<script> window.location.href = "companydash.php";</script>';
        }
        else {
            echo '<script>alert("Failed to update car details. Please try again later.")</script>';
            echo '<script> window.location.href = "companyupdatecar.php?carid='.$carid.'";</script>';
        }
    }
    else {
        echo '<script>alert("Car not found.")</script>';
        echo '<script> window.location.href = "companydash.php";</script>';
    }
}
else {
    echo "false";
}
?>
