<?php
session_start();
header('Content-Type: application/json');

// Get POST data
$product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
$product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
$price = isset($_POST['price']) ? floatval($_POST['price']) : 0;

if($product_id <= 0 || empty($product_name) || $price <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid product data']);
    exit;
}

// Initialize cart if not exists
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if product already in cart
$found = false;
foreach($_SESSION['cart'] as &$item) {
    if($item['id'] == $product_id) {
        $item['quantity']++;
        $found = true;
        break;
    }
}

// Add new product to cart
if(!$found) {
    // Fetch additional product info from database
    include_once 'config.php';
    
    $sql = "SELECT img, size, point FROM tblproduct WHERE pro_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        
        $_SESSION['cart'][] = [
            'id' => $product_id,
            'name' => $product_name,
            'price' => $price,
            'quantity' => 1,
            'image' => $product['img'],
            'size' => $product['size'],
            'point' => $product['point']
        ];
    } else {
        // If product not found in DB, add with basic info
        $_SESSION['cart'][] = [
            'id' => $product_id,
            'name' => $product_name,
            'price' => $price,
            'quantity' => 1,
            'image' => '',
            'size' => '',
            'point' => 0
        ];
    }
    
    $stmt->close();
    $conn->close();
}

echo json_encode([
    'success' => true,
    'message' => 'Product added to cart',
    'cartCount' => count($_SESSION['cart'])
]);
?>