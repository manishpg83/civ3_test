<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Analytics Page</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<style type="text/css">
		.header { text-align:center; border-bottom: 2px solid black; margin-bottom: 10px; }
		.header h1 {
			text-align: center; margin-bottom: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row header">
			<div class="col-md-12">
				<h1>Analytics</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<p>Count of all active and verified users</p>
			</div>
			<div class="col-md-1">
				<p><b><?php echo $active_verified_users ?></b></p>
			</div>
			<div class="col-md-5">
				<p>Count of active and verified users who have attached active products</p>
			</div>
			<div class="col-md-1">
				<p><b><?php echo $active_users_products ?></b></p>
			</div>
			<div class="col-md-5">
				<p>Count of all active products</p>
			</div>
			<div class="col-md-1">
				<p><b><?php echo $active_products ?></b></p>
			</div>
			<div class="col-md-5">
				<p>Count of active products which don't belong to any user</p>
			</div>
			<div class="col-md-1">
				<p><b><?php echo $active_products_without_user ?></b></p>
			</div>
			<div class="col-md-5">
				<p>Amount of all active attached products</p>
			</div>
			<div class="col-md-1">
				<p><b><?php echo $all_attached_products ?></b></p>
			</div>
			<div class="col-md-5">
				<p>Summarized price of all active attached products</p>
			</div>
			<div class="col-md-1">
				<p><b><?php echo $summaried_price_attached_products ?></b></p>
			</div>			
			<?php
			if(isset($summaried_price_attached_products_per_user) && count($summaried_price_attached_products_per_user) > 0)
			{
				?>
				<div class="col-md-12">
					<p>Summarized prices of all active products per user.</p>
				</div>
				<div class="col-md-6">
					<?php
					foreach($summaried_price_attached_products_per_user as $value)
					{
						?>
						<div class="row">
							<div class="col-md-4">
								<p><?php echo $value['name']; ?></p>
							</div>
							<div class="col-md-2">
								<p><b><?php echo $value['total']; ?></b></p>
							</div>
						</div>
						<?php
					}?>
				</div>
				<?php
			}
			?>			
		</div>
	</div>
</body>
</html>
