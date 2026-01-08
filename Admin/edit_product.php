<?php
include_once '../config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // Fetch product data
    $sql = "SELECT * FROM tblproduct WHERE pro_id = $id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
    
    // Display form with product data for editing
}
?>