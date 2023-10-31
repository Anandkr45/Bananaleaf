<?php
session_start(); // Start a new session

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Payment</title>
<link rel="stylesheet"
    href="payment.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500&display=swap" rel="stylesheet">

</head> 
<body>
   
       
    <div class="payment-container">
    <h2 id="payment-title">Enter Payment Details</h2>
    <form id="payment-form" onsubmit="return validatePayment()" action="process_form.php" method="post">
      <input type="text" name="card-number" placeholder="Card Number" minlength="16" maxlength="16" required>
      <input type="text" name="card-name" placeholder="Cardholder Name" required>
      <div class="expiration">
        <input type="text" name="expiration-date" placeholder="MM/YY" required>
      </div>
      <input type="password" name="cvv" placeholder="CVV" maxlength="3" minlength="3" required>
      <button type="submit">Pay  <span id="radioValue"></span></button>
    </form>
    <p id="payment-error" style="color: red;"></p>
  </div>

 
  <script>   

     function validatePayment() 
   {
      var cardNumber = document.getElementById("card-number").value;
      var cardName = document.getElementById("card-name").value;
      var expirationMonth = document.getElementById("expiration-month").value;
      var expirationYear = document.getElementById("expiration-year").value;
      var cvv = document.getElementById("cvv").value;
      var paymentErrorMessage = document.getElementById("payment-error");

      paymentErrorMessage.textContent = "";

      if (cardNumber === "" || cardName === "" || expirationMonth === "" ||
          expirationYear === "" || cvv === "") {
        paymentErrorMessage.textContent = "Please fill in all payment details.";
        return false;
      }

      // Additional validation and payment processing logic would go here. 

      return true;
    }
  </script>