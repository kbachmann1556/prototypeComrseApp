<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="text-align:center">
		<h1>Thank you for placing your order!</h1>
		<h3>Your Order Number is <?= $cart['id']; ?></h3>
		<a href="/destroy_sess"><button>Keep Shopping</button></a>
	</div>
</body>
</html>