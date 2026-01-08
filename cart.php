<?php
require_once 'config.php';

// Handle cart actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
        
        if ($action === 'update' && isset($_POST['quantity'])) {
            $quantity = intval($_POST['quantity']);
            if ($quantity > 0 && isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity'] = $quantity;
            }
        } elseif ($action === 'remove' && isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
        } elseif ($action === 'clear') {
            $_SESSION['cart'] = array();
        }
        
        header('Location: cart.php');
        exit;
    }
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$cartCount = count($cart);
$subtotal = 0;

foreach ($cart as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}

$tax = $subtotal * 0.10; // 10% tax
$total = $subtotal + $tax;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Amazone Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    :root {
        --primary-color: #4169E1;
        --secondary-color: #FF6B35;
        --dark-color: #1a1a1a;
        --light-bg: #f8f9fa;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: var(--light-bg);
    }

    .navbar {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 1rem 0;
        background: white;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 24px;
        font-weight: bold;
        color: var(--dark-color);
        text-decoration: none;
    }

    .logo-icon {
        background: var(--dark-color);
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cart-container {
        background: white;
        border-radius: 15px;
        padding: 30px;
        margin-top: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .cart-header {
        border-bottom: 2px solid var(--light-bg);
        padding-bottom: 20px;
        margin-bottom: 30px;
    }

    .cart-item {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 20px;
        border-bottom: 1px solid var(--light-bg);
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .item-image {
        width: 100px;
        height: 100px;
        background: var(--light-bg);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
    }

    .item-details {
        flex: 1;
    }

    .item-name {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .item-price {
        color: var(--primary-color);
        font-size: 20px;
        font-weight: bold;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .qty-btn {
        background: var(--light-bg);
        border: none;
        width: 35px;
        height: 35px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: bold;
        transition: all 0.3s;
    }

    .qty-btn:hover {
        background: var(--primary-color);
        color: white;
    }

    .qty-input {
        width: 60px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 8px;
    }

    .remove-btn {
        background: #EF4444;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .remove-btn:hover {
        background: #DC2626;
    }

    .cart-summary {
        background: var(--light-bg);
        border-radius: 15px;
        padding: 30px;
        position: sticky;
        top: 100px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-size: 16px;
    }

    .summary-total {
        border-top: 2px solid #ddd;
        padding-top: 15px;
        margin-top: 15px;
        font-size: 24px;
        font-weight: bold;
        color: var(--primary-color);
    }

    .btn-checkout {
        width: 100%;
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 15px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 18px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-checkout:hover {
        background: #3557c7;
        transform: translateY(-2px);
    }

    .empty-cart {
        text-align: center;
        padding: 80px 20px;
    }

    .empty-cart i {
        font-size: 80px;
        color: #ddd;
        margin-bottom: 20px;
    }

    .empty-cart h3 {
        color: #666;
        margin-bottom: 20px;
    }

    .btn-continue {
        background: var(--primary-color);
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
    }

    .btn-continue:hover {
        background: #3557c7;
        color: white;
    }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a href="index.php" class="logo">
                <div class="logo-icon">A</div>
                <span>Store</span>
            </a>
        </div>
    </nav>

    <div class="container mb-5">
        <?php if ($cartCount > 0): ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-container">
                    <div class="cart-header">
                        <h2><i class="bi bi-cart3 me-2"></i>Shopping Cart (<?php echo $cartCount; ?> items)</h2>
                    </div>

                    <?php foreach ($cart as $product_id => $item): ?>
                    <div class="cart-item">
                        <div class="item-image">📦</div>
                        <div class="item-details">
                            <div class="item-name"><?php echo htmlspecialchars($item['pro_name']); ?></div>
                            <div class="item-price">$<?php echo number_format($item['price'], 2); ?></div>
                        </div>
                        <div class="quantity-controls">
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                <button type="button" class="qty-btn"
                                    onclick="updateQuantity(<?php echo $product_id; ?>, <?php echo $item['quantity'] - 1; ?>)">-</button>
                                <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1"
                                    max="99" class="qty-input" readonly>
                                <button type="button" class="qty-btn"
                                    onclick="updateQuantity(<?php echo $product_id; ?>, <?php echo $item['quantity'] + 1; ?>)">+</button>
                            </form>
                        </div>
                        <div>
                            <strong>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></strong>
                        </div>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="action" value="remove">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <button type="submit" class="remove-btn">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                    <?php endforeach; ?>

                    <div class="mt-4">
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="action" value="clear">
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="bi bi-trash me-2"></i>Clear Cart
                            </button>
                        </form>
                        <a href="index.php" class="btn btn-outline-primary ms-2">
                            <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="cart-summary">
                    <h4 class="mb-4">Order Summary</h4>
                    <div class="summary-row">
                        <span>Subtotal:</span>
                        <span>$<?php echo number_format($subtotal, 2); ?></span>
                    </div>
                    <div class="summary-row">
                        <span>Tax (10%):</span>
                        <span>$<?php echo number_format($tax, 2); ?></span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping:</span>
                        <span class="text-success">FREE</span>
                    </div>
                    <div class="summary-row summary-total">
                        <span>Total:</span>
                        <span>$<?php echo number_format($total, 2); ?></span>
                    </div>
                    <button class="btn-checkout mt-4">
                        <i class="bi bi-lock me-2"></i>Proceed to Checkout
                    </button>
                    <div class="text-center mt-3">
                        <small class="text-muted">
                            <i class="bi bi-shield-check me-1"></i>Secure Checkout
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="cart-container">
            <div class="empty-cart">
                <i class="bi bi-cart-x"></i>
                <h3>Your Cart is Empty</h3>
                <p class="text-muted mb-4">Add some products to get started!</p>
                <a href="index.php" class="btn-continue">
                    <i class="bi bi-arrow-left me-2"></i>Start Shopping
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function updateQuantity(productId, quantity) {
        if (quantity < 1) return;

        const form = document.createElement('form');
        form.method = 'POST';
        form.innerHTML = `
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="product_id" value="${productId}">
            <input type="hidden" name="quantity" value="${quantity}">
        `;
        document.body.appendChild(form);
        form.submit();
    }
    </script>
</body>

</html>