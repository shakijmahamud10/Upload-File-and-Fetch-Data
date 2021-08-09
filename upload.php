<?php

include 'config.php';

$link = "";
$link_status = "display: none;";




?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>File Attachment</title>
</head>

<style>
	input[type=text],
	select {
		width: 90%;
		padding: 10px 20px;
		margin: 6px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

	input[type=number],
	select {
		width: 90%;
		padding: 10px 20px;
		margin: 6px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}




	input[type=submit]:hover {
		background-color: #45a049;
	}
</style>



<body>
	<div class="file__upload">
		<div class="header">
			<p><i class="fa fa-cloud-upload fa-2x"></i><span><span>Up</span>load</span></h4>
			</p>
		</div>





		<form action="upload.php" method="POST" enctype="multipart/form-data" class="body">
			<!-- Sharable Link Code -->
			<!-- <input type="checkbox" id="link_checkbox">
			<input type="text" value="<?php echo $link; ?>" id="link" readonly>
			<label for="link_checkbox" style="<?php echo $link_status; ?>">Get Sharable Link</label> <br><br> -->




			<label for="fname">Apps Username</label>
			<input type="text" id="uname" name="uname" placeholder="Apps Username" required>


			<label for="rcode">Room Code</label>
			<input type="number" id="rcode" name="rcode" placeholder="Room Code" required> <br>


			<input type="file" name="file" id="upload" required> <br>
			<!-- <label for="upload">
				<i class="fa fa-file-text-o fa-3x"></i>
				<p>
					<strong>Drag and drop</strong> files here<br>
					or <span>browse</span> to begin the upload
				</p>
			</label> -->








			<button name="upload" class="btn">Upload</button>
		</form>
	</div>

	<?php
	include('include/scripts.php')

	?>

</body>

</html>