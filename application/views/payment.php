<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		input{
			display: block;
			margin: 10px;
		}
	</style>
</head>
<body>
	<div style="text-align:center;">
	<h1>Add Your Payment Info</h1>
	<div style="display:inline-block;">
		<form action='addresses' method='post'>
			<input type = 'text' name='ccNumber' placeholder='Credit Card Number'>
			<input type = 'text' name='ccCVC' placeholder='Credit Card CVC'>
			<input type = 'text' name='ccMonth' placeholder='Experation Month'>
			<input type = 'text' name='ccYear' placeholder='Experation Year'>
			<input type = 'submit' value = 'Continue to Shipping and Billing Addresses'>
		</form>
	</div>
	</div>
</body>
</html>