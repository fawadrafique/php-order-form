<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();
$email = $street = $streetnumber = $city = $zipcode = '';
$empty = ['email' => '', 'street' => ',', 'streetnumber' => '', 'city' => '', 'zipcode' => ''];
$error = ['email' => '', 'street' => ',', 'streetnumber' => '', 'city' => '', 'zipcode' => ''];

if (isset($_POST['order'])) {
    if (empty($_POST['email'])) {
        $empty['email'] = "Please enter your email address";
    } else {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "$email is a valid email address" . "<br />";
        } else {

            $error['email'] = "$email is not a valid email address" . "";
        }
    }
    if (empty($_POST['street'])) {
        $empty['street'] =  "Street name is required";
    } else {
        $street = $_POST['street'];
        echo "$street" . "<br />";
    }
    if (empty($_POST['streetnumber'])) {
        $empty['streetnumber'] =  "Street number is required";
    } else {
        $streetnumber = $_POST['streetnumber'];
        if (is_numeric($streetnumber)) {
            echo "$streetnumber is a valid Street number" . "<br />";
        } else {
            $error['streetnumber'] =  "$streetnumber is not a valid Street number";
        }
    }
    if (empty($_POST['city'])) {
        $empty['city'] =  "City is required";
    } else {
        $city = $_POST['city'];
        echo "$city" . "<br />";
    }
    if (empty($_POST['zipcode'])) {
        $empty['zipcode'] =  "Zipcode is required";
    } else {
        $zipcode = $_POST['zipcode'];
        if (is_numeric($zipcode)) {
            echo "$zipcode is a valid Zipcode" . "<br />";
        } else {
            $error['email'] =  "$zipcode is not a valid Zipcode";
        }
    }
}
//whatIsHappening();
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

//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

$products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

$totalValue = 0;

require 'form-view.php';
