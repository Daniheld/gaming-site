<!DOCTYPE html>

<?php
$connection = mysqli_connect("localhost", "sales", "@Chungus123");
if (!$connection) {
	die("Epic embed fail");
}

$items_size = 3;
$products_size = 0;

for ($i = 1; $i <= $items_size; $i++) {
	if (isset($_COOKIE[strval($i)])) {
		$products_size += $_COOKIE[strval($i)];
	}
}
?>

<html>
<head>
<title>ATOMIC WATERMELON</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navbar -->
<nav>
<div class="topnav">
<div class="logo"><a href="index.php">DINOGAMING</a></div>
<div class="item"><img src="media/basket.svg"></div>
</div>
</nav>

<div class="main-container">
<div class="main-container-row">
<div class="sub-container-basket">
<div class="sub-container-basket-title">
<h1>Kurv</h1>
<p style="color: #39ff76;"><?php
if ($products_size == 1) {
	echo $products_size . " Produkt";
} else {
	echo $products_size . " Produkter";
}

?></p>
</div>

<?php
for ($i = 1; $i <= $items_size; $i++) {
	if (isset($_COOKIE[strval($i)])) {
		$image = mysqli_query($connection, "SELECT image FROM products where id IN(" . $i . ")");

		echo "<div class=\"basket-item\">". 
			 "<img src=\"" . $image . "\" class=\"basket-item-image\">" .
			 "</div>";
	}
}
?>

</div>
</div>
</div>
</body>
</html>