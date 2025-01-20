<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Collection</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 2rem;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-name {
            color: #333;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .product-price {
            color: #4CAF50;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .product-date {
            color: #888;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        .no-products {
            text-align: center;
            color: #666;
            font-size: 1.25rem;
            grid-column: 1 / -1;
            padding: 2rem;
        }

        @media (max-width: 600px) {
            body {
                padding: 1rem;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Our Products</h1>
        <div class="products-grid">
            <?php
            require('db.php');
            
            // Fetch products from database
            $sql = "SELECT * FROM products ORDER BY created_at DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product-card">';
                    echo '<h2 class="product-name">' . htmlspecialchars($row['name']) . '</h2>';
                    echo '<div class="product-price">$' . number_format($row['price'], 2) . '</div>';
                    echo '<div class="product-date">Added on ' . date('M d, Y', strtotime($row['created_at'])) . '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="no-products">No products found</div>';
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>