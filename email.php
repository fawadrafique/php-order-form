<?php
$to = $email;
$subject = 'Your order\'s in the kitchen 🎉';
$message = '
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>We have received your order</title>
    <style>
      .receipt {
        width: 60%;
        margin: auto;
        padding: 0.5em;
      }
      .receipt-wrap {
        background: #fff;
        color: #000;
        text-align: center;
      }
      .receipt-box {
        display: flex;
        justify-content: space-between;
      }
      .h {
        line-height: 0.1;
      }
      .email-wrap {
        background: #f7f7f7;
        color: #fff;
      }
    </style>
  </head>
  <body class="receipt">
    <div class="email-wrap">
      <div class="receipt receipt-wrap">
        <h1>Here\'s your receipt</h1>
        <span class="receipt-box h"
          ><p>1x Fried Chicken Salad</p>
          <p>€6.90</p>
        </span>
        <span class="receipt-box h"
          ><p>1x Fried Chicken Salad</p>
          <p>€6.90</p></span
        >
        <div style="line-height: 0.1em; display: block">
          <span class="receipt-box h"
            ><p>Subtotal</p>
            <p>€6.90</p></span
          >
          <span class="receipt-box h"
            ><p>Delivery fee</p>
            <p>€6.90</p></span
          >
        </div>
        <span class="receipt-box h"
          ><h2>Total</h2>
          <h2>€2.26</h2></span
        >
      </div>
    </div>
    <br />
  </body>
</html>';
$from = dp_email;
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Additional headers
$headers .= 'To: ' . $to . "\r\n";
$headers .= 'From: ' . $from . "\r\n";
// Send the email
mail($to, $subject, $message, $headers);
