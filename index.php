<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();
$totalValue = 0;
$email = $street = $streetnumber = $city = $zipcode = $success = '';
$empty = ['email' => '', 'street' => '', 'streetnumber' => '', 'city' => '', 'zipcode' => '', 'product' => '', 'delivery' => ''];
$errors = ['email' => '', 'street' => '', 'streetnumber' => '', 'city' => '', 'zipcode' => ''];
define("owner_email", "becodephp@gmail.com");

if (isset($_POST['order'])) {

    if (empty($_POST['email'])) {
        $empty['email'] = "Please enter your email address";
    } else {
        $email = sanitizer($_POST['email']);
        $_SESSION['email'] = $email;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // TODO: email is valid
        } else {

            $errors['email'] = "$email is not a valid email address";
        }
    }
    if (empty($_POST['street'])) {
        $empty['street'] =  "Street name is required";
    } else {
        $street = sanitizer($_POST['street']);
        $_SESSION['street'] = $street;
        // TODO: street is valid
    }
    if (empty($_POST['streetnumber'])) {
        $empty['streetnumber'] =  "Street number is required";
    } else {
        $streetnumber = sanitizer($_POST['streetnumber']);
        $_SESSION['streetnumber'] = $streetnumber;
        if (is_numeric($streetnumber)) {
            // TODO: streetnumber is valid
        } else {
            $errors['streetnumber'] =  "$streetnumber is not a valid Street number";
        }
    }
    if (empty($_POST['city'])) {
        $empty['city'] =  "City is required";
    } else {
        $city = sanitizer($_POST['city']);
        $_SESSION['city'] = $city;
        // TODO: city is valid
    }
    if (empty($_POST['zipcode'])) {
        $empty['zipcode'] =  "Zipcode is required";
    } else {
        $zipcode = sanitizer($_POST['zipcode']);
        $_SESSION['zipcode'] = $zipcode;
        if (is_numeric($zipcode)) {
            // TODO: zipcode is valid
        } else {
            $errors['email'] =  "$zipcode is not a valid Zipcode";
        }
    }
    if (empty($_POST['products'])) {
        $empty['product'] =  "At least one product is required";
    } else {
        $cart = $_POST['products'];
        foreach ($cart as $value) {
            $totalValue += $value;
        }

        print_r($cart);
    }
    if (empty($_POST['delivery'])) {
        $empty['delivery'] =  "Please select a delivery option";
    } else {
        $delivery = $_POST['delivery'];
    }

    // if (array_filter($errors) || array_filter($empty)) {
    //     // TODO: echo 'Please fix the errors' . "<br />";
    // } else {
    //     success($delivery);
    // }
}
whatIsHappening();
function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
function success($delivery, $cost)
{
    $estimatedTime = date('h:i A', time() + $delivery);
    return $success = "Thank you! Your order was successfully submitted!"
        . "<br>" . "Total price: &euro; " . "$cost"
        . "<br>" . "Delivery expected at " . "$estimatedTime";
}
function sanitizer($sanitize)
{
    $clean_comment = strip_tags($sanitize);
    return htmlspecialchars($clean_comment);
}
$deliveries = [
    ['name' => 'Normal delivery - 2 hours', 'time' => (2 * 60 * 60)],
    ['name' => 'Express delivery - 45 minutes', 'time' => (45 * 60)]
];
//your products with their price.
if (!$_GET || $_GET['food']) {
    $products = [
        ['name' => 'Club Ham', 'price' => 3.20],
        ['name' => 'Club Cheese', 'price' => 3],
        ['name' => 'Club Cheese & Ham', 'price' => 4],
        ['name' => 'Club Chicken', 'price' => 4],
        ['name' => 'Club Salmon', 'price' => 5]
    ];
} elseif (!$_GET['food']) {
    $products = [
        ['name' => 'Cola', 'price' => 2],
        ['name' => 'Fanta', 'price' => 2],
        ['name' => 'Sprite', 'price' => 2],
        ['name' => 'Ice-tea', 'price' => 3],
    ];
}


require 'form-view.php';
