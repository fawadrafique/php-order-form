<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <title>Order food & drinks</title>
</head>

<body>
    <div class="container">
        <h1>Order food in restaurant "the Personal Ham Processors"</h1>
        <?php if (isset($_POST['order'])) : ?>
            <?php if (!array_filter($errors) && !array_filter($empty)) : ?>
                <?php session_unset(); ?>
                <?php $_COOKIE['order'] += $totalValue; ?>
                <?php setcookie('order', $_COOKIE['order'], time() + (86400 * 30), '/'); ?>
                <div class="alert alert-success text-success text-center" role="alert"><?= success($delivery, $totalValue); ?></div>
            <?php endif; ?>
        <?php endif; ?>

        <nav>
            <ul class="nav">

                <li class="nav-item">
                    <a class="nav-link active" href="?food=1">Order food</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="?food=0">Order drinks</a>
                </li>

            </ul>
        </nav>
        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">E-mail:</label>
                    <input type="text" id="email" name="email" value="<?= $_SESSION['email'] ?? ''; ?>" class="form-control" />
                    <?php if ($empty['email']) : ?>
                        <div class="text-danger"><?= $empty['email']; ?></div>
                    <?php elseif ($errors['email']) : ?>
                        <div class="text-danger"><?= $errors['email']; ?></div>
                    <?php endif; ?>
                </div>

            </div>


            <fieldset>
                <legend>Address</legend>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="street">Street:</label>
                        <input type="text" name="street" id="street" value="<?= $_SESSION['street'] ?? ''; ?>" class="form-control">
                        <?php if ($empty['street']) : ?>
                            <div class="text-danger"><?= $empty['street']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="streetnumber">Street number:</label>
                        <input type="text" id="streetnumber" name="streetnumber" value="<?= $_SESSION['streetnumber'] ?? ''; ?>" class="form-control">
                        <?php if ($empty['streetnumber']) : ?>
                            <div class="text-danger"><?= $empty['streetnumber']; ?></div>
                        <?php elseif ($errors['streetnumber']) : ?>
                            <div class="text-danger"><?= $errors['streetnumber']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" value="<?= $_SESSION['city'] ?? ''; ?>" class="form-control">
                        <?php if ($empty['city']) : ?>
                            <div class="text-danger"><?= $empty['city']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="zipcode">Zipcode</label>
                        <input type="text" id="zipcode" name="zipcode" value="<?= $_SESSION['zipcode'] ?? ''; ?>" class="form-control">
                        <?php if ($empty['zipcode']) : ?>
                            <div class="text-danger"><?= $empty['zipcode']; ?></div>
                        <?php elseif ($errors['zipcode']) : ?>
                            <div class="text-danger"><?= $errors['zipcode']; ?></div>
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
                                <input type="checkbox" value="<?php echo $product['price'] ?>" name="products[<?php echo $i ?>]" /> <?php echo $product['name'] ?> -
                                &euro; <?php echo number_format($product['price'], 2) ?></label><br />
                        <?php endforeach; ?>
                        <?php if ($empty['product']) : ?>
                            <div class="text-danger"><?= $empty['product']; ?></div>
                        <?php endif; ?>
                    </fieldset>
                </div>
                <div class="form-group col-md-6">
                    <fieldset>
                        <legend>Delivery</legend>
                        <?php foreach ($deliveries as $i => $delivery) : ?>
                            <label>
                                <input type="radio" value="<?php echo $delivery['time'] ?>" name="delivery" /> <?php echo $delivery['name'] ?> </label><br />
                        <?php endforeach; ?>
                        <?php if ($empty['delivery']) : ?>
                            <div class="text-danger"><?= $empty['delivery']; ?></div>
                        <?php endif; ?>
                    </fieldset>
                </div>
            </div>

            <button type="submit" name="order" class="btn btn-primary">Order!</button>

        </form>

        <footer>You already ordered <strong>&euro; <?php echo $_COOKIE['order'] ?? '0' ?></strong> in food and drinks.</footer>
    </div>

    <style>
        footer {
            text-align: center;
        }
    </style>
</body>

</html>