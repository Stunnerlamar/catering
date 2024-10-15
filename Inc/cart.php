<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classic Cart Widget</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Cart Button -->
    <button class="cart-toggle-btn" onclick="toggleCart()">
        <i class="fas fa-shopping-cart"></i>
        <span class="badge">0</span>
    </button>
    
    <!-- Cart Widget -->
    <div class="cart-widget">
        <div class="cart-header">
            <h2>Shopping Cart</h2>
            <button class="close-btn" onclick="toggleCart()">&times;</button>
        </div>
        <div class="cart-items">
            <!-- Cart items will be dynamically added here -->
        </div>
        <div class="cart-footer">
            <button class="checkout-btn">Checkout</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
<script>
    function toggleCart() {
        const cart = document.querySelector('.cart-widget');
        cart.classList.toggle('open');
    }

</script>