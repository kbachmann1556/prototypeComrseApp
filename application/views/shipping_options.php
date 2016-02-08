<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="text-align:center;">
		<h1>Choose Your Shipping Option</h1>
		<?php 
		if(array_key_exists('message', $shippings))
		{
			echo $shippings['message'];
		}
		?>
		<a style="display:block;margin-top:20px;" href="/payment"><button>Continue to Add Payment Info</button></a>
	</div>
</body>
</html>