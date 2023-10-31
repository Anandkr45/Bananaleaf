<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
            margin-top: 50px;
        }

        h1 {
            color: #333;
        }

        p {
            font-size: 18px;
            color: #666;
        }

        .status-text {
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $status = isset($_GET['status']) ? $_GET['status'] : '';

        if ($status === 'order_placed') {
            echo "<h1>Your Order is Placed</h1>";
            echo "<p class='status-text'>Please wait while we process your order.</p>";
            echo "<script>
                setTimeout(function() {
                    window.location.href = 'order_status.php?status=order_packed';
                }, 3000);
            </script>";
        } elseif ($status === 'order_packed') {
            echo "<h1>Your Order is Packed</h1>";
            echo "<p class='status-text'>Your order is being prepared for delivery.</p>";
            echo "<script>
                setTimeout(function() {
                    window.location.href = 'order_status.php?status=order_on_the_way';
                }, 3000);
            </script>";
        } elseif ($status === 'order_on_the_way') {
            echo "<h1>Your Order is on the Way</h1>";
            echo "<p class='status-text'>Our delivery team is en route to your location.</p>";
            echo "<script>
                setTimeout(function() {
                    window.location.href = 'order_status.php?status=order_delivered';
                }, 3000);
            </script>";
        } elseif ($status === 'order_delivered') {
            echo "<h1>Your Order is Delivered</h1>";
            echo "<p class='status-text'>Enjoy your meal! Thank you for choosing us.</p>";
        } else {
            echo "<h1>Invalid Order Status</h1>";
            echo "<p class='status-text'>Sorry, the order status is not recognized.</p>";
        }
        ?>
    </div>
</body>
</html>
