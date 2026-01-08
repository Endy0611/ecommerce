<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product - Amazone Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    :root {
        --primary-color: #4169E1;
        --secondary-color: #FF6B35;
        --dark-color: #1a1a1a;
        --light-bg: #f8f9fa;
        --success-color: #10B981;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .form-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        padding: 40px;
        max-width: 600px;
        width: 100%;
        animation: slideUp 0.5s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .form-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 10px;
    }

    .form-header p {
        color: #666;
        font-size: 16px;
    }

    .form-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 40px;
        box-shadow: 0 10px 25px rgba(65, 105, 225, 0.3);
    }

    .form-label {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 8px;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-control,
    .form-select {
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 16px;
        transition: all 0.3s;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(65, 105, 225, 0.1);
        outline: none;
    }

    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }

    .file-input-wrapper input[type=file] {
        position: absolute;
        left: -9999px;
    }

    .file-input-label {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 40px;
        border: 2px dashed #d1d5db;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s;
        background: var(--light-bg);
    }

    .file-input-label:hover {
        border-color: var(--primary-color);
        background: #e0e7ff;
    }

    .file-input-label i {
        font-size: 32px;
        color: var(--primary-color);
    }

    .file-name {
        margin-top: 10px;
        font-size: 14px;
        color: #666;
        font-weight: 500;
    }

    .input-icon {
        position: relative;
    }

    .input-icon i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        font-size: 18px;
    }

    .input-icon .form-control {
        padding-left: 45px;
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--primary-color), #667eea);
        color: white;
        border: none;
        padding: 15px 40px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 18px;
        width: 100%;
        cursor: pointer;
        transition: all 0.3s;
        margin-top: 20px;
        box-shadow: 0 10px 25px rgba(65, 105, 225, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(65, 105, 225, 0.4);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .btn-back {
        background: #6b7280;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
        margin-top: 15px;
    }

    .btn-back:hover {
        background: #4b5563;
        color: white;
        transform: translateY(-2px);
    }

    .badge-info {
        background: #e0e7ff;
        color: var(--primary-color);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 8px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    @media (max-width: 576px) {
        .form-container {
            padding: 30px 20px;
        }

        .form-header h1 {
            font-size: 24px;
        }

        .form-icon {
            width: 60px;
            height: 60px;
            font-size: 30px;
        }
    }
    </style>
</head>

<body>
    <div class="form-container">
        <div class="form-header">
            <div class="form-icon">📦</div>
            <h1>Add New Product</h1>
            <p>Fill in the details to add a product to your store</p>
        </div>

        <form method="POST" action="added_product.php" enctype="multipart/form-data" id="productForm">
            <div class="form-group">
                <label class="form-label">
                    <i class="bi bi-tag me-1"></i> Product Name
                </label>
                <div class="input-icon">
                    <i class="bi bi-box-seam"></i>
                    <input type="text" name="txtname" class="form-control" placeholder="Enter product name" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">
                    <i class="bi bi-image me-1"></i> Product Image
                </label>
                <div class="file-input-wrapper">
                    <input type="file" name="files" id="fileInput" accept="image/*" required>
                    <label for="fileInput" class="file-input-label" id="fileLabel">
                        <i class="bi bi-cloud-upload"></i>
                        <div>
                            <div style="font-weight: 600; color: var(--dark-color);">Click to upload image</div>
                            <div style="font-size: 14px; color: #9ca3af;">PNG, JPG, GIF up to 5MB</div>
                        </div>
                    </label>
                </div>
                <div class="file-name" id="fileName"></div>
            </div>

            <div class="form-group">
                <label class="form-label">
                    <i class="bi bi-rulers me-1"></i> Size / Variant
                </label>
                <div class="input-icon">
                    <i class="bi bi-menu-button-wide"></i>
                    <select name="txtsize" class="form-select" style="padding-left: 45px;" required>
                        <option value="">Choose size...</option>
                        <option value="Small">Small</option>
                        <option value="Regular">Regular</option>
                        <option value="Large">Large</option>
                        <option value="Grand">Grand</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">
                    <i class="bi bi-currency-dollar me-1"></i> Price
                </label>
                <div class="input-icon">
                    <i class="bi bi-cash-coin"></i>
                    <input type="number" name="txtprice" class="form-control" placeholder="0.00" step="0.01" min="0"
                        required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">
                    <i class="bi bi-award me-1"></i> Reward Points
                </label>
                <span class="badge-info">Optional - Leave blank for auto-calculation</span>
                <div class="input-icon">
                    <i class="bi bi-star"></i>
                    <input type="number" name="txtpoint" class="form-control" placeholder="0" min="0">
                </div>
            </div>

            <button type="submit" name="btnadd" class="btn-submit">
                <i class="bi bi-plus-circle me-2"></i>Add Product to Store
            </button>

            <div class="text-center">
                <a href="index.php" class="btn-back">
                    <i class="bi bi-arrow-left me-2"></i>Back to Store
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // File input preview
    const fileInput = document.getElementById('fileInput');
    const fileLabel = document.getElementById('fileLabel');
    const fileName = document.getElementById('fileName');

    fileInput.addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            fileName.innerHTML = `<i class="bi bi-check-circle text-success me-2"></i>Selected: ${file.name}`;

            fileLabel.style.borderColor = '#10B981';
            fileLabel.style.background = '#d1fae5';
            fileLabel.innerHTML = `
                    <i class="bi bi-check-circle" style="color: #10B981; font-size: 32px;"></i>
                    <div>
                        <div style="font-weight: 600; color: #10B981;">Image Selected!</div>
                        <div style="font-size: 14px; color: #059669;">${file.name}</div>
                    </div>
                `;
        }
    });

    // Form validation
    const form = document.getElementById('productForm');
    form.addEventListener('submit', function(e) {
        const price = parseFloat(document.querySelector('input[name="txtprice"]').value);

        if (price <= 0) {
            e.preventDefault();
            alert('Please enter a valid price greater than 0');
            return false;
        }

        // Show loading state
        const submitBtn = form.querySelector('.btn-submit');
        submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Adding Product...';
        submitBtn.disabled = true;
    });

    // Auto-calculate reward points based on price
    const priceInput = document.querySelector('input[name="txtprice"]');
    const pointsInput = document.querySelector('input[name="txtpoint"]');

    priceInput.addEventListener('input', function() {
        if (!pointsInput.value) {
            const price = parseFloat(this.value) || 0;
            const calculatedPoints = Math.round(price / 10);
            pointsInput.placeholder = `Suggested: ${calculatedPoints} points`;
        }
    });
    </script>
</body>

</html>