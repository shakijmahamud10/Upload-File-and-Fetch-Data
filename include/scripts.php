<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php



if (isset($_POST['upload'])) {

	$uname = $_POST['uname'];
	$rcode = $_POST['rcode'];

	// If isset upload button or not
	// Declaring Variables
	$location = "uploads/";
	$file_new_name = date("dmy") . time() . $_FILES["file"]["name"]; // New and unique name of uploaded file
	$file_name = $_FILES["file"]["name"]; // Get uploaded file name
	$file_temp = $_FILES["file"]["tmp_name"]; // Get uploaded file temp
	$file_size = $_FILES["file"]["size"]; // Get uploaded file size

	// get the file extension
	$extension = pathinfo($file_name, PATHINFO_EXTENSION);

	/*
	How we can get mb from bytes
	(mb*1024)*1024

	In my case i'm 10 mb limit
	(10*1024)*1024
	*/

	if (!in_array($extension, ['gif', 'jpg', 'png', 'jpeg'])) {
		echo "<script>alert('You file extension must be .jpg, .jpeg .gif, .png')</script>";
	} elseif ($file_size > 2097152) { // Check file size 10mb or not
		echo "<script>alert('Maximum file size allowed for upload 2 MB.')</script>";
	} else {
		$sql = "INSERT INTO uploaded_files (name, uname, rcode, new_name)
				VALUES ('$file_name', '$uname', '$rcode', '$file_new_name')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			move_uploaded_file($file_temp, $location . $file_new_name);
?>

			<script>
				swal({
					title: " File Successfully Submitted",
					//   text: "Your file successfully submitted",
					icon: "success",
				}).then(function(result) {
					if (true) {
						window.location = "upload.php";
					}
				})
			</script>

<?php

			// Select id from database
			$sql = "SELECT id FROM uploaded_files ORDER BY id DESC";
			$result = mysqli_query($conn, $sql);
			if ($row = mysqli_fetch_assoc($result)) {
				$link = $base_url . "download.php?id=" . $row['id'];
				$link_status = "display: block;";
			}
		} else {
			echo "<script>alert('Woops! Something wong went.')</script>";
		}
	}
}

?>