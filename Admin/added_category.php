<?php
$folder = "../images/";

$name  = isset($_POST['txtname'])  ? $_POST['txtname']  : '';
$status = isset($_POST['txtstatus'])  ? $_POST['txtstatus']  : '';

$img = '';

if (isset($_FILES['files']) && isset($_FILES['files']['name']) && $_FILES['files']['error'] === UPLOAD_ERR_OK) {
    $img = $_FILES['files']['name'];
    $tmp = $_FILES['files']['tmp_name'];
    move_uploaded_file($tmp, $folder . $img);
}

include_once('../config.php');

$sql = "INSERT INTO `tblcategory`(`cat_id`, `cat_name`, `cat_img`, `status`)
        VALUES (NULL, '$name', '$img', '')";

$retval = mysqli_query($conn, $sql);
if (!$retval) {
    die('could not add:' . mysqli_error($conn));
}

echo "Added data successfully\n";
mysqli_close($conn);
?>