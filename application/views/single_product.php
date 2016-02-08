<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	#productPic{
		/*height: 400px;*/
		/*width: 400px;*/
		/*background-color: red;*/
		display: inline-block;
		margin: 20px;
	}
	p{
		display: block;
	}
	</style>
</head>
<body>
<div id='container' style="text-align:center;">
	<h1><?= $decoded['name']; ?></h1>

	<div id = 'productPic'><img src=<?= $decoded['media'][0]['url'] ?>></div>
	<p><?= 'Price: '.$decoded['retail_price']['amount'].' '.$decoded['retail_price']['currency']['currency_code'] ?></p>
	<!-- <p><?= $decoded['product_attributes'][0]['attribute_value']; ?></p> -->

	<a href=<?= "add_to_cart/{$decoded['id']}" ?>><button>Add to Cart</button></a>
	<a href="/"><button>Back to Shop</button></a>
</div>
</body>
</html>