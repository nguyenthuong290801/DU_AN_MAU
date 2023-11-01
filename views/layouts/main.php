<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		<?php
		if ($_SERVER['REQUEST_URI'] == '/') {
			echo "Home";
		} else {
			echo ucwords(substr($_SERVER['REQUEST_URI'], 1));
		}
		?>
	</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- style -->
	<?php include dirname(__DIR__) . "/client/components/style.php"; ?>
</head>

<body class="animsition">
	<?php
	$yield = "{{content}}";
	include "../views/client/components/header.php";
	include "../views/client/components/cart.php";
	echo $yield;
	include "../views/client/components/footer.php";
	include "../views/client/components/modal1.php";
	include dirname(__DIR__) . "/client/components/script.php";
	?>
	<script src="/js/main.js"></script>
</body>

</html>