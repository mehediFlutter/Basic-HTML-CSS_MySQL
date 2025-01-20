<?php
require('db.php');

if (isset($_POST['submit'])) {
    // Sanitize inputs
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productPrice = mysqli_real_escape_string($conn, $_POST['productPrice']);

    // Validate inputs
    if (strlen($productName) < 3) {
        echo "Product name must be at least 3 characters long!";
    } elseif (!is_numeric($productPrice) || $productPrice < 0) {
        echo "Please enter a valid price!";
    } else {
        // Insert product into database
        $sql = "INSERT INTO products (name, price) VALUES ('$productName', '$productPrice')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Product added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Entry</title>
    <link rel="stylesheet" href="css/add_product.css">
   
</head>
<body>
    <div class="product-form">
        <h2>Add New Product</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input 
                    type="text" 
                    id="productName" 
                    name="productName" 
                    required 
                    minlength="3"
                >
                <div class="error">Product name must be at least 3 characters long</div>
            </div>

            <div class="form-group">
                <label for="productPrice">Product Price</label>
                <div class="price-input">
                    <input 
                        type="number" 
                        id="productPrice" 
                        name="productPrice" 
                        step="0.01" 
                        min="0" 
                        required
                    >
                </div>
                <div class="error">Please enter a valid price</div>
            </div>

            <button type="submit" name="submit">Add Product</button>
        </form>
    </div>
</body>
</html>