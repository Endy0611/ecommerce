<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category - Admin Panel</title>

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
        background: linear-gradient(135deg, #E6D5FF 0%, #C5B8E8 100%);
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

    .file-upload-wrapper {
        position: relative;
        border: 2px dashed #e0e0e0;
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        transition: all 0.3s;
        cursor: pointer;
        background: var(--light-bg);
    }

    .file-upload-wrapper:hover {
        border-color: var(--primary-color);
        background: #f0f4ff;
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

    .image-preview {
        max-width: 200px;
        max-height: 200px;
        margin: 15px auto;
        border-radius: 10px;
        display: none;
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

    .success-message {
        background: #10B981;
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

    .status-options {
        display: flex;
        gap: 15px;
    }

    .status-option {
        flex: 1;
        padding: 12px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        background: white;
    }

    .status-option input[type="radio"] {
        display: none;
    }

    .status-option:hover {
        border-color: var(--primary-color);
        background: #f0f4ff;
    }

    .status-option input[type="radio"]:checked+label {
        color: var(--primary-color);
        font-weight: bold;
    }

    .status-option input[type="radio"]:checked~.status-option {
        border-color: var(--primary-color);
        background: #f0f4ff;
    }
    </style>
</head>

<body>
    <div class="container">
        <a href="index.php" class="btn-back">
            <i class="bi bi-arrow-left"></i> Back to Dashboard
        </a>

        <div class="form-container">
            <div class="form-header">
                <h1><i class="bi bi-folder-plus"></i> Add New Category</h1>
                <p>Create a new product category for your store</p>
            </div>

            <div class="success-message" id="successMessage">
                <i class="bi bi-check-circle-fill me-2"></i>
                Category added successfully!
            </div>

            <form method="post" action="added_category.php" enctype="multipart/form-data" id="categoryForm">
                <div class="mb-4">
                    <label for="txtname" class="form-label">
                        <i class="bi bi-tag me-2"></i>Category Name
                    </label>
                    <input type="text" class="form-control" id="txtname" name="txtname"
                        placeholder="Enter category name (e.g., Smart Watch, Laptop)" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-image me-2"></i>Category Image
                    </label>
                    <div class="file-upload-wrapper">
                        <input type="file" name="files" id="fileInput" accept="image/*" onchange="previewImage(event)">
                        <div class="file-upload-icon">
                            <i class="bi bi-cloud-upload"></i>
                        </div>
                        <div class="file-upload-text">
                            <strong>Click to upload</strong> or drag and drop<br>
                            <small>PNG, JPG or GIF (max. 2MB)</small>
                        </div>
                    </div>
                    <img id="imagePreview" class="image-preview" alt="Preview">
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-toggle-on me-2"></i>Status
                    </label>
                    <div class="status-options">
                        <div class="status-option">
                            <input type="radio" name="txtstatus" id="active" value="active" checked>
                            <label for="active" style="cursor: pointer; display: block;">
                                <i class="bi bi-check-circle-fill text-success"></i><br>
                                Active
                            </label>
                        </div>
                        <div class="status-option">
                            <input type="radio" name="txtstatus" id="inactive" value="inactive">
                            <label for="inactive" style="cursor: pointer; display: block;">
                                <i class="bi bi-x-circle-fill text-danger"></i><br>
                                Inactive
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" name="btnadd" class="btn-submit">
                    <i class="bi bi-plus-circle me-2"></i>Add Category
                </button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // Image Preview
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }

    // Status Option Selection
    document.querySelectorAll('.status-option').forEach(option => {
        option.addEventListener('click', function() {
            const radio = this.querySelector('input[type="radio"]');
            radio.checked = true;

            // Remove active class from all options
            document.querySelectorAll('.status-option').forEach(opt => {
                opt.style.borderColor = '#e0e0e0';
                opt.style.background = 'white';
            });

            // Add active class to selected option
            this.style.borderColor = 'var(--primary-color)';
            this.style.background = '#f0f4ff';
        });
    });

    // Form Submission Handler
    document.getElementById('categoryForm').addEventListener('submit', function(e) {
        const categoryName = document.getElementById('txtname').value.trim();

        if (!categoryName) {
            e.preventDefault();
            alert('Please enter a category name');
            return false;
        }
    });

    // Show success message if redirected with success parameter
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