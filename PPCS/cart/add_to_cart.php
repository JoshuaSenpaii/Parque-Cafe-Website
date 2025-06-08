<?php
    session_start();
    $prod_id = $_POST['prod_id'] ?? null;
    $quantity = $_POST['quantity'] ?? 1;
    $price_type = $_POST['price_type'] ?? 'regular';

    $quantity = intval($quantity);
    $prod_id = intval($prod_id);

    $cart_item_key = $prod_id . "_" . $price_type;

    if(isset($_SESSION['cart'][$cart_item_key])){
        $_SESSION['cart'][$cart_item_key][$quantity] += $quantity;
    }
    else{
        $_SESSION['cart'][$cart_item_key] = [
            'prod_id' => $prod_id,
            'quantity' => $quantity,
            'price_type' => $price_type,
        ];
    }

    header("Location: cart.php");
    exit;