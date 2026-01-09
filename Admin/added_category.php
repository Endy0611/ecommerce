<?php
$folder = "../images/";

$name = isset($_POST['txtname']) ? trim($_POST['txtname']) : '';
$status = isset($_POST['txtstatus']) ? $_POST['txtstatus'] : 'active';

$img = '';

if (isset($_FILES['files']) && isset($_FILES['files']['name']) && $_FILES['files']['error'] === UPLOAD_ERR_OK) {
    $img = $_FILES['files']['name'];
    $tmp = $_FILES['files']['tmp_name'];
    
    // Create folder if it doesn't exist
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }
    
    move_uploaded_file($tmp, $folder . $img);
}

include_once('../config.php');

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO `tblcategory`(`cat_name`, `cat_img`, `status`) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $img, $status);

if ($stmt->execute()) {
    // Redirect back with success message
    header("Location: add_category.php?success=true");
    exit();
} else {
    die('Could not add category: ' . $conn->error);
}

$stmt->close();
mysqli_close($conn);
?>