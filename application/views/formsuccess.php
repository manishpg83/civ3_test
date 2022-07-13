<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Exchange Currency Rate Response</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row header">
			<div class="col-md-12">
				<h1>The exchange rates for USD and RON based on Euro</h1>
			</div>
		</div>
		<div class="row">
			<?php if($currency_data!=null){ ?>
			<div class="col-md-6">
				<p>From Currency</p>
			</div>
			<div class="col-md-6">
				<p><b><?php echo $currency_data->query->from;?></b></p>
			</div>

			<div class="col-md-6">
				<p>To Currency</p>
			</div>
			<div class="col-md-6">
				<p><b><?php echo $currency_data->query->to;?></b></p>
			</div>

			<div class="col-md-6">
				<p>Rate</p>
			</div>
			<div class="col-md-6">
				<p><b><?php echo $currency_data->info->rate;?></b></p>
			</div>

			<div class="col-md-6">
				<p>Price</p>
			</div>
			<div class="col-md-6">
				<p><b><?php echo $currency_data->query->amount;?></b></p>
			</div>

			<div class="col-md-6">
				<p>Converted Amount</p>
			</div>
			<div class="col-md-6">
				<p><b><?php echo $currency_data->result;?></b></p>
			</div>
            <?php } else { ?>
                <div class="col-md-12">No data found</div>
            <?php } ?>        		
		</div>
	</div>
</body>
</html>
