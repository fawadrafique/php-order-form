<?php ob_start(); ?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      type="text/css"
      rel="stylesheet"
    /> -->
    <title>Document</title>
    <style>
        .receipt {
            width: 80%;
            margin: auto;
            padding: 0.5em;
        }

        .receipt-wrap {
            background: #fff;
            color: #000;
            text-align: center;
        }

        .h {
            line-height: 0.1;
        }

        .w-80 {
            width: 80%;
            margin: auto;
        }

        .t-left {
            text-align: left;
        }

        .t-right {
            text-align: right;
        }

        .email-wrap {
            background: #f7f7f7;
            color: #fff;
        }

        .p-top {
            padding: 3px 0px 0px 0px;
        }

        .p-bottom {
            padding: 0px 0px 3px 0px;
        }
    </style>
</head>

<body class="receipt">
    <div class="email-wrap">
        <div class="receipt receipt-wrap">
            <h1>Great choice, <?php echo $fname; ?></h1>
            <hr>
            <h3>Your order straight to your door in <?php echo $delivery_time ?? 'an hour'; ?>.</h3>
            <h2>Here's your receipt</h2>
            <table class="w-80">
                <tbody>
                    <?php foreach ($cart as $key => $product) : ?>
                        <tr>
                            <td class="t-left"><?php echo $key; ?></td>
                            <td class="t-right">&euro; <?php echo $product; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td class="t-left p-top"><?php echo 'Subtotal'; ?></td>
                        <td class="t-right p-top">&euro; <?php echo $totalValue; ?></td>
                    </tr>
                    <tr>
                        <td class="t-left p-bottom"><?php echo 'Delivery fee'; ?></td>
                        <td class="t-right p-bottom">&euro; <?php echo key($_POST['delivery']); ?></td>
                    </tr>
                    <tr>
                        <td class="t-left">
                            <h4>Total</h4>
                        </td>
                        <td class="t-right">
                            <h4>&euro; <?php echo ($totalValue + key($_POST['delivery'])); ?></h4>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h6>Questions about your order?</br></h6>
            <span style='font-size: .67em;'>Email us at <i>becodephp@gmail.com</i></span>
            <hr>
            <footer>&copy; <?php echo date('Y') ?> Des Pardes. All rights reserved.</footer>
        </div>

    </div>
</body>

</html>
<?php
$message = ob_get_contents();
ob_end_clean();
