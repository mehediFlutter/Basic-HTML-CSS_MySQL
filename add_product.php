<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Entry</title>
   
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