<?php
include_once '../config.php';

if (isset($_POST['btnadd'])) {
    
    // Get form data
    $product_name = $_POST['txtname'];
    $brand_id = $_POST['txtbrand'];  // Brand ID from dropdown
    $size = $_POST['txtsize'];
    $price = $_POST['txtprice'];
    
    // Auto-calculate points if empty (price / 10)
    $point = isset($_POST['txtpoint']) && $_POST['txtpoint'] != '' ? $_POST['txtpoint'] : round($price / 10);
    
    // Handle file upload
    $target_dir = "../images/";
    $image_name = basename($_FILES["files"]["name"]);
    $target_file = $target_dir . $image_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is actual image
    if (isset($_FILES["files"]) && $_FILES["files"]["error"] == 0) {
        $check = getimagesize($_FILES["files"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<script>alert('File is not an image.'); window.history.back();</script>";
            exit;
        }
        
        // Check file size (5MB max)
        if ($_FILES["files"]["size"] > 5000000) {
            echo "<script>alert('Sorry, your file is too large. Max 5MB allowed.'); window.history.back();</script>";
            exit;
        }
        
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); window.history.back();</script>";
            exit;
        }
        
        // If everything is ok, try to upload file
        if ($uploadOk == 1) {
            // Generate unique filename to avoid overwriting
            $new_image_name = time() . '_' . $image_name;
            $target_file = $target_dir . $new_image_name;
            
            if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
                
                // Insert into database with prepared statement (SECURE)
                $sql = "INSERT INTO tblproduct (pro_name, img, size, price, point, brand_id) 
                        VALUES (?, ?, ?, ?, ?, ?)";
                
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssdii", $product_name, $new_image_name, $size, $price, $point, $brand_id);
                
                if ($stmt->execute()) {
                    echo "<script>
                        alert('Product added successfully!');
                        window.location.href='products.php';
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
    } else {
        echo "<script>
            alert('Please select an image file.');
            window.history.back();
        </script>";
    }
    
    $conn->close();
} else {
    echo "<script>
        alert('Invalid request!');
        window.location.href='add_product.php';
    </script>";
}
?>