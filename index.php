<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();
$totalValue = 0;
$fname = $lname = $email = $street = $streetnumber = $city = $zipcode = $success = '';
$errors = ['fname' => '', 'lname' => '', 'email' => '', 'street' => '', 'streetnumber' => '', 'city' => '', 'zipcode' => '', 'product' => '', 'delivery' => ''];
$foods = ['Chicken Tandoori', 'Chicken Makhni', 'Palak Paneer', 'Sindhi Biryani', 'Haleem', 'Cola', 'Fanta', 'Sprite', 'Ice-tea', 'Lassi'];
define("dp_email", "becodephp@gmail.com");

if (isset($_POST['order'])) {

    if (empty($_POST['fname'])) {
        $errors['fname'] = "Please enter your first name";
    } else {
        $fname = sanitizer($_POST['fname']);
        $_SESSION['fname'] = $fname;
        if (preg_match('/^[a-z ]*$/i', $fname)) {
            // TODO: email is valid
        } else {
            $errors['fname'] = "Alphabet only";
        }
    }
    if (empty($_POST['lname'])) {
        $errors['lname'] = "Please enter your last name";
    } else {
        $lname = sanitizer($_POST['lname']);
        $_SESSION['lname'] = $lname;
        if (preg_match('/^[a-z ]*$/i', $lname)) {
            // TODO: email is valid
        } else {
            $errors['lname'] = "Alphabet only";
        }
    }

    if (empty($_POST['email'])) {
        $errors['email'] = "Please enter your email address";
    } else {
        $email = sanitizer($_POST['email']);
        $_SESSION['email'] = $email;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // TODO: email is valid
        } else {

            $errors['email'] = "\"$email\" is not a valid email address";
        }
    }
    if (empty($_POST['street'])) {
        $errors['street'] =  "Street name is required";
    } else {
        $street = sanitizer($_POST['street']);
        $_SESSION['street'] = $street;
        // TODO: street is valid
    }
    if (empty($_POST['streetnumber'])) {
        $errors['streetnumber'] =  "Street number is required";
    } else {
        $streetnumber = sanitizer($_POST['streetnumber']);
        $_SESSION['streetnumber'] = $streetnumber;
        if (is_numeric($streetnumber)) {
            // TODO: streetnumber is valid
        } else {
            $errors['streetnumber'] =  "\"$streetnumber\" is not a valid Street number";
        }
    }
    if (empty($_POST['city'])) {
        $errors['city'] =  "City is required";
    } else {
        $city = sanitizer($_POST['city']);
        $_SESSION['city'] = $city;
        // TODO: city is valid
    }
    if (empty($_POST['zipcode'])) {
        $errors['zipcode'] =  "Zipcode is required";
    } else {
        $zipcode = sanitizer($_POST['zipcode']);
        $_SESSION['zipcode'] = $zipcode;
        if (is_numeric($zipcode)) {
            // TODO: zipcode is valid
        } else {
            $errors['email'] =  "\"$zipcode\" is not a valid Zipcode";
        }
    }

    if (empty($_POST['products'])) {
        $errors['product'] =  "At least one product is required";
    } else {
        $cart = $_POST['products'];
        foreach ($foods as $food) {
            $_SESSION[$food] = false;
        }
        foreach ($cart as $key => $value) {
            $totalValue += $value;
            $_SESSION[$key] = true;
        }
    }
}
if (empty($_POST['delivery'])) {
    $errors['delivery'] =  "Please select a delivery option";
} else {
    $delivery_time = ($_POST['delivery'] == 2700) ? '45 minutes' : '2 hours';
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
    return "Thank you! Your order was successfully submitted!"
        . "<br>" . "Total price: &euro; " . "$cost"
        . "<br>" . "Delivery expected at " . "$estimatedTime";
}
function sanitizer($sanitize)
{
    $clean_comment = strip_tags($sanitize);
    return htmlspecialchars($clean_comment);
}


require 'food.php';
require 'form-view.php';
