<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <title>Des Pardes online</title>
</head>

<body class="bg-secondary">
    <div class="container text-light">
        <h1 class="text-center">Des Pardes</h1>
        <?php if (isset($_POST['order'])) : ?>
            <?php if (!array_filter($errors)) : ?>
                <?php session_unset(); ?>
                <?php $_COOKIE['order'] += $totalValue; ?>
                <?php setcookie('order', $_COOKIE['order'], time() + (86400 * 30), '/'); ?>
                <div class="alert alert-success text-success text-center" role="alert"><?= success($delivery, $totalValue); ?></div>
                <?php
                require 'email.php';
                ?>
            <?php endif; ?>
        <?php endif; ?>

        <nav class="navbar navbar-expand-sm navbar-dark bg-secondary d-flex justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item <?= (!$_GET || $_GET['food']) ? 'active' : ''; ?> px-2">
                    <a class="nav-link" href="?food=1">Food</a>
                </li>
                <li class="nav-item <?= (!$_GET || !$_GET['food']) ? 'active' : ''; ?> px-2">
                    <a class="nav-link" href="?food=0">Drinks</a>
                </li>
            </ul>
        </nav>
        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fname">First name:</label>
                    <input type="text" id="fname" name="fname" value="<?= $_SESSION['fname'] ?? ''; ?>" class="form-control" />
                    <?php if ($errors['fname']) : ?>
                        <div class="text-warning"><?= $errors['fname']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="lname">Last name:</label>
                    <input type="text" id="lname" name="lname" value="<?= $_SESSION['lname'] ?? ''; ?>" class="form-control" />
                    <?php if ($errors['lname']) : ?>
                        <div class="text-warning"><?= $errors['lname']; ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">E-mail:</label>
                    <input type="text" id="email" name="email" value="<?= $_SESSION['email'] ?? ''; ?>" class="form-control" />
                    <?php if ($errors['email']) : ?>
                        <div class="text-warning"><?= $errors['email']; ?></div>
                    <?php endif; ?>
                </div>

            </div>


            <fieldset>
                <legend>Address</legend>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="street">Street:</label>
                        <input type="text" name="street" id="street" value="<?= $_SESSION['street'] ?? ''; ?>" class="form-control">
                        <?php if ($errors['street']) : ?>
                            <div class="text-warning"><?= $errors['street']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="streetnumber">Street number:</label>
                        <input type="text" id="streetnumber" name="streetnumber" value="<?= $_SESSION['streetnumber'] ?? ''; ?>" class="form-control">
                        <?php if ($errors['streetnumber']) : ?>
                            <div class="text-warning"><?= $errors['streetnumber']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" value="<?= $_SESSION['city'] ?? ''; ?>" class="form-control">
                        <?php if ($errors['city']) : ?>
                            <div class="text-warning"><?= $errors['city']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="zipcode">Zipcode</label>
                        <input type="text" id="zipcode" name="zipcode" value="<?= $_SESSION['zipcode'] ?? ''; ?>" class="form-control">
                        <?php if ($errors['zipcode']) : ?>
                            <div class="text-warning"><?= $errors['zipcode']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </fieldset>
            <div class="form-row">

                <div class="form-group col-md-6">
                    <fieldset>
                        <legend>Products</legend>
                        <?php foreach ($products as $i => $product) : ?>
                            <label>
                                <input type="checkbox" value="<?php echo $product['price'] ?>" name="products[<?php echo $product['name'] ?>]" /> <?php echo $product['name'] ?> -
                                &euro; <?php echo number_format($product['price'], 2) ?></label><br />
                        <?php endforeach; ?>
                        <?php if ($errors['product']) : ?>
                            <div class="text-warning"><?= $errors['product']; ?></div>
                        <?php endif; ?>
                    </fieldset>
                </div>
                <div class="form-group col-md-6">
                    <fieldset>
                        <legend>Delivery</legend>
                        <div class="text-dark mb-1" style="font-size: 12px;"><?= 'Normal orders are fulfilled in 2 hours, for express delivery it is only 45 minutes.' ?></div>
                        <?php foreach ($deliveries as $i => $delivery) : ?>
                            <label>
                                <input type="radio" value="<?php echo $delivery['time'] ?>" name="delivery[<?php echo $delivery['price'] ?>]" /> <?php echo $delivery['name'] ?> </label><br />
                        <?php endforeach; ?>
                        <?php if ($errors['delivery']) : ?>
                            <div class="text-warning"><?= $errors['delivery']; ?></div>
                        <?php endif; ?>
                    </fieldset>
                </div>
            </div>

            <button type="submit" name="order" class="btn btn-light">Order!</button>

        </form>

        <footer class="mb-2">You already ordered <strong>&euro; <?php echo $_COOKIE['order'] ?? '0' ?></strong> in food and drinks.</footer>
    </div>

    <style>
        footer {
            text-align: center;
        }
    </style>
</body>

</html>