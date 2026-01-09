<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazone - Electronics Store</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
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
    }

    /* Header Styles */
    .navbar {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 1rem 0;
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
        font-weight: bold;
    }

    .cart-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background: var(--secondary-color);
        color: white;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    .nav-icon-btn {
        position: relative;
        background: none;
        border: none;
        font-size: 22px;
        padding: 8px 12px;
        cursor: pointer;
        transition: all 0.3s;
        border-radius: 8px;
    }

    .nav-icon-btn:hover {
        background: var(--light-bg);
    }

    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #E6D5FF 0%, #C5B8E8 100%);
        padding: 60px 0;
        border-radius: 20px;
        margin: 20px 0;
        position: relative;
        overflow: hidden;
    }

    .hero-content h1 {
        font-size: 48px;
        font-weight: bold;
        margin-bottom: 15px;
        line-height: 1.2;
    }

    .hero-content p {
        font-size: 18px;
        color: #666;
        margin-bottom: 30px;
    }

    .btn-primary-custom {
        background: var(--primary-color);
        color: white;
        padding: 15px 40px;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-primary-custom:hover {
        background: #3557c7;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(65, 105, 225, 0.3);
    }

    /* Product Card Styles */
    .product-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        height: 100%;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .product-image-container {
        position: relative;
        padding: 30px;
        background: #f8f9fa;
        text-align: center;
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-image {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .product-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: var(--primary-color);
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .product-badge.sale {
        background: #10B981;
    }

    .product-badge.featured {
        background: #F59E0B;
    }

    .wishlist-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        background: white;
        border: none;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .wishlist-btn:hover {
        background: var(--secondary-color);
        color: white;
        transform: scale(1.1);
    }

    .product-info {
        padding: 20px;
    }

    .product-name {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 8px;
        color: var(--dark-color);
    }

    .product-price {
        font-size: 24px;
        font-weight: bold;
        color: var(--primary-color);
        margin-bottom: 15px;
    }

    .product-rating {
        color: #FFA500;
        margin-bottom: 15px;
    }

    .btn-add-cart {
        width: 100%;
        background: var(--dark-color);
        color: white;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-add-cart:hover {
        background: var(--primary-color);
        transform: translateY(-2px);
    }

    /* Category Cards */
    .category-card {
        padding: 30px;
        border-radius: 15px;
        text-align: center;
        transition: all 0.3s;
        cursor: pointer;
        height: 100%;
    }

    .category-card:hover {
        transform: translateY(-5px);
    }

    .category-icon {
        font-size: 48px;
        margin-bottom: 15px;
    }

    .category-card h4 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .category-card p {
        color: #666;
        font-size: 14px;
    }

    /* Stats Section */
    .stats-section {
        background: linear-gradient(135deg, #FFF5F0 0%, #FFE8E0 100%);
        padding: 60px 0;
        border-radius: 20px;
        margin: 60px 0;
    }

    .stat-item {
        text-align: center;
    }

    .stat-value {
        font-size: 48px;
        font-weight: bold;
        color: var(--primary-color);
        margin-bottom: 5px;
    }

    .stat-label {
        color: #666;
        font-size: 16px;
    }

    /* Section Headers */
    .section-header {
        margin-bottom: 40px;
    }

    .section-title {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .section-subtitle {
        color: #666;
        font-size: 18px;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-state i {
        font-size: 64px;
        color: #ddd;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        color: #666;
        margin-bottom: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 32px;
        }

        .section-title {
            font-size: 28px;
        }

        .product-image-container {
            height: 200px;
        }
    }
    </style>
</head>

<body>
    <!--         <?php
             // Database connection
             include_once 'config.php';

             // Get cart count (from session)
             session_start();
             $cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

             // Fetch products from database
             $sql    = "SELECT * FROM tblproduct ORDER BY pro_id DESC";
             $result = $conn->query($sql);

             // Get product count for stats
         $productCount = $result->num_rows;
         ?> -->

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a href="#" class="logo">
                <div class="logo-icon">A</div>
                <span>Store</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>

                <div class="d-flex gap-2">
                    <button class="nav-icon-btn">
                        <i class="bi bi-search"></i>
                    </button>
                    <button class="nav-icon-btn">
                        <i class="bi bi-heart"></i>
                    </button>
                    <button class="nav-icon-btn" onclick="location.href='cart.php'">
                        <i class="bi bi-cart3"></i>
                        <?php if ($cartCount > 0): ?>
                        <span class="cart-badge"><?php echo $cartCount; ?></span>
                        <?php endif; ?>
                    </button>
                    <button class="nav-icon-btn">
                        <i class="bi bi-person"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content">
                            <h1>5G-Friendly<br>With Face Detection</h1>
                            <p>Get amazing deals & best smartphones on amazing prices</p>
                            <button class="btn btn-primary-custom">
                                <i class="bi bi-bag-fill me-2"></i>Shop Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories Section -->
        <section class="my-5">
            <?php
                $categorySql    = "SELECT * FROM tblcategory LIMIT 4";
                $categoryResult = $conn->query($categorySql);
                $bgColors       = ['bg-primary-subtle', 'bg-warning-subtle', 'bg-danger-subtle', 'bg-secondary-subtle'];
                $colorIndex     = 0;
            ?>

            <div class="row g-4">
                <?php if ($categoryResult && $categoryResult->num_rows > 0): ?>
                <?php while ($cat = $categoryResult->fetch_assoc()): ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 text-center border-0 shadow-sm <?php echo $bgColors[$colorIndex % 4];?>">

                        <div class="card-body">
                            <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle bg-white"
                                style="width:90px;height:90px;">
                                <?php if (! empty($cat['cat_img']) && file_exists('images/' . $cat['cat_img'])): ?>
                                <img src="images/<?php echo htmlspecialchars($cat['cat_img']);?>"
                                    class="img-fluid rounded-circle"
                                    alt="<?php echo htmlspecialchars($cat['cat_name']);?>">
                                <?php else: ?>
                                <span class="fs-2">📦</span>
                                <?php endif; ?>
                            </div>

                            <h5 class="fw-semibold mb-0">
                                <?php echo htmlspecialchars($cat['cat_name']);?>
                            </h5>
                        </div>

                    </div>
                </div>
                <?php $colorIndex++;endwhile; ?>
                <?php else: ?>
                <div class="col-12 text-center text-muted">No categories available</div>
                <?php endif; ?>
            </div>
        </section>


        <!-- Stats Section -->
        <section class="stats-section">
            <div class="container">
                <h2 class="text-center mb-5">At Our Electronic Store, We Merge Tech Innovation<br>With Convenience</h2>
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-value"><?php echo $productCount; ?>+</div>
                            <div class="stat-label">Products</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-value">154</div>
                            <div class="stat-label">Categories</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-value">14M</div>
                            <div class="stat-label">Customers</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-value">82+</div>
                            <div class="stat-label">Countries</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Products Section -->
        <section id="products" class="my-5">
            <div class="section-header text-center">
                <h2 class="section-title">Our Featured Products</h2>
                <p class="section-subtitle">Discover our latest and greatest electronics</p>
            </div>

            <div class="row g-4">
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Generate random badge for demo
                            $badges      = ['HOT', 'SALE', 'FEATURED', null];
                            $randomBadge = $badges[array_rand($badges)];

                            // Generate random rating
                            $rating = rand(3, 5);
                        ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card product-card">
                        <div class="product-image-container">
                            <?php if ($randomBadge): ?>
                            <span class="product-badge<?php echo strtolower($randomBadge); ?>">
                                <?php echo $randomBadge; ?>
                            </span>
                            <?php endif; ?>

                            <button class="wishlist-btn" onclick="toggleWishlist(this)">
                                <i class="bi bi-heart"></i>
                            </button>

                            <?php if (! empty($row['img']) && file_exists('images/' . $row['img'])): ?>
                            <img src="images/<?php echo htmlspecialchars($row['img']); ?>"
                                alt="<?php echo htmlspecialchars($row['pro_name']); ?>" class="product-image">
                            <?php else: ?>
                            <div style="font-size: 80px;">📦</div>
                            <?php endif; ?>
                        </div>

                        <div class="product-info">
                            <h5 class="product-name"><?php echo htmlspecialchars($row['pro_name']); ?></h5>

                            <?php if (! empty($row['size'])): ?>
                            <p class="text-muted small mb-2">
                                <i class="bi bi-tag"></i> Size: <?php echo htmlspecialchars($row['size']); ?>
                            </p>
                            <?php endif; ?>

                            <div class="product-rating">
                                <?php for ($i = 0; $i < $rating; $i++): ?>
                                <i class="bi bi-star-fill"></i>
                                <?php endfor; ?>
                                <?php for ($i = $rating; $i < 5; $i++): ?>
                                <i class="bi bi-star"></i>
                                <?php endfor; ?>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="product-price">$<?php echo number_format($row['price'], 2); ?></div>
                                <?php if (! empty($row['point'])): ?>
                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-award"></i> <?php echo $row['point']; ?> pts
                                </span>
                                <?php endif; ?>
                            </div>

                            <button class="btn-add-cart"
                                onclick="addToCart(<?php echo $row['pro_id']; ?>, '<?php echo htmlspecialchars($row['pro_name']); ?>',<?php echo $row['price']; ?>)">
                                <i class="bi bi-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <?php
                    }
                    } else {
                    ?>
                <div class="col-12">
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <h3>No Products Found</h3>
                        <p>There are currently no products in our store. Please check back later!</p>
                    </div>
                </div>
                <?php
                    }
                    $conn->close();
                ?>
            </div>
        </section>

        <!-- Promotional Banner -->
        <section class="my-5">
            <div class="hero-section text-center">
                <h2 class="display-4 fw-bold mb-3">Save 10%</h2>
                <p class="lead mb-4">Limited Time, Limitless Savings</p>
                <button class="btn btn-primary-custom btn-lg">
                    <i class="bi bi-tag-fill me-2"></i>Shop Sale Items
                </button>
            </div>
        </section>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // Add to Cart Function
    function addToCart(productId, productName, price) {
        fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `product_id=${productId}&product_name=${encodeURIComponent(productName)}&price=${price}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart badge
                    updateCartBadge(data.cartCount);

                    // Show success message
                    showNotification('Product added to cart!', 'success');
                } else {
                    showNotification('Failed to add product', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('An error occurred', 'error');
            });
    }

    // Toggle Wishlist
    function toggleWishlist(button) {
        const icon = button.querySelector('i');
        if (icon.classList.contains('bi-heart')) {
            icon.classList.remove('bi-heart');
            icon.classList.add('bi-heart-fill');
            button.style.color = '#FF6B35';
            showNotification('Added to wishlist!', 'success');
        } else {
            icon.classList.remove('bi-heart-fill');
            icon.classList.add('bi-heart');
            button.style.color = '';
            showNotification('Removed from wishlist!', 'info');
        }
    }

    // Update Cart Badge
    function updateCartBadge(count) {
        const badge = document.querySelector('.cart-badge');
        if (badge) {
            badge.textContent = count;
        } else if (count > 0) {
            const cartBtn = document.querySelector('.bi-cart3').parentElement;
            const newBadge = document.createElement('span');
            newBadge.className = 'cart-badge';
            newBadge.textContent = count;
            cartBtn.appendChild(newBadge);
        }
    }

    // Show Notification
    function showNotification(message, type) {
        const colors = {
            success: '#10B981',
            error: '#EF4444',
            info: '#3B82F6'
        };

        const notification = document.createElement('div');
        notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${colors[type]};
                color: white;
                padding: 15px 25px;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.3);
                z-index: 9999;
                animation: slideIn 0.3s ease-out;
            `;
        notification.textContent = message;
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease-in';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    // Add animations
    const style = document.createElement('style');
    style.textContent = `
            @keyframes slideIn {
                from { transform: translateX(400px); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(400px); opacity: 0; }
            }
        `;
    document.head.appendChild(style);
    </script>
</body>

</html>