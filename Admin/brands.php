<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Brands - Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="css/style.css" rel="stylesheet" />


</head>

<body>
    <?php
        include_once '../config.php';
        
        // Get current page
        $current_page = basename($_SERVER['PHP_SELF']);
        
        // Get dynamic stats
        $stats = [
            'categories' => 0,
            'brands' => 0,
            'products' => 0,
            'total_value' => 0
        ];
        
        // Count categories
        $result = $conn->query("SELECT COUNT(*) as count FROM tblcategory");
        if ($result) {
            $stats['categories'] = $result->fetch_assoc()['count'];
        }
        
        // Count brands
        $result = $conn->query("SELECT COUNT(*) as count FROM tblbrand");
        if ($result) {
            $stats['brands'] = $result->fetch_assoc()['count'];
        }
        
        // Count products
        $result = $conn->query("SELECT COUNT(*) as count FROM tblproduct");
        if ($result) {
            $stats['products'] = $result->fetch_assoc()['count'];
        }
        
        // Calculate total value
        $result = $conn->query("SELECT SUM(price) as total FROM tblproduct");
        if ($result) {
            $row = $result->fetch_assoc();
            $stats['total_value'] = $row['total'] ? $row['total'] : 0;
        }
    ?>

    <!-- Topbar -->
    <div class="topbar">
        <a href="index.php" class="topbar-brand">
            <i class="fas fa-cube"></i>
            ProductHub
        </a>

        <div class="topbar-search position-relative">
            <i class="fas fa-search"></i>
            <input type="text" class="form-control" placeholder="Search products, brands, categories...">
        </div>

        <div class="topbar-user dropdown">
            <div class="user-avatar" data-bs-toggle="dropdown">
                <i class="fas fa-user"></i>
            </div>
            <span class="d-none d-md-block">Admin User</span>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle me-2"></i>Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
            </ul>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-section">
            <div class="sidebar-title">Dashboard</div>
            <a href="index.php" class="sidebar-item <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
                <div class="sidebar-item-content">
                    <i class="fas fa-home"></i>
                    <span>Overview</span>
                </div>
            </a>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-title">Product Management</div>

            <!-- Categories -->
            <a href="categories.php"
                class="sidebar-item <?php echo ($current_page == 'categories.php') ? 'active' : ''; ?>">
                <div class="sidebar-item-content">
                    <i class="fas fa-folder"></i>
                    <span>Categories</span>
                </div>
                <button class="add-btn-small" onclick="event.preventDefault(); window.location.href='add_category.php'"
                    title="Add Category">
                    <i class="fas fa-plus"></i>
                </button>
            </a>

            <!-- Brands -->
            <a href="brands.php" class="sidebar-item <?php echo ($current_page == 'brands.php') ? 'active' : ''; ?>">
                <div class="sidebar-item-content">
                    <i class="fas fa-tag"></i>
                    <span>Brands</span>
                </div>
                <button class="add-btn-small" onclick="event.preventDefault(); window.location.href='add_brand.php'"
                    title="Add Brand">
                    <i class="fas fa-plus"></i>
                </button>
            </a>

            <!-- Products -->
            <a href="products.php"
                class="sidebar-item <?php echo ($current_page == 'products.php') ? 'active' : ''; ?>">
                <div class="sidebar-item-content">
                    <i class="fas fa-box"></i>
                    <span>Products</span>
                </div>
                <button class="add-btn-small" onclick="event.preventDefault(); window.location.href='add_product.php'"
                    title="Add Product">
                    <i class="fas fa-plus"></i>
                </button>
            </a>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-title">Analytics</div>
            <a href="reports.php" class="sidebar-item">
                <div class="sidebar-item-content">
                    <i class="fas fa-chart-line"></i>
                    <span>Reports</span>
                </div>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Brands</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Brands</li>
                </ol>
            </nav>
        </div>

        <!-- Stats Grid - DYNAMIC -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="fas fa-folder"></i>
                </div>
                <div class="stat-value"><?php echo $stats['categories']; ?></div>
                <div class="stat-label">Total Categories</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="fas fa-tag"></i>
                </div>
                <div class="stat-value"><?php echo $stats['brands']; ?></div>
                <div class="stat-label">Total Brands</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon purple">
                    <i class="fas fa-box"></i>
                </div>
                <div class="stat-value"><?php echo $stats['products']; ?></div>
                <div class="stat-label">Total Products</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon orange">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="stat-value">$<?php echo number_format($stats['total_value'], 2); ?></div>
                <div class="stat-label">Total Value</div>
            </div>
        </div>

        <!-- Brand List Card -->
        <div class="data-card">
            <div class="data-card-header">
                <div class="data-card-title">
                    <i class="fas fa-tag"></i>
                    Brand List
                </div>
                <a href="add_brand.php" class="btn-modern btn-primary-modern">
                    <i class="fas fa-plus"></i>
                    Add New Brand
                </a>
            </div>
            <div class="data-card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Brand Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Products Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT b.*, c.cat_name,
                                    COUNT(p.pro_id) as product_count
                                    FROM tblbrand b
                                    LEFT JOIN tblcategory c ON b.cat_id = c.cat_id
                                    LEFT JOIN tblproduct p ON b.brand_id = p.brand_id
                                    GROUP BY b.brand_id
                                    ORDER BY b.brand_id DESC";
                            $result = $conn->query($sql);

                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td><strong>#" . htmlspecialchars($row['brand_id']) . "</strong></td>";
                                    echo "<td><img src='../images/" . htmlspecialchars($row['brand_img']) . "' width='60' height='60' class='img-thumbnail' style='object-fit: cover;' alt='Brand'></td>";
                                    echo "<td><strong>" . htmlspecialchars($row['brand_name']) . "</strong></td>";
                                    echo "<td><span class='badge bg-secondary'>" . htmlspecialchars($row['cat_name'] ?? 'N/A') . "</span></td>";
                                    
                                    // Status badge
                                    $status = htmlspecialchars($row['status']);
                                    $statusClass = ($status == 'active') ? 'bg-success' : 'bg-secondary';
                                    echo "<td><span class='badge $statusClass'>" . ucfirst($status) . "</span></td>";
                                    
                                    echo "<td><span class='badge bg-primary'>" . $row['product_count'] . " Products</span></td>";
                                    
                                    echo "<td class='text-nowrap'>";
                                    echo "<a href='edit_brand.php?id=" . $row['brand_id'] . "' class='btn-modern btn-warning-modern btn-sm me-1'><i class='fas fa-edit'></i></a>";
                                    echo "<a href='delete_brand.php?id=" . $row['brand_id'] . "' class='btn-modern btn-danger-modern btn-sm' onclick='return confirm(\"Delete this brand? This will also delete all related products!\")'><i class='fas fa-trash'></i></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center text-muted py-5'>No brands found. <a href='add_brand.php'>Add your first brand</a></td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
    <script>
    // Initialize DataTable
    const dataTable = new simpleDatatables.DataTable("#datatablesSimple", {
        searchable: true,
        fixedHeight: false,
        perPage: 10
    });
    </script>
</body>

</html>