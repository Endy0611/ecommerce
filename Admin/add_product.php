<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    :root {
        --primary-color: #4169E1;
        --secondary-color: #FF6B35;
        --success-color: #10B981;
        --warning-color: #F59E0B;
        --dark-color: #1a1a1a;
        --light-bg: #f8f9fa;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: linear-gradient(135deg, #FFF5F0 0%, #FFE8E0 100%);
        min-height: 100vh;
        padding: 40px 0;
    }

    .form-container {
        max-width: 600px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    }

    .form-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .form-header h1 {
        font-size: 32px;
        font-weight: bold;
        color: var(--dark-color);
        margin-bottom: 10px;
    }

    .form-header p {
        color: #666;
        font-size: 16px;
    }

    .form-label {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 10px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        border: 2px solid #e0e0e0;
        padding: 12px 16px;
        font-size: 15px;
        transition: all 0.3s;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(65, 105, 225, 0.1);
    }

    .input-group-text {
        background: var(--light-bg);
        border: 2px solid #e0e0e0;
        border-right: none;
        border-radius: 10px 0 0 10px;
        font-weight: 600;
    }

    .input-group .form-control {
        border-left: none;
        border-radius: 0 10px 10px 0;
    }

    .file-upload-wrapper {
        position: relative;
        border: 2px dashed #e0e0e0;
        border-radius: 10px;
        padding: 40px;
        text-align: center;
        transition: all 0.3s;
        cursor: pointer;
        background: var(--light-bg);
    }

    .file-upload-wrapper:hover {
        border-color: var(--primary-color);
        background: #f0f4ff;
    }

    .file-upload-wrapper.dragover {
        border-color: var(--success-color);
        background: #f0fdf4;
    }

    .file-upload-wrapper input[type="file"] {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .file-upload-icon {
        font-size: 48px;
        color: var(--primary-color);
        margin-bottom: 10px;
    }

    .file-upload-text {
        color: #666;
        font-size: 14px;
    }

    .image-preview-container {
        margin-top: 20px;
        display: none;
    }

    .image-preview {
        max-width: 100%;
        max-height: 300px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .remove-image-btn {
        background: var(--secondary-color);
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        margin-top: 10px;
        cursor: pointer;
        font-size: 14px;
        transition: all 0.3s;
    }

    .remove-image-btn:hover {
        background: #e55a2b;
        transform: scale(1.05);
    }

    .btn-submit {
        width: 100%;
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 15px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s;
        margin-top: 20px;
    }

    .btn-submit:hover {
        background: #3557c7;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(65, 105, 225, 0.3);
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--dark-color);
        text-decoration: none;
        font-weight: 600;
        margin-bottom: 20px;
        transition: all 0.3s;
    }

    .btn-back:hover {
        color: var(--primary-color);
        transform: translateX(-5px);
    }

    .warning-box {
        background: linear-gradient(135deg, #FEE2E2 0%, #FECACA 100%);
        border-left: 4px solid #EF4444;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .warning-box strong {
        color: #DC2626;
        font-size: 18px;
    }

    .warning-box a {
        color: #DC2626;
        font-weight: 600;
        text-decoration: underline;
    }

    .form-note {
        font-size: 12px;
        color: #666;
        margin-top: 5px;
        font-style: italic;
    }

    .size-options {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
    }

    .size-option {
        padding: 12px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        background: white;
    }

    .size-option:hover {
        border-color: var(--primary-color);
        background: #f0f4ff;
    }

    .size-option input[type="radio"] {
        display: none;
    }

    .size-option input[type="radio"]:checked+label {
        color: var(--primary-color);
        font-weight: bold;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }

        .size-options {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .success-message {
        background: var(--success-color);
        color: white;
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        display: none;
        animation: slideDown 0.3s ease-out;
    }

    @keyframes slideDown {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    </style>
</head>

<body>
    <?php
    include_once '../config.php';
    
    // Fetch all brands with their categories for dropdown
    $brands = [];
    $result = $conn->query("SELECT b.brand_id, b.brand_name, c.cat_name 
                           FROM tblbrand b 
                           LEFT JOIN tblcategory c ON b.cat_id = c.cat_id
                           WHERE b.status='active' 
                           ORDER BY c.cat_name, b.brand_name ASC");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $brands[] = $row;
        }
    }
    ?>

    <div class="container">
        <a href="index.php" class="btn-back">
            <i class="bi bi-arrow-left"></i> Back to Dashboard
        </a>

        <div class="form-container">
            <div class="form-header">
                <h1><i class="bi bi-box-seam"></i> Add New Product</h1>
                <p>Fill in the details to add a new product to your store</p>
            </div>

            <div class="success-message" id="successMessage">
                <i class="bi bi-check-circle-fill me-2"></i>
                Product added successfully!
            </div>

            <?php if (count($brands) == 0): ?>
            <div class="warning-box">
                <strong><i class="bi bi-exclamation-triangle-fill me-2"></i>Warning!</strong>
                <p class="mb-0 mt-2">No brands found. Please <a href="add_brand.php">add a brand</a> first before
                    adding products!</p>
            </div>
            <?php else: ?>
            <form method="post" action="added_product.php" enctype="multipart/form-data" id="productForm">
                <!-- Brand Selection -->
                <div class="mb-4">
                    <label for="txtbrand" class="form-label">
                        <i class="bi bi-award"></i> Brand
                    </label>
                    <select name="txtbrand" id="txtbrand" class="form-select" required>
                        <option value="">-- Select Brand --</option>
                        <?php 
                            $current_category = '';
                            foreach ($brands as $brand): 
                                if ($brand['cat_name'] != $current_category) {
                                    if ($current_category != '') echo '</optgroup>';
                                    $current_category = $brand['cat_name'];
                                    echo '<optgroup label="' . htmlspecialchars($current_category) . '">';
                                }
                            ?>
                        <option value="<?php echo htmlspecialchars($brand['brand_id']); ?>">
                            <?php echo htmlspecialchars($brand['brand_name']); ?>
                        </option>
                        <?php 
                            endforeach; 
                            if ($current_category != '') echo '</optgroup>';
                            ?>
                    </select>
                    <div class="form-note">Select which brand this product belongs to</div>
                </div>

                <!-- Product Name -->
                <div class="mb-4">
                    <label for="txtname" class="form-label">
                        <i class="bi bi-tag"></i> Product Name
                    </label>
                    <input type="text" class="form-control" id="txtname" name="txtname" required
                        placeholder="e.g., iPhone 15 Pro Max, MacBook Air M2">
                    <div class="form-note">Enter a descriptive product name</div>
                </div>

                <!-- Product Image -->
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-image"></i> Product Image
                    </label>
                    <div class="file-upload-wrapper" id="fileUploadWrapper">
                        <input type="file" name="files" id="fileInput" accept="image/*" required
                            onchange="previewImage(event)">
                        <div class="file-upload-icon">
                            <i class="bi bi-cloud-upload"></i>
                        </div>
                        <div class="file-upload-text">
                            <strong>Click to upload</strong> or drag and drop<br>
                            <small>PNG, JPG or GIF (max. 5MB)</small>
                        </div>
                    </div>
                    <div class="image-preview-container" id="imagePreviewContainer">
                        <img id="imagePreview" class="image-preview" alt="Preview">
                        <br>
                        <button type="button" class="remove-image-btn" onclick="removeImage()">
                            <i class="bi bi-trash"></i> Remove Image
                        </button>
                    </div>
                </div>

                <!-- Size Selection -->
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-rulers"></i> Size / Variant
                    </label>
                    <div class="size-options">
                        <div class="size-option" onclick="selectSize('Small')">
                            <input type="radio" name="txtsize" id="size_small" value="Small" required>
                            <label for="size_small" style="cursor: pointer; display: block;">Small</label>
                        </div>
                        <div class="size-option" onclick="selectSize('Regular')">
                            <input type="radio" name="txtsize" id="size_regular" value="Regular">
                            <label for="size_regular" style="cursor: pointer; display: block;">Regular</label>
                        </div>
                        <div class="size-option" onclick="selectSize('Large')">
                            <input type="radio" name="txtsize" id="size_large" value="Large">
                            <label for="size_large" style="cursor: pointer; display: block;">Large</label>
                        </div>
                        <div class="size-option" onclick="selectSize('Grand')">
                            <input type="radio" name="txtsize" id="size_grand" value="Grand">
                            <label for="size_grand" style="cursor: pointer; display: block;">Grand</label>
                        </div>
                    </div>
                    <div class="form-note">Choose product size or variant</div>
                </div>

                <!-- Price and Points -->
                <div class="form-row mb-4">
                    <div>
                        <label for="txtprice" class="form-label">
                            <i class="bi bi-currency-dollar"></i> Price
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" id="txtprice" name="txtprice" step="0.01" min="0"
                                required placeholder="0.00">
                        </div>
                        <div class="form-note">Enter product price in USD</div>
                    </div>

                    <div>
                        <label for="txtpoint" class="form-label">
                            <i class="bi bi-star"></i> Reward Points
                        </label>
                        <input type="number" class="form-control" id="txtpoint" name="txtpoint" min="0"
                            placeholder="Auto-calculated">
                        <div class="form-note">Leave empty for auto-calculation</div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="btnadd" class="btn-submit">
                    <i class="bi bi-plus-circle me-2"></i>Add Product
                </button>
            </form>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // Image Preview
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        const container = document.getElementById('imagePreviewContainer');
        const uploadWrapper = document.getElementById('fileUploadWrapper');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                container.style.display = 'block';
                uploadWrapper.style.display = 'none';
            }
            reader.readAsDataURL(file);
        }
    }

    // Remove Image
    function removeImage() {
        document.getElementById('fileInput').value = '';
        document.getElementById('imagePreviewContainer').style.display = 'none';
        document.getElementById('fileUploadWrapper').style.display = 'block';
    }

    // Size Selection
    function selectSize(size) {
        document.getElementById('size_' + size.toLowerCase()).checked = true;

        // Update visual selection
        document.querySelectorAll('.size-option').forEach(opt => {
            opt.style.borderColor = '#e0e0e0';
            opt.style.background = 'white';
        });

        event.currentTarget.style.borderColor = 'var(--primary-color)';
        event.currentTarget.style.background = '#f0f4ff';
    }

    // Drag and Drop
    const uploadWrapper = document.getElementById('fileUploadWrapper');

    uploadWrapper.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadWrapper.classList.add('dragover');
    });

    uploadWrapper.addEventListener('dragleave', () => {
        uploadWrapper.classList.remove('dragover');
    });

    uploadWrapper.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadWrapper.classList.remove('dragover');

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            document.getElementById('fileInput').files = files;
            previewImage({
                target: {
                    files: files
                }
            });
        }
    });

    // Show success message if redirected
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === 'true') {
        document.getElementById('successMessage').style.display = 'block';
        setTimeout(() => {
            document.getElementById('successMessage').style.display = 'none';
        }, 3000);
    }
    </script>
</body>

</html>