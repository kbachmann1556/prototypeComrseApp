<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	*{
		vertical-align: top;
	}
	table{
		border-collapse: collapse;
	}
	p{
		margin:2px;
	}
	ul>li{
		list-style: none;
	}
	</style>
</head>
<body>
	<div style="text-align:center;">
		<h1>Review Your Order</h1>
		<div id='price_info' style="display:inline-block;margin-bottom:20px;">
			<table>
				<tr>
					<td style="font-weight:bold;border-bottom:1px solid black;">Product</td>
					<td style="font-weight:bold;border-bottom:1px solid black;">Quantity</td>
					<td style="font-weight:bold;border-bottom:1px solid black;">Price</td>
				</tr>
			
			<?php 
				for ($i=0;$i<count($cart['order_items']);$i++)
				{
					?>
					<tr>
						<td><?= $cart['order_items'][$i]['name']; ?></td>
						<td><?= $cart['order_items'][$i]['quantity']; ?></td>
						<td><?= $cart['order_items'][$i]['retail_price']['amount'].' '.$cart['order_items'][$i]['retail_price']['currency']['currency_code']; ?></td>
					</tr>
					<?php
				}
			?>
			<tr>
				<td style="border-top:3px solid black;"></td>
				<td style="border-top:3px solid black;"></td>
				<td style="border-top:3px solid black;">Sub Total: <?= $cart['sub_total']['amount'].' '.$cart['sub_total']['currency']['currency_code']; ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>Tax: <?= $cart['total_tax']['amount'].' '.$cart['total_tax']['currency']['currency_code']; ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>Shipping: <?= $cart['total_shipping']['amount'].' '.$cart['total_shipping']['currency']['currency_code']; ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>Total: <?= $cart['total']['amount'].' '.$cart['total']['currency']['currency_code']; ?></td>
			</tr>
			</table>
		</div>
				
		<?php 
		if(array_key_exists('message', $addresses))
		{
			echo "<p style = 'margin:10px;'>".$addresses['message']."</p>";
		}
		else
		{
			?>
		<span style="display:block;"></span>
		<div id="shipping_address" style="display:inline-block;">
			<h3>Shipping Address</h3>
			<p>First Name: <?= $addresses['addresses'][1]['first_name']; ?></p>
			<p>Last Name: <?= $addresses['addresses'][1]['last_name']; ?></p>
			<p>Street Address: <?= $addresses['addresses'][1]['address_line1']; ?></p>
			<p>City: <?= $addresses['addresses'][1]['city']; ?></p>
			<p>State: <?= $addresses['addresses'][1]['state']['name']; ?></p>
			<p>Zip: <?= $addresses['addresses'][1]['postal_code']; ?></p>
			<p>Phone: <?= $addresses['addresses'][1]['phone_primary']['phone_number']; ?></p>
		</div>
		<div id="billing_address" style="display:inline-block;">
			<h3>Billing Address</h3>
			<p>First Name: <?= $addresses['addresses'][0]['first_name']; ?></p>
			<p>Last Name: <?= $addresses['addresses'][0]['last_name']; ?></p>
			<p>Street Address: <?= $addresses['addresses'][0]['address_line1']; ?></p>
			<p>City: <?= $addresses['addresses'][0]['city']; ?></p>
			<p>State: <?= $addresses['addresses'][0]['state']['name']; ?></p>
			<p>Zip: <?= $addresses['addresses'][0]['postal_code']; ?></p>
			<p>Phone: <?= $addresses['addresses'][0]['phone_primary']['phone_number']; ?></p>
		</div>
			<?php
		}
		?>
		<span style="display:block;"></span>
		<div id="payment_info" style="display:inline-block;text-align:left;margin-top:20px;">
			<p>Credit Card Number: <?= $payment['credit_card_number']; ?></p>
			<p>Credit Cart CVC: <?= $payment['credit_card_c_v_c']; ?></p>
			<p>Credit Card Experation: <?= $payment['credit_card_exp_month'].'/'.$payment['credit_card_exp_year']; ?></p>
		</div>
		<a style="display:block;margin-top:20px;" href="/complete_order"><button>Place Order</button></a>
	</div>
</body>
</html>