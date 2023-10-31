<?php
session_start();

// Database connection details
$hostname = "localhost";
$username = "root";
$password = "";
$database = "banana_leaf";

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cardNumber = $_POST["card-number"];
    $cardholderName = $_POST["card-name"];
    $expirationDate = $_POST["expiration-date"];
    $invoiceNumber = generateInvoiceNumber($conn);

    // Insert data into the "cards" table
    $sql = "INSERT INTO card (card_number, cardholder_name, expiration_date, invoice_number) 
            VALUES ('$cardNumber', '$cardholderName', '$expirationDate', '$invoiceNumber')";

    if ($conn->query($sql) === TRUE) {
  
       

        // Redirect to the order status page with a delay
        echo "<script>
            alert('Payment successful. Invoice number: $invoiceNumber');
            setTimeout(function() {
                window.location.href = 'order_status.php?status=order_placed';
            }, 1500); // Redirect after 15 seconds
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to generate a unique invoice number
function generateInvoiceNumber($conn) {
    // You can implement your own logic to generate invoice numbers
    // Here's a simple example:
    $lastInvoiceNumberQuery = "SELECT MAX(invoice_number) AS last_invoice FROM card";
    $result = $conn->query($lastInvoiceNumberQuery);
    $row = $result->fetch_assoc();
    $lastInvoiceNumber = $row["last_invoice"];
    $nextInvoiceNumber = $lastInvoiceNumber + 1;
    return $nextInvoiceNumber;
}

// Close the database connection
$conn->close();
?>
