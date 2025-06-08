<?php
    session_start();

    require_once '../assets/connection.php';

    $cart_items_session = $_SESSION['cart'] ?? [];
    $total_cart_amount = 0;
    $products_in_cart_db = [];

    if (empty($cart_items_session)) {
        $_SESSION['checkout_message'] = "<div class='info'>Your cart is empty. Please add items before checking out.</div>";
        header("Location: cart.php");
        exit();
    }

    $distinct_product_ids = [];
    foreach ($cart_items_session as $item_key => $item_data) {
        $distinct_product_ids[] = $item_data['prod_id'];
    }

    if (!empty($distinct_product_ids)) {
        $clean_product_ids = array_map('intval', array_unique($distinct_product_ids));
        $placeholders = implode(',', array_fill(0, count($clean_product_ids), '?'));

        $sql = "SELECT prod_id, prod_name, regular_price, upsize_price FROM products WHERE prod_id IN ($placeholders)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            $_SESSION['checkout_message'] = "<div class='error'>Error preparing product fetch statement: " . mysqli_error($conn) . "</div>";
            header('location: cart.php');
            exit();
        }

        $types = str_repeat('i', count($clean_product_ids));
        mysqli_stmt_bind_param($stmt, $types, ...$clean_product_ids);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $products_in_cart_db[$row['prod_id']] = $row;
            }
        } else {
            $_SESSION['checkout_message'] = "<div class='error'>Error fetching product results: " . mysqli_error($conn) . "</div>";
            header('location: cart.php');
            exit();
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['checkout_message'] = "<div class='info'>No valid products in cart to checkout.</div>";
        header("Location: cart.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checkout</title>
        <link rel="stylesheet" href="../assets/css/checkout.css">
    </head>
    <body>
        <div class="checkout-container">
            <h1>Checkout</h1>
        
            <?php
            if (isset($_SESSION['checkout_message'])) {
                echo $_SESSION['checkout_message'];
                unset($_SESSION['checkout_message']);
            }
            ?>
        
            <div class="order-summary">
                <h2>Order Summary</h2>
                <?php
                    foreach ($cart_items_session as $item_key => $item_data) {
                        $prod_id = $item_data['prod_id'];
                        $quantity = $item_data['quantity'];
                        $price_type = $item_data['price_type'];

                        if (isset($products_in_cart_db[$prod_id])) {
                            $product = $products_in_cart_db[$prod_id];

                            $effective_price = 0;
                            if ($price_type === 'regular' && isset($product['regular_price'])) {
                                $effective_price = $product['regular_price'];
                            } elseif ($price_type === 'upsize' && isset($product['upsize_price'])) {
                                $effective_price = $product['upsize_price'];
                            }

                            $subtotal = $effective_price * $quantity;
                            $total_cart_amount += $subtotal;
                            ?>
                            <div class="summary-item">
                                        <span>
                                            <?php echo htmlspecialchars($product['prod_name']); ?>
                                            <?php if ($price_type === 'upsize'): ?>
                                                <small>(Upsize)</small>
                                            <?php else: ?>
                                                <small>(Regular)</small>
                                            <?php endif; ?>
                                            (x<?php echo htmlspecialchars($quantity); ?>)
                                        </span>
                                <span>₱ <?php echo number_format($subtotal, 2); ?></span>
                            </div>
                            <?php
                        }
                    }
                ?>
                <div class="summary-total">
                    <span>Total Amount:</span>
                    <span>₱ <?php echo number_format($total_cart_amount, 2); ?></span>
                </div>
            </div>
        
            <form action="place_order.php" method="post" class="payment-section">
                <label for="payment_method">Choose Payment Method: </label>
                <select name="payment_method" id="payment_method" required>
                    <option value="gcash">Gcash</option>
                    <option value="cash_on_delivery">Cash on Delivery</option>
                </select>
                <input type="hidden" name="total_amount" value="<?php echo htmlspecialchars($total_cart_amount); ?>">
                <button type="submit">Place Order</button>
            </form>
        </div>
    </body>
</html>