<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	.images{
		display: inline-block;
		height: 150px;
		width: 150px;
		margin: 10px;
		/*background: red;*/
		vertical-align: top;
	}
	.products{
		display: inline-block;
		width: 200px;
		height: 200px;
		margin: 10px;
		vertical-align: top;
		margin-bottom: 50px;
	}
	</style>
</head>
<body>
	<div id='container' style="text-align:center;">
		<h1 style="display:inline-block;">All Products</h1>
		<?php 
		if(null !== $this->session->userdata('cart'))
		{
			?>
			<a style="display:inline-block; margin-left:20px;vertical-align:top" href="/cart"><button>Go to Cart</button></a>
			<?php
		}
		?>
			<span style='display:block;'></span>
		<?php 
			for($i=0;$i<20;$i++){
				?>
				<div class = 'products'>
					<a href=<?= "product/{$decoded['products'][$i]['id']}" ?>>
						<img class='images' src=<?= $decoded['products'][$i]['media'][0]['url'] ?>>
					</a>
					<p><?= $decoded['products'][$i]['name'] ?></p>
				</div>
				<?php
			}
		?>
	</div>
</body>
</html>