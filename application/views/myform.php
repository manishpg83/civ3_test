<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Exchange Currency Rate</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row header">
			<div class="col-md-12">
				<h1>Exchange Currency Rate</h1>
			</div>
		</div>
		<div class="row">
			 <?php echo validation_errors(); ?>  
	         <?php echo form_open('exchangerate'); ?>  
	         <h5>Price</h5> 
	         <input type="text" name="price" value="" size="50" />  
	         <h5>To Currency</h5> 
	         <select name="to_currency" id="to_currency">
	         	<option value="USD">USD</option>
	         	<option value="RON">RON</option>
	         </select>
	         <div><input type="submit" value="Submit" /></div>  
	      	</form>  
		</div>
	</div>
</body>
</html>
