<!DOCTYPE html>
<html>
<head>
    <title>E-shop</title>
    <link rel="stylesheet" type="text/css" href="styleeshop.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
        .container {
            display: flex;
            flex-direction: row;
            min-height: 100vh;
        }

        .category-panel {
            width: 250px;
            background-color: #f8f8f8;
            padding: 20px;
            border-right: 1px solid #ddd;
            box-sizing: border-box;
        }

        .category-panel h2 {
            margin-top: 0;
        }

        .category-panel ul {
            list-style: none;
            padding: 0;
        }

        .category-panel ul li {
            margin: 10px 0;
        }

        .category-panel ul li a {
            text-decoration: none;
            color: #fff; 
            font-weight: bold;
            display: block; 
            padding: 10px; 
            background-color: #28a745; 
            border-radius: 8px;
            text-align: center; 
        }

        .category-panel ul li a:hover {
            background-color: #218838; 
        }
        
        .products {
            flex: 1; 
            padding: 20px;
            box-sizing: border-box;
        }

        .search-container {
            margin: 20px 0;
            width: 100%; 
        }

        .search-container input[type="text"] {
            width: 80%;
            padding: 10px;
            font-size: 16px;
        }

        .search-container input[type="submit"],
        .back-link {
            padding: 10px;
            font-size: 16px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 8px; 
            text-decoration: none; 
            display: inline-block; 
        }

        .search-container input[type="submit"]:hover,
        .back-link:hover {
            background-color: #218838;
        }

        .products-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; 
        }

        .products-list .product {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px; 
            border-radius: 5px;
            width: calc(33.33% - 20px); 
            box-sizing: border-box;
            text-align: center; /* Center-align text */
        }

        .products-list .product img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 10px auto; /* Center image */
            max-height: 200px; /* Set max height for images */
        }

        .product-details {
            text-align: left; /* Left-align product details */
            font-size: 14px;
            color: #333;
        }

        .product-details p {
            margin: 5px 0;
        }
        
        @media (max-width: 768px) {
            .products-list .product {
                width: calc(50% - 20px); 
            }
        }

        @media (max-width: 480px) {
            .products-list .product {
                width: 100%; 
            }
        }

        /* Slider styles */
        .price-slider {
            margin: 20px 0;
        }

        .price-slider input[type="range"] {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 8px;
            background: #ddd;
            outline: none;
            opacity: 0.9;
            transition: opacity .15s ease-in-out;
        }

        .price-slider input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            background: #28a745;
            cursor: pointer;
            border-radius: 50%;
        }

        .price-slider input[type="range"]::-moz-range-thumb {
            width: 25px;
            height: 25px;
            background: #28a745;
            cursor: pointer;
            border-radius: 50%;
        }

        .price-slider-values {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .price-slider-values span {
            font-weight: bold;
        }

        /* Button styles */
        .price-slider input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            text-align: center;
            font-size: 16px;
            margin-top: 10px;
        }

        .price-slider input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="category-panel">
        <h2>Kategórie</h2>
        <ul>
            <li><a href="eshop.php">Všetky produkty</a></li>
            <?php
            $servername = "localhost";
            $username = "simo3a2";
            $password = "14837944,Aa";
            $dbname = "simo";
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM categories";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li><a href='eshop.php?category_id=" . $row["id"] . "'>" . $row["name"] . "</a></li>";
                }
            } else {
                echo "No categories available.";
            }

            // Get min and max price for slider
            $sql = "SELECT MIN(price) as min_price, MAX(price) as max_price FROM products";
            $price_result = $conn->query($sql);
            $price_row = $price_result->fetch_assoc();
            $min_price = $price_row['min_price'];
            $max_price = $price_row['max_price'];

            $conn->close();
            ?>
        </ul>

        <h3>Filtrovanie podľa ceny</h3>
        <div class="price-slider">
            <form action="eshop.php" method="get">
                <input type="range" id="minPrice" name="min_price" min="<?php echo $min_price; ?>" max="<?php echo $max_price; ?>" value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : $min_price; ?>" oninput
                updatePriceRange()">
                <input type="range" id="maxPrice" name="max_price" min="<?php echo $min_price; ?>" max="<?php echo $max_price; ?>" value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : $max_price; ?>" oninput="updatePriceRange()">
                <div class="price-slider-values">
                    <span id="minPriceValue">$<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : $min_price; ?></span>
                    <span id="maxPriceValue">$<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : $max_price; ?></span>
                </div>
                <input type="submit" value="Filtruj">
            </form>
        </div>
    </div>

    <div class="products">
        <div class="search-container">
            <form action="#" method="get">
                <input type="text" placeholder="Vyhľadávanie..." name="search" value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>">
                <input type="submit" value="Vyhľadať">
                <?php if(isset($_GET['search'])): ?>
                    <a href="eshop.php" class="back-link">Späť na všetky produkty</a>
                <?php endif; ?>
            </form>
        </div>

        <div class="products-list">
            <?php
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM products";
            
            if(isset($_GET['category_id'])){
                $category_id = $_GET['category_id'];
                $sql .= " WHERE category_id = $category_id";
            }

            if(isset($_GET['search'])){
                $search = $_GET['search'];
                $sql .= (strpos($sql, 'WHERE') !== false ? " AND" : " WHERE") . " name LIKE '%$search%'";
            }

            if(isset($_GET['min_price']) && isset($_GET['max_price'])){
                $min_price = $_GET['min_price'];
                $max_price = $_GET['max_price'];
                $sql .= (strpos($sql, 'WHERE') !== false ? " AND" : " WHERE") . " price BETWEEN $min_price AND $max_price";
            }

            $sql .= " ORDER BY price ASC";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<h2>" . $row["name"] . "</h2>";
                    echo "<div class='product-details'>";
                    echo "<p>Značka: " . $row["brand"] . "</p>";
                    echo "<p>Výrobca: " . $row["manufacturer"] . "</p>";
                    echo "<p>Cena: €" . $row["price"] . "</p>";
                    echo "<p>Váha: " . $row["weight"] . " g</p>";
                    echo "<p>Počet kusov na sklade: " . $row["stock_quantity"] . "</p>";
                    echo "</div>";
                    echo "<img src='" . $row["image"] . "' alt='Product Image'>";
                    echo "</div>";
                }
            } else {
                echo "No products available.";
            }

            $conn->close();
            ?>
        </div>
    </div>
</div>

<script>
    function updatePriceRange() {
        var minPrice = document.getElementById('minPrice').value;
        var maxPrice = document.getElementById('maxPrice').value;
        document.getElementById('minPriceValue').textContent = '$' + minPrice;
        document.getElementById('maxPriceValue').textContent = '$' + maxPrice;
    }

    // Maintain slider positions after form submission
    document.addEventListener('DOMContentLoaded', function() {
        var minPrice = "<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : $min_price; ?>";
        var maxPrice = "<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : $max_price; ?>";
        document.getElementById('minPrice').value = minPrice;
        document.getElementById('maxPrice').value = maxPrice;
        document.getElementById('minPriceValue').textContent = '$' + minPrice;
        document.getElementById('maxPriceValue').textContent = '$' + maxPrice;
    });
</script>

</body>
</html>
