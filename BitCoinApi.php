<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title></title>

	<style type="text/css">
		h1, h2, h3, h4, h5, h6, p, a {
		    font-family: 'Gulzar', serif;
		}
	</style>


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gulzar&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container-fluid " style="padding:0px">
		<div class="container">
	        <div class="news-container">
	        	<div class="table-responsive-md">

<?php

	$key = '';
	$api = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?CMC_PRO_API_KEY=".$key;

    $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $api);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result=curl_exec($ch);
	curl_close($ch);
	$result=json_decode($result,true);

	$data = $result['data'];
	echo "<pre>";
?>

<table class="table">
	<thead class="thead-dark">
	    <tr>
	        <th scope="col">CMC Rank</th>
	        <th scope="col">Symbol</th>
	        <th scope="col">Name</th>
	        <th scope="col">USD Price</th>
	        <th scope="col">Total Supply</th>
	        <th scope="col">Market Cap</th>
        </tr>
	</thead>
	<?php
		$i=1;
		foreach ($data as $list) {
			echo "<tr>
				<td>".$list['cmc_rank']."</td>
				<td>".$list['symbol']."</td>
				<td>".$list['name']."</td>
				<td>".$list['quote']['USD']['price']."</td>
				<td>".$list['total_supply']."</td>
				<td>".$list['quote']['USD']['market_cap']."</td>
				
				</tr>";
			$i++;
		}

	?>
		<tr style="text-align:center;font-weight:bold ;"><td colspan="6">All Data Provided By Coin Market Cap.</td></tr>
		</table>
		</div>
	    </div>
    	</div>
	</div>
<!-- coinmarketcap -->
</body>
</html>