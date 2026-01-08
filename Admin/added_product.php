<?php
$folder = "../images/";

$name  = isset($_POST['txtname']) ? $_POST['txtname'] : '';
$size  = isset($_POST['txtsize']) ? $_POST['txtsize'] : '';
$price = isset($_POST['txtprice']) ? $_POST['txtprice'] : '';
$point = isset($_POST['txtpoint']) ? $_POST['txtpoint'] : '';

$img = '';
if (isset($_FILES['files']) && $_FILES['files']['error'] == 0) {
    $img = $_FILES['files']['name'];
    move_uploaded_file($_FILES['files']['tmp_name'], $folder . $img);
}

include_once('../config.php');

$sql = "INSERT INTO tblproduct 
(pro_id, Pro_name, img, size, price, point)
VALUES (NULL, '$name', '$img', '$size', '$price', '$point')";

$retval = mysqli_query($conn, $sql);

if (!$retval) {
    die('could not add: ' . mysqli_error($conn));
}

echo "Add Menu Successfully";

mysqli_close($conn);
?>