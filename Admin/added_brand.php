<?php
include_once '../config.php';

if (isset($_POST['btnadd'])) {
    
    // Get form data
    $brand_name = $_POST['txtname'];
    $category_id = $_POST['txtcategory'];  // Category ID from dropdown
    $status = $_POST['txtstatus'];
    
    // Handle file upload
    $target_dir = "../images/";
    $image_name = basename($_FILES["files"]["name"]);
    $target_file = $target_dir . $image_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is actual image
    $check = getimagesize($_FILES["files"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.'); window.history.back();</script>";
        $uploadOk = 0;
        exit;
    }
    
    // Check file size (5MB max)
    if ($_FILES["files"]["size"] > 5000000) {
        echo "<script>alert('Sorry, your file is too large. Max 5MB allowed.'); window.history.back();</script>";
        $uploadOk = 0;
        exit;
    }
    
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); window.history.back();</script>";
        $uploadOk = 0;
        exit;
    }
    
    // If everything is ok, try to upload file
    if ($uploadOk == 1) {
        // Generate unique filename to avoid overwriting
        $new_image_name = time() . '_' . $image_name;
        $target_file = $target_dir . $new_image_name;
        
        if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
            
            // Insert into database
            $sql = "INSERT INTO tblbrand (brand_name, brand_img, cat_id, status) 
                    VALUES (?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssis", $brand_name, $new_image_name, $category_id, $status);
            
            if ($stmt->execute()) {
                echo "<script>
                    alert('Brand added successfully!');
                    window.location.href='brands.php';
                </script>";
            } else {
                echo "<script>
                    alert('Error: " . $conn->error . "');
                    window.history.back();
                </script>";
            }
            
            $stmt->close();
            
        } else {
            echo "<script>
                alert('Sorry, there was an error uploading your file.');
                window.history.back();
            </script>";
        }
    }
    
    $conn->close();
}
?>