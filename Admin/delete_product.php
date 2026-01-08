<?php
include_once '../config.php';

if(isset($_GET['id'])){
    $id = intval($_GET['id']); // Protect against SQL injection
    
    // Get image name before deleting
    $sql = "SELECT img FROM tblproduct WHERE pro_id = $id";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $image = $row['img'];
        
        // Delete from database
        $sql = "DELETE FROM tblproduct WHERE pro_id = $id";
        
        if($conn->query($sql)){
            // Delete image file if exists
            if(file_exists('../images/'.$image)){
                unlink('../images/'.$image);
            }
            
            // Redirect back to product list
            header("Location: index.php?msg=deleted");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>