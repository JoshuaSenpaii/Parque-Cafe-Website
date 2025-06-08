<?php
    session_start();
    require_once '../assets/connection.php';

    if(!isset($_SESSION['user_id'])){
        $_SESSION['order_msg'] = "<div class='error'>Your must be logged in to place an order</div>";
        header("Location: checkout.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $payment_method = $_POST['payment_method'] ?? null;
    $cart_items = $_SESSION['cart'] ?? [];

    if(empty($cart_items) || empty($payment_method)){
        $_SESSION['cart_msg'] = "<div class='error'>Cannot place empty order or missing paymnent option</div>";
        header("Location: checkout.php");
        exit();
    }

    $total_amount = 0;

    $product_ids = array_keys($cart_items);
    $placeholders = implode(',',array_fill(0, count($product_ids), '?'));

    $sql_fetch_prices = "SELECT prod_id, prod_price FROM products WHERE prod_id IN ($placeholders)";
    $stmt_fetch_prices = mysqli_prepare($conn, $sql_fetch_prices);

    $types = str_repeat('i', count($product_ids));
    mysqli_stmt_bind_param($stmt_fetch_prices, $types, ...$product_ids);
    mysqli_stmt_execute($stmt_fetch_prices);
    $result_prices = mysqli_stmt_get_result($stmt_fetch_prices);

    $db_product_prices = [];
    if($result_prices){
        while($row_price = mysqli_fetch_assoc($result_prices)){
            $db_product_prices[$row_price['prod_id']] = $row_price['prod_price'];
        }
    }
    else{
        $_SESSION['cart_msg'] = "<div class='error'>Could not verify product prices.</div>";
        header("Location: checkout.php");
        exit();
    }
    mysqli_stmt_close($stmt_fetch_prices);

    foreach ($cart_items as $prod_id => $quantity) {
        if (isset($db_product_prices[$prod_id])) {
            $total_amount += $db_product_prices[$prod_id] * $quantity;
        } else {
            $_SESSION['order_message'] = "<div class='error'> Product ID " . htmlspecialchars($prod_id) . " not found</div>";
            header("Location: ../cart/cart.php");
            exit();
        }
    }

    $insert_order_sql = "INSERT INTO orders (user_id, order_status, total_amount, payment_method) VALUES(?, 'pending', ?, ?)";
    $stmt_order = mysqli_prepare($conn, $insert_order_sql);

    if ($stmt_order === false) {
        $_SESSION['order_message'] = "<div class='error'>Error preparing order insertion: " . mysqli_error($conn) . "</div>";
        header("Location: checkout.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt_order, "ids", $user_id, $total_amount, $payment_method);

    if (mysqli_stmt_execute($stmt_order)) {
        $order_id = mysqli_stmt_insert_id($stmt_order);
        mysqli_stmt_close($stmt_order);


        $insert_item_sql = "INSERT INTO order_items (order_id, prod_id, quantity, price) VALUES(?,?,?,?)";
        $stmt_item = mysqli_prepare($conn, $insert_item_sql);

        if ($stmt_item === false) {
            $_SESSION['order_msg'] = "<div class='error'>Failed to prepare order items insertion.</div>";
            header("Location: checkout.php");
        } else {
            foreach ($cart_items as $prod_id => $quantity) {
                $price_per_item = $db_product_prices[$prod_id];
                mysqli_stmt_bind_param($stmt_item, "iiid", $order_id, $prod_id, $quantity, $price_per_item);
                mysqli_stmt_execute($stmt_item);

            }
            mysqli_stmt_close($stmt_item);
        }

        unset($_SESSION['cart']);
        $_SESSION['order_message'] = "<div class='success'>Order placed successfully! Your order ID is: " . $order_id . "</div>";
        header("Location: order_confirmation.php?order_id=" . $order_id);
        exit();
    } else {

        $_SESSION['order_message'] = "<div class='error'>Error placing order: " . mysqli_error($conn) . "</div>";
        header("Location: checkout.php");
        exit();
    }
