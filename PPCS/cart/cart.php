<?php
    session_start();
    require_once '../assets/connection.php';

    $cart_items = $_SESSION['cart'] ?? [];
    $total_cart_amount = 0;
    $products_in_cart = [];
    $cart_message = "";

    if (!empty($cart_items)) {
        $product_ids = array_keys($cart_items);
        $clean_product_ids = array_map('intval', $product_ids);

        $placeholders = implode(',', array_fill(0, count($clean_product_ids), '?'));

        $sql = "SELECT prod_id, prod_name, prod_price, prod_img FROM products WHERE prod_id IN ($placeholders)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            $cart_message = "<div class='error'>Error preparing product fetch statement: " . mysqli_error($conn) . "</div>";
        } else {
            $types = str_repeat('i', count($clean_product_ids));
            mysqli_stmt_bind_param($stmt, $types, ...$clean_product_ids);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result){
                while ($row = mysqli_fetch_assoc($result)) {
                    $products_in_cart[$row['prod_id']] = $row;
                }
            } else {
                $cart_message = "<div class='error'>Error fetching product results: " . mysqli_error($conn) . "</div>";
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        $cart_message = "<p class='empty-cart-message'>Your cart is empty. Start shopping!</p>";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your Cart</title>
        <link rel="stylesheet" href="../assets/css/cart.css">
    </head>
    <body>
    <div class="cart-container">
        <h1>Your Cart</h1>

        <?php
        if (!empty($cart_message)) {
            echo $cart_message;
        }
        ?>

        <?php if (!empty($cart_items) && !empty($products_in_cart)): ?>
            <table class="cart-table">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($cart_items as $prod_id => $quantity) {
                    if (isset($products_in_cart[$prod_id])) {
                        $product = $products_in_cart[$prod_id];
                        $subtotal = $product['prod_price'] * $quantity;
                        $total_cart_amount += $subtotal;
                        ?>
                        <tr>
                            <td>
                                <img src="../assets/images/<?php echo htmlspecialchars($product['prod_img']); ?>" alt="<?php echo htmlspecialchars($product['prod_name']); ?>">
                            </td>
                            <td><?php echo htmlspecialchars($product['prod_name']); ?></td> <td>₱ <?php echo number_format($product['prod_price'], 2); ?></td>
                            <td>
                                <form action="update_cart.php" method="post" class="update-quantity-form">
                                    <input type="hidden" name="prod_id" value="<?php echo htmlspecialchars($prod_id); ?>">
                                    <input type="number" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>" min="1">
                                    <button type="submit">Update</button>
                                </form>
                            </td>
                            <td>₱ <?php echo number_format($subtotal, 2); ?></td>
                            <td>
                                <form action="remove_from_cart.php" method="post">
                                    <input type="hidden" name="prod_id" value="<?php echo htmlspecialchars($prod_id); ?>">
                                    <button type="submit" class="remove-item-btn">Remove</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>

            <div class="cart-actions">
                <a href="../index.php" class="btn">Continue Shopping</a>
                <div class="total-amount">
                    Total: ₱ <?php echo number_format($total_cart_amount, 2); ?>
                </div>
                <a href="../checkout/checkout.php" class="btn">Proceed to Checkout</a>
            </div>
        <?php else: ?>
            <div style="text-align: center; margin-top: 20px;">
                <a href="../index.php" class="btn">Go to Menu</a>
            </div>
        <?php endif; ?>
    </div>
    </body>
</html>