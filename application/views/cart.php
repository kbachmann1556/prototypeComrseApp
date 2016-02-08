<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	.cartItem{
		width: 600px;
		height: 150px;
		background: red;
		margin: 10px;
		display: inline;
	}
	ul>li{
		list-style: none;
		display: inline-block;
	}
	.center{
		margin-left: auto;
		margin-right: auto;
	}
	table{
		border-collapse: collapse;
	}
	table, td{
		border: 1px solid black;
	}
	</style>
</head>
<body>
	<div id='container' style="text-align:center;">
	<h1>My Cart</h1>
	<?php 
	// var_dump($cart) 
	?>

	<table class = 'center'>
		<tr>
			<td style="font-weight:bold">Product Name</td>
			<td style="font-weight:bold">Quantity</td>
			<td style="font-weight:bold">Price</td>
			<td style="font-weight:bold">Remove</td>
		</tr>
		<?php
		if(array_key_exists('order_items', $cart))
		{
			for ($i=0;$i<count($cart['order_items']);$i++)
			{
				?>
				<tr>
					<td><?= $cart['order_items'][$i]['name']; ?></td>
					<td><?= $cart['order_items'][$i]['quantity']; ?></td>
					<td><?= $cart['order_items'][$i]['retail_price']['amount']; ?></td>
					<td>
						<form action='delete_item' method='post'>
							<input type='hidden' name='cart_id' value=<?="{$cart['id']}";?>>
							<input type='hidden' name='item_id' value=<?="{$cart['order_items'][$i]['id']};"?>>
							<input type='submit' value='delete'>
						</form>
					</td>
				</tr>
				<?php
			}
		} else 
		{
			echo "Cart is Empty";
		}
		?>
		<tr>
			<td><h4>Sub Total</h4></td>
			<td></td>
			<td><?= $cart['sub_total']['amount'];?></td>
			<td></td>
		</tr>
	</table>
	<a href="/"><button style="margin-top:30px;">Keep Shopping</button></a>
	<a href="/shippings"><button>Checkout</button></a>
	</div>
</body>
</html>