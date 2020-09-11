<?php
$deliveries = [
    ['name' => 'Normal delivery - &euro; 3', 'time' => (2 * 60 * 60)],
    ['name' => 'Express delivery - &euro; 5', 'time' => (45 * 60)]
];
//products with their price.
if (!$_GET || $_GET['food']) {
    $products = [
        ['name' => 'Chicken Tandoori', 'price' => 8],
        ['name' => 'Chicken Makhni', 'price' => 8],
        ['name' => 'Palak Paneer', 'price' => 7],
        ['name' => 'Sindhi Biryani', 'price' => 10],
        ['name' => 'Haleem', 'price' => 5]
    ];
} elseif (!$_GET['food']) {
    $products = [
        ['name' => 'Cola', 'price' => 2],
        ['name' => 'Fanta', 'price' => 2],
        ['name' => 'Sprite', 'price' => 2],
        ['name' => 'Ice-tea', 'price' => 3],
        ['name' => 'Lassi', 'price' => 3],
    ];
}
