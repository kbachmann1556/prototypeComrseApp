<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function (){
		$('#sameAddress').click(function (){
			$('#first_name_billing').val($('#first_name').val());
			$('#last_name_billing').val($('#last_name').val());
			$('#address_billing').val($('#address').val());
			$('#city_billing').val($('#city').val());
			$('#state_billing').val($('#state').val());
			$('#zip_billing').val($('#zip').val());
			$('#phone_billing').val($('#phone').val());

			return false;
		});
	});
	</script>
	<style type="text/css">
	input{
		display: block;
		margin: 10px;
	}
	.address{
		margin: 20px;
		vertical-align: top;
		display: inline-block;
	}
	</style>
</head>
<body>
	<div class = 'container' style="text-align:center;">
		<h1>Enter Your Shipping and Billing Information</h1>
		<form action = 'add_addresses' method="post">
			<div class = 'address'>
				<h3>Shipping Address</h3>
				<input type = 'text' id='first_name' name='first_name' placeholder='First Name'>
				<input type = 'text' id='last_name' name='last_name' placeholder='Last Name'>
				<input type = 'text' id='address' name='address' placeholder='Street Address'>
				<input type = 'text' id='city' name='city' placeholder='City'>
				<input type = 'text' id='state' name='state' placeholder='State'>
				<input type = 'text' id='zip' name='zip' placeholder='Zip Code'>
				<input type = 'text' id='phone' name='phone' placeholder='Phone #'>
			</div>
			<div class = 'address'>
				<h3>Billing Address <button id = 'sameAddress'>Same as Shipping</button></h3>
				<input type = 'text' id='first_name_billing' name='first_name_billing' placeholder='First Name'>
				<input type = 'text' id='last_name_billing' name='last_name_billing' placeholder='Last Name'>
				<input type = 'text' id='address_billing' name='address_billing' placeholder='Street Address'>
				<input type = 'text' id='city_billing' name='city_billing' placeholder='City'>
				<input type = 'text' id='state_billing' name='state_billing' placeholder='State'>
				<input type = 'text' id='zip_billing' name='zip_billing' placeholder='Zip Code'>
				<input type = 'text' id='phone_billing' name='phone_billing' placeholder='Phone #'>
				<input type = 'submit' value = 'Confirm Order'>
			</div>
		</form>
	</div>
</body>
</html>